<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'last_name'          => '',
                'country'            => '',
                'zipcode'            => '',
                'eme_contact_person' => '',
                'eme_contact_number' => '',
                'occupation'         => '',
                'process_number'     => '',
                'national_number'    => '',
                'health_number'      => '',
                'vat_number'         => '',
                'favourite_food'     => '',
                'disliked_food'      => '',
            ],
        ];

        User::insert($users);
    }
}
