<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class TicketsBarChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($ticket,$bebidas,$text)
    {

        $ticket_totales = [
            $ticket->tickets_totales_cubata,
            $ticket->tickets_totales_cerveza,
            $ticket->tickets_totales_agua_refresco,
            $ticket->tickets_totales_bocadillo,
            $ticket->tickets_totales_copa,
            $ticket->tickets_totales_litro_cerveza,
        ];

        $ticket_comprados = [
            $ticket->tickets_comprados_cubata,
            $ticket->tickets_comprados_cerveza,
            $ticket->tickets_comprados_agua_refresco,
            $ticket->tickets_comprados_bocadillo,
            $ticket->tickets_comprados_copa,
            $ticket->tickets_comprados_litro_cerveza,
        ];

        $ticket_precio = [
            $ticket->precio_ticket_cubata,
            $ticket->precio_ticket_cerveza,
            $ticket->precio_ticket_agua_refresco,
            $ticket->precio_ticket_bocadillo,
            $ticket->precio_ticket_copa,
            $ticket->precio_ticket_litro_cerveza,
        ];
        return $this->chart
            //->pieChart()
            //->donutChart()
            //->radialChart()    
            //->lineChart()
            //->radarChart()
            //->polarAreaChart()
            //->heatMapChart() el peor de todos
            //->radarChart()
            ->horizontalBarChart()
            ->setTitle($ticket->year)
            ->setSubtitle($text[0])
            ->addData($text[1], $ticket_totales)
            ->addData($text[2], $ticket_comprados)
            ->setXAxis($bebidas);
    }
}
//Donut Chart, Radial Bar Chart, Polar Area Chart, Line Chart, Area Chart, Bar Chart, Horizontal Bar Chart, Heatmap Chart, Radar Chart