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

        $faker = Faker::create("pt_BR");


        foreach(\range(1,5) as $index){

            DB::table('pedidos')->insert(
                [
                    'user_id'=>$faker->randomElement($usersId),
                    'pedido_id'=>"1",
                    'cnpj'=>$faker->number,
                    'data_pedido'=>$faker->date,
                    'email'=>$faker->email,
                    'Quantidade'=>range(0, 9999999),
                    'nome_peca'=>$faker->name

                ]
            );
        }

    }
};
