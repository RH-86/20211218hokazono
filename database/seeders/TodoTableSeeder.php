<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = [
            'content' => 'aaaaa'
        ];
        DB::table('todos')->insert($item);

        $item = [
            'content' => 'bbbbb'
        ];
        DB::table('todos')->insert($item);
    }
}
