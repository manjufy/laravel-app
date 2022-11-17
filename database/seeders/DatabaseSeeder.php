<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'Manjunath Reddy',
            'email' => 'manju@manju.dev'
        ]);

        Listing::factory(10)->create([
            'user_id' => $user->id,
        ]);
    }
}
