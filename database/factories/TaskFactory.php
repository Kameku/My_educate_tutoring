<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TaskFactory extends Factory
{
    
    public function definition()
    {
        $from = User::all()->random(1)->pluck('name');
        foreach ($from as $from) {
            $from;
        };

        $sing_to = User::all()->random(1)->pluck('id');
        foreach ($sing_to as $sing_to) {
            $sing_to;
        };

        $all_roles_in_database = Role::all()->pluck('name')->random(1);
        foreach ($all_roles_in_database as $group) {
            $group;
        };

        return [
            'from' => $from,
            'priority' => $this->faker->randomElement(['Low', 'Medium', 'High']),
            'title' => $this->faker->unique()->sentence(),
            'content' => $this->faker->text(400),
            'group' => $group,
            'sing_to' => $sing_to,
            'due_date' => $this->faker->randomElement(['2022-02-23', '2022-02-24', '2022-02-04']),
            'status' => $this->faker->randomElement([10, 20, 50, 80, 90, 100]),
            'user_id' => $sing_to
        ];
    }
}

