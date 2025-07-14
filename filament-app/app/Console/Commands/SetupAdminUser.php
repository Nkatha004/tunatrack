<?php

namespace App\Console\Commands;

use App\Models\AppRole;
use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class SetupAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup-admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup administrator user and define their permissions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $admin = User::findOrFail(1);

        $permissions = Permission::all();
        $adminRole = AppRole::findOrCreate('admin');
        $adminRole->syncPermissions($permissions);
        $admin->assignRole($adminRole);
        $this->info('Admin user and permissions have been set up successfully.');
    }
}
