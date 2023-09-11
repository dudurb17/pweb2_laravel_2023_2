<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;


class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersId= DB::table('users')->pluck('id');
        $produto= DB::table('produto')->pluck('id');

        $faker = Faker::create("pt_BR");


        foreach(\range(1,5) as $index){

            DB::table('pedidos')->insert(
                [
                    'user_id'=>$faker->randomElement($usersId),
                    'pedido_id'=>$faker->randomElement($produto),
                    'cnpj'=>$faker->number,
                    'data_pedido'=>$faker->date,
                    'email'=>$faker->email,
                    'Quantidade'=>range(0, 9999999),

                ]
            );
        }

    }
};