<?php

namespace App\Charts;
use App\Models\Salario;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class GraficoSalario
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        $salario = Salario::all()->count();
        return $this->chart->radialChart()
            ->setTitle('Passing effectiveness.')
            ->setSubtitle('Barcelona city vs Madrid sports.')
            ->addData([$salario, $salario])
            ->setLabels(['Barcelona city', 'Madrid sports'])
            ->setColors(['#D32F2F', '#03A9F4']);
    }
}
