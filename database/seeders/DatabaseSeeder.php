<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Todo;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user terlebih dahulu
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Buat 5 kategori dengan user_id yang sama
        Category::factory()
            ->count(5)
            ->create([
                'user_id' => $user->id,
            ])
            ->each(function ($category) {
                // Untuk setiap kategori, buat 3 todo
                Todo::factory()->count(3)->create([
                    'category_id' => $category->id,
                    'user_id' => $category->user_id, // Pastikan todo juga memiliki user_id yang sama
                ]);
            });
    }
}