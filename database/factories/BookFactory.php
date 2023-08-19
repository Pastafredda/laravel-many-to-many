<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "code" => fake() -> numerify('#############'),
            "title" => fake() ->sentence(3),
            "author" => fake() ->name(),
            "price" => fake() ->numberBetween(0, 50000),
            "plot" => fake() ->paragraph(1, true),
            "editor" => fake() ->words(3, true),
            'is_available' => fake() ->randomElement(['si', 'no']),

        ];
    }
}
