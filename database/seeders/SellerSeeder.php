<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->create([
            'name' => 'Rabih Mahmoud',
            'email' => 'rabihmahmoud2021@gmail.com',
            'phone' => '+96176318226',
            'password' => Hash::make('password'),
            'user_type' => 'seller'
        ]);
        Seller::query()->create([
            'user_id' => $user->id,
            'region_id' => 4,
            'seller_name' => 'Joulani Automobile',
            'seller_mobile' => '+96176318226',
            'seller_address' => 'Akkar - Main Street',
            'image' => 'uploads/sellers/64371e4947513_1681333833.jpg'
        ]);
    }
}
