<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup-app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup application with initial configurations and data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate:fresh');
        $this->call('db:seed');
        $this->call('app:setup-admin-user');
        $this->call('storage:link');
        // $this->call('optimize');
        // $this->call('config:clear');
        // $this->call('route:cache');
        // $this->call('view:cache');
    }
}
