<?php

namespace Database\Seeders;

use App\Models\Rv\ClubMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClubMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClubMember::factory(1500)->create();
    }
}
