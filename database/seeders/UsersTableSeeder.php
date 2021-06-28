<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'nidn' => 12355206,
                'name' => 'sasa35',
                'username' => 'sasa5',
                'email' => 'sasa3@sasa.com',
                'password' => Hash::make(123),
                'alamat' => '213',
                'no_hp' => '213',
                'roles_id' => 1,

            ]

        );
    }
}
