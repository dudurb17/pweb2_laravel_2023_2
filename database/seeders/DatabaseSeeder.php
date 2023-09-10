<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        \App\Models\User::factory(100)->create();
        \App\Models\Produto::factory(100)->create();
        \App\Models\Pedido::factory(100)->create();
    }
}
