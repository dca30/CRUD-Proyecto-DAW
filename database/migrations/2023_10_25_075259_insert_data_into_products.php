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
        INSERT INTO public.products (name, qty, price, description, created_at, updated_at)
        VALUES
            ('Platano', '7', '7.35', 'Maravilloso platano amarillo', current_timestamp, current_timestamp),
            ('Manzana', '2', '2.59', 'iPhone', current_timestamp, current_timestamp),
            ('Naranja', '3', '4.12', 'Que fue antes la naranja o el color naranja', current_timestamp, current_timestamp)
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
