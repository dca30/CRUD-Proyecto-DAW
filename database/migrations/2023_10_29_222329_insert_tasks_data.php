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
        INSERT INTO public.tasks (descripcion, dificultad,responsables, created_at, updated_at) VALUES
        ('Carteles: Diseñar e imprimir','B','', current_timestamp, current_timestamp),
        ('Carteles: Colgarlos por los pueblos','B','', current_timestamp, current_timestamp),
        ('Tickets: comprar nuevos','B','', current_timestamp, current_timestamp),
        ('Bebida: hacer pedido + descargar en bar + control en fiestas','A','', current_timestamp, current_timestamp),
        ('Escenario: montar + desmontar','A','', current_timestamp, current_timestamp),
        ('Generador electrico: pedir a ayuntamiento + control combustible + reponer','M','', current_timestamp, current_timestamp),
        ('Bingo: comprar cartones + sellarlos','B','', current_timestamp, current_timestamp),
        ('Equipo musica: conectar equipo + preparar playlist','B','', current_timestamp, current_timestamp),
        ('Limpieza: limpiar trinquete y plaza','B','', current_timestamp, current_timestamp),
        ('Pregon: escribirlo y leerlo','M','', current_timestamp, current_timestamp),
        ('Cena disfraces: preparar mesas + musica','B','', current_timestamp, current_timestamp),
        ('Discomovil: contratar + pagar','A','', current_timestamp, current_timestamp),
        ('Juegos infantiles: preparar','M','', current_timestamp, current_timestamp),
        ('Embutido/Carne: comprar para premios + bocadillos','B','', current_timestamp, current_timestamp),
        ('Pan: engargar + comprar para cada dia','B','', current_timestamp, current_timestamp),
        ('Chocolatada: comprar + preparar + repartir','M','', current_timestamp, current_timestamp),
        ('Trofeos: comprar para concurso guiñote + fotografia + chapas','B','', current_timestamp, current_timestamp),
        ('Concurso fotografia: organizar','B','', current_timestamp, current_timestamp),
        ('Concurso guiñote: organizar','B','', current_timestamp, current_timestamp),
        ('Concurso chapas: organizar','B','', current_timestamp, current_timestamp),
        ('Traca: comprar + organizar','B','', current_timestamp, current_timestamp),
        ('Baños portatiles: alquilar + organizar','M','', current_timestamp, current_timestamp);
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
