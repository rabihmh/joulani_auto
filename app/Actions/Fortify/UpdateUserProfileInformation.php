<?php

namespace App\Actions\Fortify;

use App\Actions\Fortify\Validations\PasswordValidationRules;
use App\Models\Seller;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    use PasswordValidationRules;

    /**
     * Validate and update the given user's profile information.
     *
     * @param mixed $user
     * @param array $input
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update($user, array $input): RedirectResponse
    {
        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', Rule::unique('users')->ignore($user->id)],
            'seller_name' => ['nullable', 'sometimes', 'required', 'string', 'max:255'],
            'seller_address' => ['nullable', 'sometimes', 'required', 'string', 'max:255'],
            'seller_mobile' => ['nullable', 'sometimes', 'required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', Rule::unique('sellers')->ignore($user->id, 'user_id')],
            'region_id' => 'nullable|sometimes|required',
            'image' => 'nullable|sometimes|required|string'
        ]);
        // Remove the 'password' and 'confirmed' rules if they are not required
        if (isset($input['password']) && isset($input['password_confirmation'])) {
            $validator->addRules([
                'password' => $this->passwordRules(),
            ]);
        }

        $validator->setCustomMessages($this->message());
        $validator->setAttributeNames([
            'name' => 'الاسم',
            'phone' => 'رقم الهاتف',
            'email' => 'البريد الإلكتروني',
            'password' => 'كلمة المرور',
            'seller_name' => 'اسم المعرض',
            'seller_address' => 'عنوان المعرض',
            'seller_mobile' => 'رقم المعرض',
            'region_id' => 'عنوان المعرض',
            'image' => 'صورة المعرض'
        ]);

        $validator->validateWithBag('updateProfileInformation');

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'phone' => $input['phone'],
            ])->save();
        }
        if (isset($input['seller_name'])) {
            $this->updateSeller($user, $input);
        }
        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param mixed $user
     * @param array $input
     * @return void
     */
    protected
    function updateVerifiedUser($user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'],
        ])->save();

        $user->sendEmailVerificationNotification();
    }

    protected function updateSeller($user, $input)
    {
        $seller = Seller::query()->where('user_id', $user->id)->first();
        $seller->forceFill([
            'seller_name' => $input['seller_name'],
            'seller_mobile' => $input['seller_mobile'],
            'seller_address' => $input['seller_address'],
            'region_id' => $input['region_id'],
            'image' => $this->updateImage($user, $input['image'])
        ])->save();
    }

    protected
    function message(): array
    {
        return [
            'name.required' => 'حقل :attribute مطلوب.',
            'name.string' => 'حقل :attribute يجب أن يكون نصاً.',
            'name.max' => 'حقل :attribute يجب ألا يتجاوز 255 حرفاً.',
            'password.required' => 'حقل :attribute مطلوب.',
            'password.string' => 'حقل :attribute يجب أن يكون نصاً.',
            'password.confirmed' => 'كلمتا السر غير متطابقتان.',
            'email.required' => 'حقل :attribute مطلوب.',
            'email.string' => 'حقل :attribute يجب أن يكون نصاً.',
            'email.email' => 'البريد الإلكتروني يجب أن يكون صحيحاً.',
            'email.max' => 'حقل :attribute يجب ألا يتجاوز 255 حرفاً.',
            'email.unique' => 'البريد الإلكتروني موجود بالفعل.',
            'phone.required' => 'حقل :attribute مطلوب.',
            'phone.unique' => 'رقم الهاتف موجود بالفعل.',
            'seller_name.required' => 'حقل :attribute مطلوب.',
            'seller_name.string' => 'حقل :attribute يجب أن يكون نصاً.',
            'seller_name.max' => 'حقل :attribute يجب ألا يتجاوز 255 حرفاً.',
            'seller_address.required' => 'حقل :attribute مطلوب.',
            'seller_address.string' => 'حقل :attribute يجب أن يكون نصاً.',
            'seller_address.max' => 'حقل :attribute يجب ألا يتجاوز 255 حرفاً.',
            'seller_mobile.required' => 'حقل :attribute مطلوب.',
            'seller_mobile.unique' => 'رقم الهاتف الخاص بالمعرض موجود بالفعل.',
            'region_id.required' => 'حقل :attribute مطلوب.',
            'image.required' => 'حقل :attribute مطلوب.'
        ];
    }

    protected
    function updateImage($user, $image)
    {
        $old_image = $user->seller->image;
        if ($old_image === $image)
            return $old_image;
        else {
            Storage::disk('public')->delete($old_image);
            return $image;
        }
    }
}
