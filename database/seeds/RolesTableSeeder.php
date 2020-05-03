<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('Roles')->delete();

        \DB::table('Roles')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Administrators',
                'guard_name' => 'web',
                'created_at' => '2020-03-04 21:10:39',
                'updated_at' => '2020-03-04 21:10:39',
                'deleted_at' => NULL,
            ),
        ));


    }
}
