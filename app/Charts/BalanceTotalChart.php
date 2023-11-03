<?php
namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class BalanceTotalChart
{
    protected $chart;
    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }
    public function build($total, $years, $ingreso_c_b,$ingreso_aso,$gasto_premios,$gasto_tickets,$gasto_c_b,$gasto_disco)
    {
        return $this->chart
            ->lineChart()
            ->setTitle('Evolución del valor total')
            ->setSubtitle('Valores totales de balances en el tiempo')
            ->addData('Comida y bebida', $ingreso_c_b->all())
            ->addData('Asociacion', $ingreso_aso->all())
            ->addData('Premios', $gasto_premios->all())
            ->addData('Tickets', $gasto_tickets->all())
            ->addData('Comida y bebida', $gasto_c_b->all())
            ->addData('Discomovil', $gasto_disco->all())
            ->setXAxis($years->all());
    }
}