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
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->decimal('ingreso_c_b', 8, 2);
            $table->decimal('ingreso_aso', 8, 2);
            $table->decimal('ingreso_chapas', 8, 2);
            $table->decimal('ingreso_guinote', 8, 2);
            $table->decimal('ingreso_patrocinio', 8, 2);
            $table->decimal('gasto_premios', 8, 2);
            $table->decimal('gasto_tickets', 8, 2);
            $table->decimal('gasto_c_b', 8, 2);
            $table->decimal('gasto_disco', 8, 2);
            $table->decimal('gasto_juegos', 8, 2);
            $table->decimal('total')->storedAs('ingreso_c_b + ingreso_aso + ingreso_chapas + ingreso_guinote + ingreso_patrocinio
                                                + gasto_premios + gasto_tickets + gasto_c_b + gasto_disco + gasto_juegos');
            $table->text('notas');
            $table->year('year');
            $table->year('fechas');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance');
    }
};
