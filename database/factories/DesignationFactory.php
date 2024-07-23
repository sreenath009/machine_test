<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Designation>
 */
class DesignationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
        $designation = [
            'Software Engineer',
            'Project Manager',
            'BUsiness Analyst',
            'UI/UX Designer',
            'QA Tester'
        ];
        return [
            'name'=>fake()->unique()->randomElement($designation),
         
        ];
    }
}
