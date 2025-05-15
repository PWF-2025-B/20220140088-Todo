<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'user_id' => User::factory(), // Ini akan membuat user baru untuk setiap kategori
            // Atau gunakan ID user yang sudah ada:
            // 'user_id' => 1, // Jika Anda yakin user dengan ID 1 sudah ada
        ];
    }
}