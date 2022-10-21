<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class record_menuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $record_menu = new \App\menu_record_menu([
         'menu' => 'ダンベル'
         ]);
         $record_menu->save();

  // 2レコード
        $record_menu = new \App\menu_record_menu([
       'menu' => 'バーベル'
        ]);
        $menu_record_menu->save();
 
       $this->call(record_menuTableSeeder::class);
    }
}
