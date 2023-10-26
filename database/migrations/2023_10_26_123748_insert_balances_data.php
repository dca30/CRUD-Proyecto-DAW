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
        (5876.75,613.00,-113.67,-80.75,-2400.00,-1200.00,2021,current_timestamp,current_timestamp);
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
