<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'role_access',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:12:05',
                'updated_at' => '2020-05-03 04:12:05',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'role_show',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:12:15',
                'updated_at' => '2020-05-03 04:12:15',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'role_create',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:12:45',
                'updated_at' => '2020-05-03 04:12:45',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'role_update',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:12:53',
                'updated_at' => '2020-05-03 04:12:53',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'role_delete',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:13:08',
                'updated_at' => '2020-05-03 04:13:08',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'permission_access',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:13:37',
                'updated_at' => '2020-05-03 04:13:37',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'permission_show',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:13:52',
                'updated_at' => '2020-05-03 04:13:52',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'permission_create',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:14:01',
                'updated_at' => '2020-05-03 04:14:01',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'permission_update',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:14:11',
                'updated_at' => '2020-05-03 04:14:11',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'permission_delete',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:14:25',
                'updated_at' => '2020-05-03 04:14:25',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'user_management_access',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:14:34',
                'updated_at' => '2020-05-03 04:14:34',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'user_access',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:14:44',
                'updated_at' => '2020-05-03 04:14:44',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'user_show',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:14:54',
                'updated_at' => '2020-05-03 04:14:54',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'user_create',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:15:00',
                'updated_at' => '2020-05-03 04:15:00',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'user_update',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:15:15',
                'updated_at' => '2020-05-03 04:15:15',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'user_delete',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:15:39',
                'updated_at' => '2020-05-03 04:15:39',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'department_access',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:16:01',
                'updated_at' => '2020-05-03 04:56:49',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'department_show',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:16:10',
                'updated_at' => '2020-05-03 04:16:10',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'department_create',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:16:16',
                'updated_at' => '2020-05-03 04:16:16',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'department_update',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:16:21',
                'updated_at' => '2020-05-03 04:16:21',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'department_delete',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:16:26',
                'updated_at' => '2020-05-03 04:16:26',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'patient_access',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:38:59',
                'updated_at' => '2020-05-03 04:38:59',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'patient_show',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:39:05',
                'updated_at' => '2020-05-03 04:39:05',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'patient_create',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:39:13',
                'updated_at' => '2020-05-03 04:39:13',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'patient_update',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:39:26',
                'updated_at' => '2020-05-03 04:39:26',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'patient_delete',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:39:34',
                'updated_at' => '2020-05-03 04:39:34',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'setting_access',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-03 04:41:28',
                'updated_at' => '2020-05-03 04:41:28',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'patient_accompany_access',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-04 00:22:17',
                'updated_at' => '2020-05-04 00:22:17',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'patient_accompany_show',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-04 00:22:24',
                'updated_at' => '2020-05-04 00:22:24',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'patient_accompany_create',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-04 00:22:29',
                'updated_at' => '2020-05-04 00:22:29',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'patient_accompany_update',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-04 00:22:34',
                'updated_at' => '2020-05-04 00:22:34',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'patient_accompany_delete',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-04 00:22:39',
                'updated_at' => '2020-05-04 00:22:39',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'patient_status',
                'guard_name' => 'web',
                'description' => NULL,
                'created_at' => '2020-05-06 18:25:32',
                'updated_at' => '2020-05-06 18:25:32',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}