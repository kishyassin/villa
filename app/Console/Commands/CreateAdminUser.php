<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; // Ensure your User model is properly imported
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $name = $this->ask('Enter the admin name');
        $email = $this->ask('Enter the admin email');
        $password = $this->secret('Enter the admin password');

        if (User::where('email', $email)->exists()) {
            $this->error('A user with this email already exists.');
            return Command::FAILURE;
        }

        // Create the admin user
       User::create([
        'name' => $name,
        'email' => $email,
        'password' => Hash::make($password),
        'role' => 'admin',
        'avatar' => 'user-icon', // Default avatar representation
    ]);


        $this->info('Admin user created successfully.');
        return Command::SUCCESS;
    }
}
