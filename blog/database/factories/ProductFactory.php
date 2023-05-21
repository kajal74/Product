<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DummyFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'product_name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(640, 480, 'products', true),

        ];
    }
}
