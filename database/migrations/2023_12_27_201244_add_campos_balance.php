<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('balances', function (Blueprint $table) {
        $table->decimal('ingreso_chapas', 8, 2)->default(0);
        $table->decimal('ingreso_guinote', 8, 2)->default(0);
        $table->decimal('ingreso_patrocinio', 8, 2)->default(0);
        $table->decimal('gasto_juegos', 8, 2)->default(0);
        $table->string('notas', 150)->default('');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};