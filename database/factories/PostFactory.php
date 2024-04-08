<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Enums\PostCategoryEnum;
use App\Models\Enums\StateProductEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $enumsKeysCategories = PostCategoryEnum::toArray();

        $name = fake()->word();
        $slug = Str::slug($name, '-');

        return [
            'title' => $name,
            'slug' => $slug,
            'introduction' => fake()->paragraph(),
            'category' => fake()->randomElement($enumsKeysCategories),
            'body' => fake()->paragraph(),
            'is_pinned' => fake()->randomElement([0,1]),
            'status' => 'published',
            'meta_title' => $name,
            'meta_description' => fake()->paragraph(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
