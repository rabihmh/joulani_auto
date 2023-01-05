<?php

namespace App\Actions\Fortify\Services;

use App\Actions\Fortify\Validations\PasswordValidationRules;
use App\Actions\Fortify\Validations\UserValidationRules;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class Create
{
    use PasswordValidationRules;

    public UserValidationRules $userValidationRules;

    public function __construct(UserValidationRules $userValidationRules)
    {
        $this->userValidationRules = $userValidationRules;
    }

    public function createAdmin(array $input)
    {
        Validator::make($input, $this->userValidationRules->userRule()
        )->validate();

        return Admin::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'username' => Str::slug($input['name']),
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
            'status' => 'active',
            'type' => 'admin'
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function createUser(array $input)
    {
        if (isset($input['register']) && $input['register'] === 'seller') {
            Validator::make($input, $this->userValidationRules->userRule())->validate();
            Validator::make($input, $this->userValidationRules->sellerRule())->validate();
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'password' => Hash::make($input['password']),
                'user_type' => $input['register']
            ]);

            Seller::create([
                'user_id' => $user->id,
                'region_id' => $input['region_id'],
                'seller_name' => $input['seller_name'],
                'seller_mobile' => $input['seller_mobile'],
                'seller_address' => $input['seller_address'],
                'image' => $input['image']
            ]);
            return $user;
        }
        Validator::make($input, $this->userValidationRules->UserRule()
        )->validate();
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);

    }
}
