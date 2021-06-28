<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Proposal;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::create([
            'nama' => 'Category 1',
        ]);
        Category::create([
            'nama' => 'Category 2',
        ]);
        Category::create([
            'nama' => 'Category 3',
        ]);

        Status::create([
            'nama' => 'Aktif',
        ]);
        Status::create([
            'nama' => 'Tidak Aktif',
        ]);
        Role::create([
            'nama' => 'Admin',
        ]);
        Role::create([
            'nama' => 'LPPM',
        ]);

        Role::create([
            'nama' => 'Dosen',
        ]);

        Role::create([
            'nama' => 'Reviewer',
        ]);

        User::create([
            'nidn' => '123',
            'name' => 'John 1',
            'email' => 'email@es.net',
            'password' => Hash::make(123456),
            'alamat' => 'ok',
            'no_hp' => 'ok',
            'roles_id' => 1
        ]);
        User::create([
            'nidn' => '124',
            'name' => 'John 2',
            'email' => 'email@ez.net',
            'password' => Hash::make(123456),
            'alamat' => 'ok',
            'no_hp' => 'ok',
            'roles_id' => 2
        ]);

        Proposal::create([
            'judul' => 'Proposal 1',
            'file' => 'sasaa.pdf',
            'patch' => 'public',
            'category_id' => 1,
            'status_id' => 1,
            'user_id' => 1,
        ]);
        Proposal::create([
            'judul' => 'Proposal 2',
            'file' => 'sasasaa.pdf',
            'patch' => 'public',
            'category_id' => 2,
            'status_id' => 2,
            'user_id' => 2,
        ]);
    }
}
