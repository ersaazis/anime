<?php

use Illuminate\Database\Seeder;

class CbRolePrivilegesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cb_role_privileges')->delete();
        
        \DB::table('cb_role_privileges')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cb_roles_id' => 1,
                'cb_menus_id' => 1,
                'can_browse' => 1,
                'can_create' => 1,
                'can_read' => 1,
                'can_update' => 1,
                'can_delete' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'cb_roles_id' => 1,
                'cb_menus_id' => 3,
                'can_browse' => 1,
                'can_create' => 1,
                'can_read' => 1,
                'can_update' => 1,
                'can_delete' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'cb_roles_id' => 1,
                'cb_menus_id' => 4,
                'can_browse' => 1,
                'can_create' => 1,
                'can_read' => 1,
                'can_update' => 1,
                'can_delete' => 1,
            ),
            3 => 
            array (
                'id' => 5,
                'cb_roles_id' => 1,
                'cb_menus_id' => 6,
                'can_browse' => 1,
                'can_create' => 1,
                'can_read' => 1,
                'can_update' => 1,
                'can_delete' => 1,
            ),
            4 => 
            array (
                'id' => 6,
                'cb_roles_id' => 1,
                'cb_menus_id' => 7,
                'can_browse' => 1,
                'can_create' => 1,
                'can_read' => 1,
                'can_update' => 1,
                'can_delete' => 1,
            ),
            5 => 
            array (
                'id' => 7,
                'cb_roles_id' => 2,
                'cb_menus_id' => 1,
                'can_browse' => 0,
                'can_create' => 0,
                'can_read' => 0,
                'can_update' => 0,
                'can_delete' => 0,
            ),
            6 => 
            array (
                'id' => 8,
                'cb_roles_id' => 2,
                'cb_menus_id' => 3,
                'can_browse' => 0,
                'can_create' => 0,
                'can_read' => 0,
                'can_update' => 0,
                'can_delete' => 0,
            ),
            7 => 
            array (
                'id' => 9,
                'cb_roles_id' => 2,
                'cb_menus_id' => 4,
                'can_browse' => 0,
                'can_create' => 0,
                'can_read' => 0,
                'can_update' => 0,
                'can_delete' => 0,
            ),
            8 => 
            array (
                'id' => 11,
                'cb_roles_id' => 2,
                'cb_menus_id' => 6,
                'can_browse' => 0,
                'can_create' => 0,
                'can_read' => 0,
                'can_update' => 0,
                'can_delete' => 0,
            ),
            9 => 
            array (
                'id' => 12,
                'cb_roles_id' => 2,
                'cb_menus_id' => 7,
                'can_browse' => 0,
                'can_create' => 0,
                'can_read' => 0,
                'can_update' => 0,
                'can_delete' => 0,
            ),
            10 => 
            array (
                'id' => 13,
                'cb_roles_id' => 1,
                'cb_menus_id' => 8,
                'can_browse' => 1,
                'can_create' => 1,
                'can_read' => 1,
                'can_update' => 1,
                'can_delete' => 1,
            ),
            11 => 
            array (
                'id' => 14,
                'cb_roles_id' => 1,
                'cb_menus_id' => 10,
                'can_browse' => 1,
                'can_create' => 1,
                'can_read' => 1,
                'can_update' => 1,
                'can_delete' => 1,
            ),
            12 => 
            array (
                'id' => 15,
                'cb_roles_id' => 2,
                'cb_menus_id' => 8,
                'can_browse' => 0,
                'can_create' => 0,
                'can_read' => 0,
                'can_update' => 0,
                'can_delete' => 0,
            ),
            13 => 
            array (
                'id' => 16,
                'cb_roles_id' => 2,
                'cb_menus_id' => 10,
                'can_browse' => 1,
                'can_create' => 1,
                'can_read' => 1,
                'can_update' => 1,
                'can_delete' => 1,
            ),
            14 => 
            array (
                'id' => 17,
                'cb_roles_id' => 1,
                'cb_menus_id' => 11,
                'can_browse' => 1,
                'can_create' => 1,
                'can_read' => 1,
                'can_update' => 1,
                'can_delete' => 1,
            ),
        ));
        
        
    }
}