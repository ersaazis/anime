<?php

use Illuminate\Database\Seeder;

class CbMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cb_menus')->delete();
        
        \DB::table('cb_menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Anime',
                'icon' => NULL,
                'path' => NULL,
                'type' => 'module',
                'sort_number' => 3,
                'cb_modules_id' => 1,
                'parent_cb_menus_id' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Genre',
                'icon' => NULL,
                'path' => NULL,
                'type' => 'module',
                'sort_number' => 1,
                'cb_modules_id' => 3,
                'parent_cb_menus_id' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Karakter',
                'icon' => NULL,
                'path' => NULL,
                'type' => 'module',
                'sort_number' => 5,
                'cb_modules_id' => 4,
                'parent_cb_menus_id' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Musim',
                'icon' => NULL,
                'path' => NULL,
                'type' => 'module',
                'sort_number' => 2,
                'cb_modules_id' => 5,
                'parent_cb_menus_id' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Pengumuman',
                'icon' => NULL,
                'path' => NULL,
                'type' => 'module',
                'sort_number' => 0,
                'cb_modules_id' => 6,
                'parent_cb_menus_id' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Video',
                'icon' => NULL,
                'path' => NULL,
                'type' => 'module',
                'sort_number' => 4,
                'cb_modules_id' => 7,
                'parent_cb_menus_id' => NULL,
            ),
        ));
        
        
    }
}