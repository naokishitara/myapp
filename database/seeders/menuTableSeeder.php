<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class menuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = new \App\menu_record_menu([
         'menu' => 'ダンベル'
         ]);
         $menu->save();

  // 2レコード
        $menu = new \App\menu_record_menu([
       'menu' => 'バーベル'
        ]);
        $menu->save();
       $this->call(menuTableSeeder::class);
    }
}
