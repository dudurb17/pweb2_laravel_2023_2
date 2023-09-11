<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usersId= DB::table('users')->pluck('id');
        $produtos=DB::table("produto")->pluck('id');

        $faker = Faker::create("pt_BR");

        return [
            'user_id' => $faker->randomElement($usersId),
            'produto_id' =>$faker->randomElement($produtos),
            "cnpj" => fake()->name(),
            'data_pedido'=>fake()->date(),
            'email' => fake()->unique()->safeEmail(),
            'quantidade' => strval(rand(0, 99)),


        ];
    }
}