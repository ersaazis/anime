<?php

use Illuminate\Database\Seeder;

class CbRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cb_roles')->delete();
        
        \DB::table('cb_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Member',
            ),
        ));
        
        
    }
}