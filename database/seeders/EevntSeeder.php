<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class EevntSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event = [
            'name' => 'Ex Students CCA',
            'datetime' => '2024-07-10 08:00:00',
        ];

        DB::table('events')->insert($event);
    }
}
