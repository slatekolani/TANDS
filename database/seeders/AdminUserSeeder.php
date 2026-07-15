<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $email = 'edgarfwalo99@gmail.com';

        if (User::where('email', $email)->exists()) {
            $this->command->info("Admin user $email already exists, skipping.");

            return;
        }

        $password = Str::random(14);

        User::create([
            'name' => 'TANDS Admin',
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->command->warn('=================================================');
        $this->command->warn(" Admin login created:");
        $this->command->warn(" Email:    $email");
        $this->command->warn(" Password: $password");
        $this->command->warn(" Change this password after your first login.");
        $this->command->warn('=================================================');
    }
}
