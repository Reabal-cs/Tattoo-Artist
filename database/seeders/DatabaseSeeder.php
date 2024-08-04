<?php

namespace Database\Seeders;
use App\Models\Image;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
class ImageSeeder extends Seeder
{
    public function run()
    {
        Image::create([
            'name' => 'Image 1',
            'description' => 'Description of Image 1',
            'category' => 'Category 1',
            'file_path' => 'path/to/image1.png',
        ]);

        // Add more image records as needed
    }
}
