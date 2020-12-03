<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_name' => $this->faker->word(),
            'calegory_des' => $this->faker->text(100),
            'cat_img' => 'category.jpg',
            'pub_status' => $this->faker->numberBetween(0,1),
            'created_at' => '20-11-14',
            'updated_at' => '20-11-14',
            'remember_token' => Str::random(10)
        ];
    }
}
