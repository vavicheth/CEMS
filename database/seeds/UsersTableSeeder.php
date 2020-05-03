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
        

        \DB::table('Users')->delete();
        
        \DB::table('Users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@calmette.org',
                'lockout_time' => 0,
                'email_verified_at' => '2020-03-16 08:48:41',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'staff_id' => 1,
                'avatar' => NULL,
                'remember_token' => 'zbZPTVVyjL',
                'active' => '0',
                'created_at' => '2020-03-16 08:48:46',
                'updated_at' => '2020-03-16 08:48:46',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}