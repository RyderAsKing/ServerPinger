<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Server>
 */
class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $options = ['online', 'offline'];
        $status = array_rand($options);
        return [
            'name' => 'Server ' . Str::random(3),
            'ip' => Str::random(10),
            'port' => Str::random(3),
            'status' => $options[$status],
            'last_check' => now(),
        ];
    }
}
