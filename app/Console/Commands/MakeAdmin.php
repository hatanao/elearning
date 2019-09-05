<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Hash;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a master admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::create([
            'name' => 'Master Admin',
            'email' => 'master@admin.com',
            'password' => Hash::make('masteradmin')
        ]);

        $user->is_admin = 1;
        $user->save();
    }
}
