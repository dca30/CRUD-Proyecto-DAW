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
        INSERT INTO public.balances (ingreso_c_b, ingreso_aso,ingreso_chapas,ingreso_guinote,ingreso_patrocinio, 
                                    gasto_premios, gasto_tickets, gasto_c_b, gasto_disco, gasto_juegos, 
                                    notas, year, fechas, created_at, updated_at)
        VALUES
        (5276.37,500.00,95.00, 100.00,450.00,-120.25,-100.75,-2500.00,-1000.00,-1500.00,'Nos hemos quedado cortos de licores y hay que comprar otro bingo',2023,1720,current_timestamp,current_timestamp),
        (3941.10,418.00,110.00, 94.00,600.00,-150.18,-88.35,-2300.00,-800.00,-1350.00,'Para el año que viene comprar vasos de chupito',2022,1821,current_timestamp,current_timestamp),
        (5876.75,613.00,95.00, 90.00,350.00,-113.67,-80.75,-2400.00,-1200.00,-1500.00,'Ha sobrado mucho chocolate en la chocolatada\,comprar menos',2021,1922,current_timestamp,current_timestamp),
        (1240.28,230.00,70.00, 0.00,0.00,0.00,-40.75,-1000.00,0.00,0.00,'Año de la pandemia\, con reunirnos en la plaza y poco mas ha sido suficiente :)',2020,2023,current_timestamp,current_timestamp),
        (4549.47,580.00,90.00, 104.00,500.00,-128.46,-82.50,-2150.00,-1050.00,-1100.00,'Se ha caido desde gran altura un altavoz\, hay que comprar nuevos',2019,2225,current_timestamp,current_timestamp),
        (4731.85,535.00,120.00, 82.00,600.00,-115.06,-75.35,-2280.00,-900.00,-1250.00,'La gente no se ha enterado de que empezaba el torneo de las chapas\, hay que avisar por megafonia',2018,1619,current_timestamp,current_timestamp),
        (3866.14,490.00,95.00, 92.00,350.00,-100.80,-72.10,-2800.00,-850.00,-1100.00,'Los adolescentes no tenian ninguna actividad\, para el año que viene organizarles algo',2017,1720,current_timestamp,current_timestamp),
        (4456.96,540.00,100.00, 98.00,450.00,-95.34,-69.35,-2550.00,-1050.00,-1000.00,'Han sobrado barriles de cerveza\, habria que encargar 2 o 3 menos para el año que viene',2016,1821,current_timestamp,current_timestamp),
        (5163.22,600.00,90.00, 82.00,400.00,-110.43,-78.00,-2000.00,-1050.00,-1500.00,'Hay que comprar productos de limpieza que se ha acabado casi todo este año',2015,2023,current_timestamp,current_timestamp),
        (4789.47,550.00,115.00, 80.00,350.00,-105.69,-80.75,-2300.00,-950.00,-1450.00,'Los jueves de cada año hacer llamamiento para que suba gente a la plaza a montar el escenario',2014,1417,current_timestamp,current_timestamp),
        (3748.69,580.00,110.00, 90.00,450.00,-98.04,-60.80,-2290.00,-1250.00,-1100.00,'Han faltado vasos de plastico\, encargar 200 mas de cada tipo para el año que viene',2013,2225,current_timestamp,current_timestamp),
        (4732.12,480.00,115.00, 78.00,500.00,-107.10,-75.10,-2700.00,-950.00,-1400.00,'Hay que repintar las tablas para el torneo de las chapas',2012,2326,current_timestamp,current_timestamp),
        (6148.65,610.00,90.00, 84.00,450.00,-115.60,-70.60,-2390.00,-1100.00,-1350.00,'Cambia el organizador del torneo de guiñote\, ya no estará Pepe',2011,1821,current_timestamp,current_timestamp),
        (3167.91,565.00,105.00, 88.00,500.00,-118.25,-65.45,-2100.00,-1000.00,-1100.00,'Hay que hacer cuadrantes de reparticion de tareas',2010,1922 ,current_timestamp,current_timestamp);
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
