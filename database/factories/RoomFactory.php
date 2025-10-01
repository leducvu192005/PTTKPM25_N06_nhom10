<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Danh sách các ID user có sẵn
        $userIds = User::pluck('id')->all(); 
        
        return [
            'user_id' => $this->faker->randomElement($userIds), // Chọn ngẫu nhiên User
            'title' => $this->faker->catchPhrase() . ' - Phòng trọ tiện nghi',
            'description' => $this->faker->paragraph(3),
            'address' => $this->faker->streetAddress() . ', ' . $this->faker->city(),
            'price' => $this->faker->numberBetween(1000000, 5000000), // Giá từ 1 triệu đến 5 triệu
            'image_path' => 'room_images/default.jpg', // Placeholder cho ảnh
            'status' => $this->faker->randomElement(['pending', 'approved']), // Một số phòng được phê duyệt
        ];
    }
}