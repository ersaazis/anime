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
                'sort_number' => 5,
                'cb_modules_id' => 1,
                'parent_cb_menus_id' => NULL,
                'editable' => 1,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Genre',
                'icon' => NULL,
                'path' => NULL,
                'type' => 'module',
                'sort_number' => 3,
                'cb_modules_id' => 3,
                'parent_cb_menus_id' => NULL,
                'editable' => 1,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Pengumuman',
                'icon' => NULL,
                'path' => NULL,
                'type' => 'module',
                'sort_number' => 1,
                'cb_modules_id' => 6,
                'parent_cb_menus_id' => NULL,
                'editable' => 1,
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'Video',
                'icon' => NULL,
                'path' => NULL,
                'type' => 'module',
                'sort_number' => 6,
                'cb_modules_id' => 7,
                'parent_cb_menus_id' => NULL,
                'editable' => 1,
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'Karakter',
                'icon' => NULL,
                'path' => NULL,
                'type' => 'module',
                'sort_number' => 2,
                'cb_modules_id' => 8,
                'parent_cb_menus_id' => NULL,
                'editable' => 1,
            ),
            5 => 
            array (
                'id' => 10,
                'name' => 'Nonton Anime',
                'icon' => 'fa fa-youtube-play',
                'path' => 'http://localhost:8000',
                'type' => 'url',
                'sort_number' => 0,
                'cb_modules_id' => NULL,
                'parent_cb_menus_id' => NULL,
                'editable' => 1,
            ),
            6 => 
            array (
                'id' => 11,
                'name' => 'Link Anime',
                'icon' => NULL,
                'path' => NULL,
                'type' => 'module',
                'sort_number' => 0,
                'cb_modules_id' => 10,
                'parent_cb_menus_id' => NULL,
                'editable' => 1,
            ),
            7 => 
            array (
                'id' => 12,
                'name' => 'User Manajement',
                'icon' => 'fa fa-users',
                'path' => 'users',
                'type' => 'path',
                'sort_number' => 0,
                'cb_modules_id' => NULL,
                'parent_cb_menus_id' => NULL,
                'editable' => 0,
            ),
        ));
        
        
    }
}