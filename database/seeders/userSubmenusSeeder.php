<?php

namespace Database\Seeders;

use App\Models\UserSubmenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSubmenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserSubmenu::create([
            'submenu_nm'    => 'Profile',
            'route_nm'      => 'profile',
            'path'          => 'user/profile',
            'menu_id'       => 2,
            'created_by'    => 1,
            'created_at'    => now('Asia/Jakarta'),
            'updated_by' => 1,
        ]);

        UserSubmenu::create([
            'submenu_nm'    => 'Settings',
            'menu_id'       => 2,
            'created_by'    => 1,
            'created_at'    => now('Asia/Jakarta'),
            'updated_by' => 1,
        ]);

        UserSubmenu::create([
            'submenu_nm'    => 'Account Setting',
            'route_nm'      => 'account.setting',
            'path'          => 'user/settings/account setting',
            'relate_id'     => 2,
            'created_by'    => 1,
            'created_at'    => now('Asia/Jakarta'),
            'updated_by' => 1,
        ]);

        UserSubmenu::create([
            'submenu_nm'    => 'Profile Setting',
            'route_nm'      => 'profile.setting',
            'path'          => 'user/settings/profile setting',
            'relate_id'     => 2,
            'created_by'    => 1,
            'created_at'    => now('Asia/Jakarta'),
            'updated_by' => 1,
        ]);

        UserSubmenu::create([
            'submenu_nm' => 'Application Management',
            'menu_id' => 1,
            'created_by' => 1,
            'created_at' => now('Asia/Jakarta'),
            'updated_by' => 1,
        ]);

        UserSubmenu::create([
            'submenu_nm'    => 'Route',
            'route_nm'      => 'app.route',
            'path'          => 'administrator/application management/route',
            'relate_id'     => 5,
            'created_by'    => 1,
            'created_at'    => now('Asia/Jakarta'),
            'updated_by' => 1,
        ]);

        UserSubmenu::create([
            'submenu_nm'    => 'Menu',
            'route_nm'      => 'app.menu',
            'path'          => 'administrator/application management/menu',
            'relate_id'     => 5,
            'created_by'    => 1,
            'created_at'    => now('Asia/Jakarta'),
            'updated_by' => 1,
        ]);

        UserSubmenu::create([
            'submenu_nm'    => 'Users Management',
            'menu_id'       => 1,
            'created_by'    => 1,
            'created_at'    => now('Asia/Jakarta'),
            'updated_by' => 1,
        ]);

        UserSubmenu::create([
            'submenu_nm'    => 'User Registation',
            'route_nm'      => 'app.users.registation',
            'path'          => 'administrator/users management/user registration',
            'relate_id'     => 8,
            'created_by'    => 1,
            'created_at'    => now('Asia/Jakarta'),
            'updated_by' => 1,
        ]);

        UserSubmenu::create([
            'submenu_nm'    => 'User Access',
            'route_nm'      => 'app.users.access',
            'path'          => 'administrator/users management/user access',
            'relate_id'     => 8,
            'created_by'    => 1,
            'created_at'    => now('Asia/Jakarta'),
            'updated_by' => 1,
        ]);

        UserSubmenu::create([
            'submenu_nm'    => 'Inventory',
            'route_nm'      => 'warehouse.inventory',
            'path'          => 'warehouse/inventory',
            'menu_id'       => 3,
            'created_by'    => 1,
            'created_at'    => now('Asia/Jakarta'),
            'updated_by' => 1,
        ]);
    }
}
