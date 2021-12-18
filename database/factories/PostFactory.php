<?php

namespace Database\Factories;

//use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Post;

//class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    //public function definition()
    $factory->define(Post::class, function (Faker $faker){
        return [
            'category_id' => rand(1, 3),
            'title' => $faker->sentence(),
            'slug' => \Str::slug($faker->sentence()),
            'body' => $faker->paragraph(10),
        ];
});
