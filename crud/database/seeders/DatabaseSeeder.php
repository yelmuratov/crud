<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Group;
use App\Models\Student;
use App\Models\User;
use App\Models\Major;
use Illuminate\Database\Seeder;
use App\Models\University;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(20)->create();
        University::factory()->count(20)->create();
        Faculty::factory()->count(20)->create();
        Major::factory()->count(20)->create();
        Group::factory()->count(20)->create();
        Student::factory()->count(20)->create();
    }
}
