<?php

namespace Database\Seeders;

use App\Utils\AppPermissions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seed the permissions table with all the permissions

        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // roles permissions
        Permission::findOrCreate(AppPermissions::CREATE_ROLES_PERMISSION);
        Permission::findOrCreate(AppPermissions::READ_ROLES_PERMISSION);
        Permission::findOrCreate(AppPermissions::UPDATE_ROLES_PERMISSION);
        Permission::findOrCreate(AppPermissions::DELETE_ROLES_PERMISSION);
        Permission::findOrCreate(AppPermissions::RESTORE_ROLES_PERMISSION);

        // users
        Permission::findOrCreate(AppPermissions::CREATE_USERS_PERMISSION);
        Permission::findOrCreate(AppPermissions::READ_USERS_PERMISSION);
        Permission::findOrCreate(AppPermissions::UPDATE_USERS_PERMISSION);
        Permission::findOrCreate(AppPermissions::DELETE_USERS_PERMISSION);
        Permission::findOrCreate(AppPermissions::RESTORE_USERS_PERMISSION);

        // audits
        Permission::findOrCreate(AppPermissions::CREATE_AUDITS_PERMISSION);
        Permission::findOrCreate(AppPermissions::READ_AUDITS_PERMISSION);
        Permission::findOrCreate(AppPermissions::UPDATE_AUDITS_PERMISSION);
        Permission::findOrCreate(AppPermissions::DELETE_AUDITS_PERMISSION);
        Permission::findOrCreate(AppPermissions::RESTORE_AUDITS_PERMISSION);

        // companies
        Permission::findOrCreate(AppPermissions::CREATE_COMPANIES_PERMISSION);
        Permission::findOrCreate(AppPermissions::READ_COMPANIES_PERMISSION);
        Permission::findOrCreate(AppPermissions::UPDATE_COMPANIES_PERMISSION);
        Permission::findOrCreate(AppPermissions::DELETE_COMPANIES_PERMISSION);
        Permission::findOrCreate(AppPermissions::RESTORE_COMPANIES_PERMISSION);

        // offices
        Permission::findOrCreate(AppPermissions::CREATE_OFFICES_PERMISSION);
        Permission::findOrCreate(AppPermissions::READ_OFFICES_PERMISSION);
        Permission::findOrCreate(AppPermissions::UPDATE_OFFICES_PERMISSION);
        Permission::findOrCreate(AppPermissions::DELETE_OFFICES_PERMISSION);
        Permission::findOrCreate(AppPermissions::RESTORE_OFFICES_PERMISSION);
    }
}
