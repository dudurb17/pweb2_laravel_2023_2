<?php

namespace App\Charts;
use App\Models\Salario;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SalarioChar
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {

        $salario = Salario::all()->count();
        return $this->chart->horizontalBarChart()
            ->setTitle('Los Angeles vs Miami.')
            ->setSubtitle('Wins during season 2021.')
            ->setColors(['#FFC107', '#D32F2F'])
            ->addData('Salarios', [ $salario])
            
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
