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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->integer('tickets_totales_cubata');
            $table->integer('tickets_vendidos_cubata');
            $table->decimal('precio_ticket_cubata', 4, 2);

            $table->integer('tickets_totales_cerveza');
            $table->integer('tickets_vendidos_cerveza');
            $table->decimal('precio_ticket_cerveza', 4, 2);

            $table->integer('tickets_totales_agua_refresco');
            $table->integer('tickets_vendidos_agua_refresco');
            $table->decimal('precio_ticket_agua_refresco', 4, 2);

            $table->integer('tickets_totales_bocadillo');
            $table->integer('tickets_vendidos_bocadillo');
            $table->decimal('precio_ticket_bocadillo', 4, 2);

            $table->integer('tickets_totales_copa');
            $table->integer('tickets_vendidos_copa');
            $table->decimal('precio_ticket_copa', 4, 2);

            $table->integer('tickets_totales_litro_cerveza');
            $table->integer('tickets_vendidos_litro_cerveza');
            $table->decimal('precio_ticket_litro_cerveza', 4, 2);

            $table->year('year');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
