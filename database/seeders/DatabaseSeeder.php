<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $count = User::all()->count();
        if ($count == 0) {
            echo 'create user';
            \App\Models\User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password'   => bcrypt('secret'),
                'is_admin'   => 1,
                'is_super'   => 1,
            ]);
        } else {
            echo "Qtde: " . $count . " Records Inside Database!";
        }
        $this->call(StateTableSeeder::class);
        $this->call(CityTableSeeder::class);

    }
}
