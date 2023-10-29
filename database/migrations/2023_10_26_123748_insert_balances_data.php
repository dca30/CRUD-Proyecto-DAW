<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $sql = "
        INSERT INTO public.balances (ingreso_c_b, ingreso_aso, gasto_premios, gasto_tickets, gasto_c_b, gasto_disco, year, created_at, updated_at)
        VALUES
        (   5276.37,  -- Bebida_comida_beneficio
            500.00,   -- Aportacion_asociacion
            -120.25,   -- Premios_gasto
            -100.75,   -- Tickets_gasto
            -2500.00,   -- Bebida_comida_gasto
            -1000.00,  -- Discomovil_coste
            2023,     -- Year
            current_timestamp,
            current_timestamp
        ),
        (3941.10,418.00,-150.18,-88.35,-2300.00,-800.00,2022,current_timestamp,current_timestamp),
        (5876.75,613.00,-113.67,-80.75,-2400.00,-1200.00,2021,current_timestamp,current_timestamp),
        (4549.47,580.00,-128.46,-82.50,-2150.00,-1050.00,2019,current_timestamp,current_timestamp),
        (4731.85,535.00,-115.06,-75.35,-2280.00,-900.00,2018,current_timestamp,current_timestamp),
        (3866.14,490.00,-100.80,-72.10,-2800.00,-850.00,2017,current_timestamp,current_timestamp),
        (4456.96,540.00,-95.34,-69.35,-2550.00,-1050.00,2016,current_timestamp,current_timestamp),
        (5163.22,600.00,-110.43,-78.00,-2000.00,-1050.00,2015,current_timestamp,current_timestamp),
        (4789.47,550.00,-105.69,-80.75,-2300.00,-950.00,2014,current_timestamp,current_timestamp),
        (3748.69,580.00,-98.04,-60.80,-2290.00,-1250.00,2013,current_timestamp,current_timestamp),
        (4732.12,480.00,-107.10,-75.10,-2700.00,-950.00,2012,current_timestamp,current_timestamp),
        (6148.65,610.00,-115.60,-70.60,-2390.00,-1100.00,2011,current_timestamp,current_timestamp),
        (3167.91,565.00,-118.25,-65.45,-2100.00,-1000.00,2010,current_timestamp,current_timestamp);
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
