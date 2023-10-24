<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Job::factory(10)->create();
        Division::factory()->create([
            'name' => 'Keuangan',
            'job_id' => Job::factory()->create()->id,
        ]);
        Division::factory()->create([
            'name' => 'HRD',
            'job_id' => Job::factory()->create()->id,
        ]);
        Division::factory()->create([
            'name' => 'Pemasaran',
            'job_id' => Job::factory()->create()->id,
        ]);
        Division::factory()->create([
            'name' => 'Produksi',
            'job_id' => Job::factory()->create()->id,
        ]);
        Division::factory()->create([
            'name' => 'Divisi Umum',
            'job_id' => Job::factory()->create()->id,
        ]);
        Division::factory()->create([
            'name' => 'Teknologi Informasi',
            'job_id' => Job::factory()->create()->id,
        ]);
        Employee::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
