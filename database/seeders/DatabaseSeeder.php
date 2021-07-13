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
            'nama' => 'penelitian',
        ]);
        Category::create([
            'nama' => 'pengabdian',
        ]);
        Category::create([
            'nama' => 'Category 3',
        ]);

        Status::create([
            'nama' => 'diterima',
        ]);
        Status::create([
            'nama' => 'belum diterima',
        ]);
        Status::create([
            'nama' => 'revisi',
        ]);
        Status::create([
            'nama' => 'ditolak',
        ]);
        Status::create([
            'nama' => 'sedang revisi',
        ]);
        Status::create([
            'nama' => 'selesai',
        ]);
        Status::create([
            'nama' => 'aktif',
        ]);
        Status::create([
            'nama' => 'tidak aktif',
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
            'nidn' => '12354',
            'name' => 'Johty charge',
            'prodi'=> 'industri',
            'jabatan'=> 'wd 1',
            'email' => 'email@es.com',
            'password' => Hash::make(123456),
            'alamat' => 'ok',
            'no_hp' => '09767',
           
            'roles_id' => 1,
            
        ]);
        User::create([
            'nidn' => '12667',
            'name' => 'rose way',
            'prodi'=> 'sipil',
            'jabatan'=> 'wd 1',
            'email' => 'email@mail.com',
            'password' => Hash::make(123456),
            'alamat' => 'ok',
            'no_hp' => '86786',
            
            'roles_id' => 2,
            
        ]);
        User::create([
            'nidn' => '128444',
            'name' => 'lucam',
            'prodi'=> 'informatika',
            'jabatan'=> 'wd 2',
            'email' => 'mochlucam@gmail.com',
            'password' => Hash::make(123456),
            'alamat' => 'ok',
            'no_hp' => '77857',
            
            'roles_id' => 3,
        ]);
        User::create([
            'nidn' => '12844',
            'name' => 'lucam234',
            'prodi'=> 'informatika',
            'jabatan'=> 'wd 3',
            'email' => 'mochlucam3456@gmail.com',
            'password' => Hash::make(123456),
            'alamat' => 'ok',
            'no_hp' => '765564',
            
            'roles_id' => 4,
        ]);

        // Proposal::create([
        //     'judul' => 'Proposal 1',
        //     'file' => 'sasaa.pdf',
        //     'patch' => 'public',
        //     'category_id' => 1,
        //     'status_id' => 1,
        //     'user_id' => 1,
        // ]);
        // Proposal::create([
        //     'judul' => 'Proposal 2',
        //     'file' => 'sasasaa.pdf',
        //     'patch' => 'public',
        //     'category_id' => 2,
        //     'status_id' => 2,
        //     'user_id' => 2,
        // ]);
    }
}
