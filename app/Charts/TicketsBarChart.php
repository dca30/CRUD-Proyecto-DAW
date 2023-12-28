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

        $ticket_vendidos = [
            $ticket->tickets_vendidos_cubata,
            $ticket->tickets_vendidos_cerveza,
            $ticket->tickets_vendidos_agua_refresco,
            $ticket->tickets_vendidos_bocadillo,
            $ticket->tickets_vendidos_copa,
            $ticket->tickets_vendidos_litro_cerveza,
        ];
        return $this->chart
            ->horizontalBarChart()
            ->setTitle($ticket->year)
            ->setSubtitle($text[0])
            ->setHeight(550)
            ->addData($text[1], $ticket_totales)
            ->addData($text[2], $ticket_vendidos)
            ->setXAxis($bebidas);
    }
}