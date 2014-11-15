<?php

use Rico\Auth\Role;
use Rico\Auth\User;
use Rico\Auth\Permission;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        DB::table('assigned_roles')->delete();
        DB::table('permission_role')->delete();
        DB::table('roles')->delete();
        DB::table('permissions')->delete();

        $user = new User();
        $user->email = "boxfrommars@gmail.com";
        $user->username = "boxfrommars";
        $user->password = "test";
        $user->password_confirmation = "test";
        $user->confirmed = 1;
        $user->save();

        $realtorRole = new Role();
        $realtorRole->name = 'user';
        $realtorRole->title = 'Пользователь';
        $realtorRole->save();

        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->title = 'Админ';
        $adminRole->save();

        $manageDashboard = new Permission();
        $manageDashboard->name = 'manage_dashboard';
        $manageDashboard->display_name = 'администрирование сайта';
        $manageDashboard->save();

        $accessCabinet = new Permission();
        $accessCabinet->name = 'access_cabinet';
        $accessCabinet->display_name = 'доступ к личному кабинету';
        $accessCabinet->save();

        $adminRole->perms()->sync([$manageDashboard->id]);

        $user->attachRole($adminRole);
    }
}