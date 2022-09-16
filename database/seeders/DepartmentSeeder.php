<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    private $afdelingen = [
        'Wielertoeristen',
        'Voetbal Den Een',
        'Voetbal Den Twee',
        'Voetbal Den Drie',
        'Voetbal Dames',
        'Petanque',
        'Kaarten',
        'Biljarten',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->afdelingen as $afdeling) {
            DB::table('departments')->insert([
                'name' => $afdeling,
                'slug' => Str::slug($afdeling),
            ]);
        }
    }
}
