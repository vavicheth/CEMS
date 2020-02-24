<?php

use Illuminate\Database\Seeder;

class UisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('uis')->delete();
        
        \DB::table('uis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'Cookies',
                'key' => 'enable-cookies',
            'description' => 'Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())',
                'created_at' => '2020-02-24 10:35:10',
                'updated_at' => '2020-02-24 10:35:11',
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'Sidebar',
                'key' => 'sidebar-o',
            'description' => 'Visible Sidebar by default (screen width > 991px)',
                'created_at' => '2020-02-24 10:36:43',
                'updated_at' => '2020-02-24 10:36:44',
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 'Sidebar',
                'key' => 'sidebar-o-xs',
            'description' => 'Visible Sidebar by default (screen width < 992px)',
                'created_at' => '2020-02-24 10:38:49',
                'updated_at' => '2020-02-24 10:38:50',
            ),
            3 => 
            array (
                'id' => 4,
                'type' => 'Sidebar',
                'key' => 'sidebar-dark',
                'description' => 'Dark themed sidebar',
                'created_at' => '2020-02-24 10:38:51',
                'updated_at' => '2020-02-24 10:38:52',
            ),
            4 => 
            array (
                'id' => 5,
                'type' => 'Sidebar',
                'key' => 'sidebar-mini',
            'description' => 'Mini hoverable Sidebar (screen width > 991px)',
                'created_at' => '2020-02-24 10:38:53',
                'updated_at' => '2020-02-24 10:38:54',
            ),
            5 => 
            array (
                'id' => 6,
                'type' => 'Sidebar',
                'key' => 'sidebar-r',
            'description' => 'Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)',
                'created_at' => '2020-02-24 10:38:54',
                'updated_at' => '2020-02-24 10:38:55',
            ),
            6 => 
            array (
                'id' => 7,
                'type' => 'Sidebar',
                'key' => 'side-scroll',
            'description' => 'Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)',
                'created_at' => '2020-02-24 10:40:32',
                'updated_at' => '2020-02-24 10:40:33',
            ),
            7 => 
            array (
                'id' => 8,
                'type' => 'Side-Overlay',
                'key' => 'side-overlay-hover',
            'description' => 'Hoverable Side Overlay (screen width > 991px)',
                'created_at' => '2020-02-24 10:41:10',
                'updated_at' => '2020-02-24 10:41:10',
            ),
            8 => 
            array (
                'id' => 9,
                'type' => 'Side-Overlay',
                'key' => 'side-overlay-o',
                'description' => 'Visible Side Overlay by default',
                'created_at' => '2020-02-24 10:41:53',
                'updated_at' => '2020-02-24 10:41:54',
            ),
            9 => 
            array (
                'id' => 10,
                'type' => 'Side-Overlay',
                'key' => 'enable-page-overlay',
            'description' => 'Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens',
                'created_at' => '2020-02-24 10:42:45',
                'updated_at' => '2020-02-24 10:42:48',
            ),
            10 => 
            array (
                'id' => 11,
                'type' => 'Header',
                'key' => 'page-header-fixed',
                'description' => 'Fixed Header',
                'created_at' => '2020-02-24 10:44:17',
                'updated_at' => '2020-02-24 10:44:18',
            ),
            11 => 
            array (
                'id' => 12,
                'type' => 'Header',
                'key' => 'page-header-dark',
                'description' => 'Dark themed Header',
                'created_at' => '2020-02-24 10:46:18',
                'updated_at' => '2020-02-24 10:46:20',
            ),
            12 => 
            array (
                'id' => 13,
                'type' => 'Page-Content-Layout',
                'key' => 'main-content-boxed',
            'description' => 'Full width Main Content with a specific maximum width (screen width > 1200px)',
                'created_at' => '2020-02-24 10:47:03',
                'updated_at' => '2020-02-24 10:47:04',
            ),
            13 => 
            array (
                'id' => 14,
                'type' => 'Page-Content-Layout',
                'key' => 'main-content-narrow',
            'description' => 'Full width Main Content with a percentage width (screen width > 1200px)',
                'created_at' => '2020-02-24 10:47:48',
                'updated_at' => '2020-02-24 10:47:49',
            ),
        ));
        
        
    }
}