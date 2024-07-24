<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Task;
use Carbon\Carbon;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'completed' => $this->faker->boolean ? Carbon::now()->subDays(rand(0, 365)) : null,
            'deleted_at' => $this->faker->boolean ? Carbon::now() : null,
        ];
    }
}
