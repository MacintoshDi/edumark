<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@edumark.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Create admin profile
        $admin->profile()->create([
            'specialty' => 'System Administration',
            'location' => 'Remote',
            'bio' => 'Platform administrator',
        ]);

        // Create sample teacher
        $teacher = User::create([
            'name' => 'John Teacher',
            'email' => 'teacher@edumark.com',
            'password' => Hash::make('password'),
            'role' => 'teacher',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $teacher->profile()->create([
            'specialty' => 'Web Development',
            'location' => 'San Francisco, CA',
            'bio' => 'Experienced web development instructor with 10+ years in the industry.',
            'skills' => ['JavaScript', 'React', 'Node.js', 'Laravel'],
        ]);

        // Create sample student
        $student = User::create([
            'name' => 'Jane Student',
            'email' => 'student@edumark.com',
            'password' => Hash::make('password'),
            'role' => 'student',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $student->profile()->create([
            'specialty' => 'Frontend Development',
            'location' => 'New York, NY',
            'bio' => 'Aspiring frontend developer learning modern web technologies.',
            'skills' => ['HTML', 'CSS', 'JavaScript'],
        ]);
    }
}
