<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Ersa Azis Mansyur',
                'email' => 'eam24maret@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$E2U1Wuz.iyzmVPW3UjMTPO5vZ7w4AIE5/RhV.2dPrLtIyn06j3YMG',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'photo' => NULL,
                'cb_roles_id' => 1,
                'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36',
                'login_at' => '2020-01-25 22:04:28',
            ),
        ));
        
        
    }
}