<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = [
            'Volleyball',
            'Nike Sportwear'
        ];
        $img = [
            'uploads/NiFE7rsuHG3pT68Xja6A8mGvfCrwMs6da8pH6bIm.jpg',
            'uploads/s2vb3K0BCVsJAtv5SLf10qQfPsSI5n1Mxli0TuuV.jpg'
        ];
        return [
            'name' => $this->faker->sentence(2),
            'description' => $this->faker->text(150),
            'category' => $categories[rand(0, 1)],
            'firm' => $this->faker->text(10),
            'price' => $this->faker->numberBetween(100, 680),
            'sale' => $this->faker->numberBetween(-1, 20),
            'img' => $img[rand(0,1)],
        ];
    }
}
