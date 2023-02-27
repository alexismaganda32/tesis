<?php

use Illuminate\Database\Seeder;
use App\Lang;

class LangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Lang::query()->truncate();

        Lang::create([
        	'name' => 'Español',
        	'code' => 'es',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:i'),
        	'updated_at' => date('Y-m-d H:m:i')
        ]);
        Lang::create([
        	'name' => 'English',
        	'code' => 'en',
        	'status' => 1,
            'created_at' => date('Y-m-d H:m:i'),
        	'updated_at' => date('Y-m-d H:m:i')
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
