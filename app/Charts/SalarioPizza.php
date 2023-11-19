<?php

namespace App\Charts;

use App\Models\Funcionario;
use App\Models\Pedido;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SalarioPizza
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $funcionario = Funcionario::all()->count();
        $pedidos=Pedido::all()->count();


        return $this->chart->pieChart()
            ->setTitle('Relação de funcionarios e pedidos')
            ->setSubtitle('Dados de 2023')
            ->addData([$funcionario, $pedidos])
            ->setLabels(['Qantidades de funcionarios', 'Quantidades de pedidos']);
    }
}