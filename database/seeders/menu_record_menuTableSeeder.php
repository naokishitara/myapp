<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class menu_record_menuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $menu_record_menu = new \App\menu_record_menu([
         'menu' => 'ダンベル'
         ]);
         $menu_record_menu->save();

  // 2レコード
        $menu_record_menu = new \App\menu_record_menu([
       'menu' => 'バーベル'
        ]);
        $menu_record_menu->save();
    
       $this->call(menu_record_menuTableSeeder::class);
    }
}