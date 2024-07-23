<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      
        $departments = [
            'IT',
            'HR',
            'Finance',
            'Marketing',
            'Sales'
        ];
        return [
            'name' => fake()->unique()->randomElement($departments),
         
        ];
    }
}
