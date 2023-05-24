<?php

namespace App\Actions\Fortify\Validations;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserValidationRules
{
    use PasswordValidationRules;

    public function userRule(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
                Rule::unique(Admin::class),
            ],
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => $this->passwordRules(),
        ];
    }

    public function sellerRule(): array
    {
        return [
            'region_id' => 'required|integer',
            'seller_name' => 'required|string|max:255',
            'seller_mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'seller_address' => 'required|string',
            'image' => 'required|string',
        ];
    }
}

