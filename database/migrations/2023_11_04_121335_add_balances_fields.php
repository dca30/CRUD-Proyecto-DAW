<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('balances', function (Blueprint $table) {
            $table->decimal('incremento', 6, 2)->nullable(); // Agregando nullable()
        });

        \DB::table('balances')->orderBy('year')->get()->each(function ($balance) {
            $currentYear = $balance->year;
            $previousYear = $currentYear - 1;

            $previousBalance = \DB::table('balances')->where('year', $previousYear)->first();

            if ($previousBalance) {
                $total = $balance->total;
                $totalAnterior = $previousBalance->total;
                $incremento = ($totalAnterior != 0) ? round(($total - $totalAnterior) * 100 / abs($totalAnterior), 2) : 0;

                \DB::table('balances')->where('id', $balance->id)->update(['incremento' => $incremento]);
            }
        });
    }

    public function down()
    {
        Schema::table('balances', function (Blueprint $table) {
            $table->dropColumn('campo_numeros_enteros');
            $table->dropColumn('campo_operacion_matematica');
        });
    }
};
