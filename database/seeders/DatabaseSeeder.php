<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

     //   \App\Models\Category::factory()->count(10)->create();
    
   //  \App\Models\Tarif::factory()->count(3)->create();
    \App\Models\ProductHasTarif::factory()->count(30)->create();
    
      
    
    }
}
