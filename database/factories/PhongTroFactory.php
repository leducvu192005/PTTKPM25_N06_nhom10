<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhongTro>
 */
class PhongTroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1, // tạm thời fake cho user_id = 1
            'tieu_de' => $this->faker->sentence(6),
            'mo_ta' => $this->faker->paragraph(3),
            'gia' => $this->faker->numberBetween(1000000, 5000000),
            'dia_chi' => $this->faker->address(),
            'dien_tich' => $this->faker->numberBetween(15, 50) . ' m2',
            'so_dien_thoai' => $this->faker->phoneNumber(),
        ];
    }
}
