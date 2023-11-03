<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $sql = "
        INSERT INTO public.tickets (
        tickets_totales_cubata, tickets_comprados_cubata, precio_ticket_cubata, 
        tickets_totales_cerveza, tickets_comprados_cerveza, precio_ticket_cerveza, 
        tickets_totales_agua_refresco, tickets_comprados_agua_refresco, precio_ticket_agua_refresco, 
        tickets_totales_bocadillo, tickets_comprados_bocadillo, precio_ticket_bocadillo, 
        tickets_totales_copa, tickets_comprados_copa, precio_ticket_copa, 
        tickets_totales_litro_cerveza, tickets_comprados_litro_cerveza, precio_ticket_litro_cerveza, 
        year, created_at, updated_at) VALUES
        (2500,2381,3.5,2600,2546,1,1900,1508,1,90,87,5,500,89,7,400,195,8,2010, current_timestamp, current_timestamp),
        (3000,2761,3.5,3200,3094,1,2000,1646,1,80,80,5,400,115,7,500,240,8,2011, current_timestamp, current_timestamp),
        (3200,3007,3.5,3300,3104,1,1500,1489,1,90,90,5,500,120,7,450,220,8,2012, current_timestamp, current_timestamp),
        (3500,3164,3.5,3500,3456,1,1800,1643,1,100,98,5,500,93,7,400,218,8,2013, current_timestamp, current_timestamp),
        (3000,2769,3.5,3200,3001,1,2000,1846,1,100,96,5,600,141,7,500,294,8,2014, current_timestamp, current_timestamp),
        (2800,2547,3.5,3000,2980,1,2000,1733,1,100,94,5,500,128,7,500,249,8,2015, current_timestamp, current_timestamp),
        (2800,2645,4,3000,2784,1,2000,1827,1,90,90,5,600,132,8,550,315,10,2016, current_timestamp, current_timestamp),
        (3000,2911,4,3100,3004,1,1800,1645,1,80,80,5,400,99,8,500,316,10,2017, current_timestamp, current_timestamp),
        (3200,2894,4,3100,2786,1,1700,1690,1,100,95,5,500,114,8,400,286,10,2018, current_timestamp, current_timestamp),
        (3000,2932,4,3000,2941,1.5,1800,1547,1,100,85,5,500,101,8,500,294,10,2019, current_timestamp, current_timestamp),
        (2800,2488,4,3000,2369,1.5,2000,1986,1,90,90,5,400,92,8,450,167,10,2021, current_timestamp, current_timestamp),
        (3200,3102,4,3500,3128,1.5,1800,1664,1,100,98,5,500,84,8,500,237,10,2022, current_timestamp, current_timestamp),
        (3500,3385,4,3000,2804,1.5,2000,1806,1,100,100,5,500,150,8,500,321,10,2023, current_timestamp, current_timestamp);
        ";

        DB::statement($sql);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};