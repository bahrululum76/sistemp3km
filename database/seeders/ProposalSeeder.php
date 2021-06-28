<?php

namespace Database\Seeders;

use App\Models\Proposal;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'judul' => 'woke.pdf',
                'file' => 'woke.pdf',
                'category_id' => 1,
                'status_id' => 1,
                'user_id' => 1

            ],
            [

                'judul' => 'woke1',
                'file' => 'woke1.pdf',
                'category_id' => 1,
                'status_id' => 2,
                'user_id' => 2
            ]

        ];

        foreach ($user as $key => $value) {
            Proposal::create($value);
        }
    }
}
