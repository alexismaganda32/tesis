<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//** ICONOS DE Font Awesome Free 5.10.2 **//
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Menu::query()->truncate();

        $menu1 = Menu::create([
        	'name' => 'Administrador',
        	'slug' => 'menu1',
            'icon' => 'fas fa-user-lock',
        	'father' => 0,
        	'order' => 1
        ]);
        Menu::create([
        	'name' => 'Roles',
        	'slug' => 'menu-1.1',
        	'module_id' => 1,
        	'father' => $menu1->id,
        	'order' => 1
        ]);
        Menu::create([
        	'name' => 'Usuarios',
        	'slug' => 'menu-1.2',
        	'module_id' => 2,
        	'father' => $menu1->id,
        	'order' => 2
        ]);
        Menu::create([
            'name' => 'Logs',
            'slug' => 'menu-1.3',
            'module_id' => 3,
            'father' => $menu1->id,
            'order' => 3
        ]);

        $menu2 = Menu::create([
        	'name' => 'Safe Quarantine',
        	'slug' => 'menu2',
            'icon' => 'fas fa-clipboard-list',
            'module_id' => 4,
        	'father' => 0,
        	'order' => 2
        ]);

        // Menu::create([
        //     'name' => 'estadisticas',
        //     'slug' => 'menu-1.4',
        //     'module_id' => 5,
        //     'father' => $menu1->id,
        //     'order' => 5
        // ]);


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
