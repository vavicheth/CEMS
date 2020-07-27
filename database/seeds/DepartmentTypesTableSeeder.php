<?php

use Illuminate\Database\Seeder;

class DepartmentTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('department_types')->delete();
        
        \DB::table('department_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'S 1',
                'name' => 'Administrations',
                'description' => NULL,
                'active' => 1,
                'created_at' => '2020-07-16 10:15:02',
                'updated_at' => '2020-07-16 10:15:03',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'S 2',
                'name' => 'Pharmacies',
                'description' => NULL,
                'active' => 1,
                'created_at' => '2020-07-16 10:15:22',
                'updated_at' => '2020-07-16 10:15:22',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'S 3',
                'name' => 'Service Cliniques',
                'description' => NULL,
                'active' => 1,
                'created_at' => '2020-07-16 10:15:49',
                'updated_at' => '2020-07-16 10:15:50',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'S 3',
                'name' => 'Service Médico-techniques',
                'description' => NULL,
                'active' => 1,
                'created_at' => '2020-07-16 10:18:33',
                'updated_at' => '2020-07-16 10:18:33',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}