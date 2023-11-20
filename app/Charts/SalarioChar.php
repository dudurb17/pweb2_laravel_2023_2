<?php

namespace App\Charts;
use App\Models\Salario;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use PhpParser\Node\Stmt\Foreach_;

class SalarioChar
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {

        $salario = Salario::all();

        $i=0;
        foreach ($salario as $item) {

            $salarioArray[$i]=$item->salario;
            $i++;
        }
        return $this->chart->horizontalBarChart()
            ->setTitle('Salario')
            ->setSubtitle('Salario')
            ->setColors(['#FFC107', '#D32F2F'])
            ->addData('Salario dos funcionario', $salarioArray)
            ->setXAxis(['salarios']);
    }
}