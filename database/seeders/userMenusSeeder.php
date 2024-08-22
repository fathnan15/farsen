<?php

namespace Database\Seeders;

use App\Models\UserMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserMenu::create([
            'menu_nm' => 'administrator',
            'created_by' => 1,
            'created_at' => now('Asia/Jakarta'),
            'updated_by' => 1,
        ]);

        UserMenu::create([
            'menu_nm' => 'user',
            'created_by' => 1,
            'created_at' => now('Asia/Jakarta'),
            'updated_by' => 1,
        ]);

        UserMenu::create([
            'menu_nm' => 'warehouse',
            'created_by' => 1,
            'created_at' => now('Asia/Jakarta'),
            'updated_by' => 1,
        ]);
    }
}
