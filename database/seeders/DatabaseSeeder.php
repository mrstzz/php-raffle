<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Raffle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Raffle::factory(1)->create();
        User::factory(1)->create([
            'email' => 'joe@example.com',
        ]);
    }
}
