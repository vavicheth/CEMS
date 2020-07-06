<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provinces')->delete();
        
        \DB::table('provinces')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 1,
                'name' => 'Banteay Meanchey',
                'name_kh' => 'បន្ទាយមានជ័យ',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 2,
                'name' => 'Battambang',
                'name_kh' => 'បាត់ដំបង',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'លេខ​៤៩៣ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 3,
                'name' => 'Kampong Cham',
                'name_kh' => 'កំពង់ចាម',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 4,
                'name' => 'Kampong Chhnang',
                'name_kh' => 'កំពង់ឆ្នាំង',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 5,
                'name' => 'Kampong Speu',
                'name_kh' => 'កំពង់ស្ពឺ',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'លេខ​៤៩៣​ប្រ,ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 6,
                'name' => 'Kampong Thom',
                'name_kh' => 'កំពង់ធំ',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣​ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 7,
                'name' => 'Kampot',
                'name_kh' => 'កំពត',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣ ​ប្រ.ក របស់ក្រសួងមហាផ្ទៃ',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => 8,
                'name' => 'Kandal',
                'name_kh' => 'កណ្ដាល',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣​ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => 9,
                'name' => 'Koh Kong',
                'name_kh' => 'កោះកុង',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣ ប្រ.ក របស់ក្រសួងមហាផ្ទៃ',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            9 => 
            array (
                'id' => 10,
                'code' => 10,
                'name' => 'Kratie',
                'name_kh' => 'ក្រចេះ',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            10 => 
            array (
                'id' => 11,
                'code' => 11,
                'name' => 'Mondul Kiri',
                'name_kh' => 'មណ្ឌលគិរី',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            11 => 
            array (
                'id' => 12,
                'code' => 12,
                'name' => 'Phnom Penh',
                'name_kh' => 'ភ្នំពេញ',
                'type' => 'Capital',
                'type_kh' => 'រាជធានី',
                'reference' => 'ប្រកាសលេខ ៤៩៣ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            12 => 
            array (
                'id' => 13,
                'code' => 13,
                'name' => 'Preah Vihear',
                'name_kh' => 'ព្រះវិហារ',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            13 => 
            array (
                'id' => 14,
                'code' => 14,
                'name' => 'Prey Veng',
                'name_kh' => 'ព្រៃវែង',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣​ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            14 => 
            array (
                'id' => 15,
                'code' => 15,
                'name' => 'Pursat',
                'name_kh' => 'ពោធិ៍សាត់',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'លេខ​៤៩៣​ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            15 => 
            array (
                'id' => 16,
                'code' => 16,
                'name' => 'Ratanak Kiri',
                'name_kh' => 'រតនគិរី',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            16 => 
            array (
                'id' => 17,
                'code' => 17,
                'name' => 'Siemreap',
                'name_kh' => 'សៀមរាប',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            17 => 
            array (
                'id' => 18,
                'code' => 18,
                'name' => 'Preah Sihanouk',
                'name_kh' => 'ព្រះសីហនុ',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ព្រះរាជក្រឹត្យលេខ នស/រកត/១២០៨/១៣៨៥',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            18 => 
            array (
                'id' => 19,
                'code' => 19,
                'name' => 'Stung Treng',
                'name_kh' => 'ស្ទឹងត្រែង',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            19 => 
            array (
                'id' => 20,
                'code' => 20,
                'name' => 'Svay Rieng',
                'name_kh' => 'ស្វាយរៀង',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣​ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            20 => 
            array (
                'id' => 21,
                'code' => 21,
                'name' => 'Takeo',
                'name_kh' => 'តាកែវ',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣​ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            21 => 
            array (
                'id' => 22,
                'code' => 22,
                'name' => 'Oddar Meanchey',
                'name_kh' => 'ឧត្ដរមានជ័យ',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ប្រកាសលេខ ៤៩៣ ប្រ.ក',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            22 => 
            array (
                'id' => 23,
                'code' => 23,
                'name' => 'Kep',
                'name_kh' => 'កែប',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ព្រះរាជក្រឹត្យលេខ នស/រកត/១២០៨/១៣៨៣',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            23 => 
            array (
                'id' => 24,
                'code' => 24,
                'name' => 'Pailin',
                'name_kh' => 'ប៉ៃលិន',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'នស/រកម/1208/1384​',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
            24 => 
            array (
                'id' => 25,
                'code' => 25,
                'name' => 'Tboung Khmum',
                'name_kh' => 'ត្បូងឃ្មុំ',
                'type' => 'Province',
                'type_kh' => 'ខេត្ត',
                'reference' => 'ព្រះរាជក្រឹក្យលេខ នស/រកត/១២១៣/១៤៤៥',
                'official_note' => NULL,
                'description' => NULL,
                'created_at' => '2020-07-06 09:40:11',
                'updated_at' => '2020-07-06 09:40:13',
            ),
        ));
        
        
    }
}