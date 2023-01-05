<?php

namespace App\Actions\Fortify;

use App\Actions\Fortify\Services\Create;
use Illuminate\Support\Facades\Config;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    public Create $create;

    public function __construct(Create $create)
    {
        $this->create = $create;
    }

    public function create(array $input)
    {
        if (Config::get('fortify.guard') == 'admin') {
            return $this->create->createAdmin($input);
        } else {
            return $this->create->createUser($input);
        }
    }
}
