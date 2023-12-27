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
        INSERT INTO public.ideas (titulo, descripcion, creador, tematica, vista, anonimo, created_at, updated_at)
        VALUES
            ('Jotas','Estaria bien que volviera a haber espectaculos de jotas', 'dcalvo', 'Actividades', 'N',  'N', '2023-08-29 17:00:00', current_timestamp),
            ('Cambio DJ','El DJ del año 2023 no me ha gustado, estaria bien cambiar de cara al año siguiente', 'user', 'Fiestas', 'S',   'S', '2023-08-30 17:00:00', current_timestamp),
            ('Sombra juegos niños','Los juegos para los niños han estado bien pero se les podria poner zona de sombrillas que sino pasan calor', 'user', 'Actividades', 'S',  'S', '2023-09-5 17:00:00', current_timestamp),
            ('Misma discomovil','Me gustaria continuar con esta discomovil ya que la musica ha estado bien', 'pepe', 'Fiestas', 'S',  'S', '2023-09-21 17:00:00', current_timestamp),
            ('Cambio hora bingo','Yo adelantaria el bingo a las 2 de la mañana en vez de ser a las 3:30, los mayores tenemos sueño', 'maria', 'Fiestas', 'N',  'S', '2023-09-27 17:00:00', current_timestamp),
            ('Cohetes chupinazo','Se podrian tirar un par de cohetes a modo de chupinazo el dia que empiecen las fiestas', 'admin', 'Prefiestas', 'N',  'S', '2023-10-12 17:00:00', current_timestamp),
            ('Holy run','En las eras podriamos hacer un holy run con polvos de colores biodegradables para no ensuciar el campo y poner algunos grifos de cerveza el dia de los disfraces','jcalvoasensio','Actividades','S', 'S', '2023-10-15 17:00:00', current_timestamp),
            ('Concurso fotografia','Para el año que viene podriamos poner de tematica Los ancianos','scalvoalegre','Actividades','N', 'S', '2023-10-16 17:00:00', current_timestamp),
            ('Excursion pozas','El miercoles antes de que empiecen las fiestas se podria hacer una excursion y merendar todos juntos en las pozas del rio','dcalvo','Prefiestas','S', 'S', '2023-10-22 17:00:00', current_timestamp),
            ('Cambio hora torneo guiñote','Todos los años el torneo es a las 4 y para los que hemos salido de fiesta el dia anterior no nos viene nada bien, se podria cambiar a las 19h','user','Actividades','N', 'S', '2023-11-1 17:00:00', current_timestamp),
            ('Campos got talent','Me ha parecido muy buena idea y creo que podriamos poner mas categorias para los niños','emolinasanguesa','Actividades','N', 'S', '2023-12-5 17:00:00', current_timestamp),
            ('Vender hot-dogs barra','A partir de cierta hora de la madrugada los jovenes quieren comer y con los bocadillos no es suficiente, podriamos vender tambien perritos calientes para dar un poco de variedad','emolinasanguesa','Comida y bebida','N', 'N', '2023-12-8 17:00:00', current_timestamp),
            ('Alargar horario discomovil','Este año la discomovil ha acabado a las 6:30, no estaria mal que durara hasta las 8 no?','jcalvoasensio','Fiestas','S', 'S', '2023-12-11 17:00:00', current_timestamp),
            ('Madalenas para chocolatada','Siempre me han gustado los bizcochitos de la chocolatada pero podriamos probar un año con madalenas','dcalvo','Comida y bebida','N', 'S', '2023-12-18 17:00:00', current_timestamp),
            ('Arreglar futbolin','Es una pena que teniendo un futbolin tan majo no le estemos dando uso porque no esta engrasado y hay un par de tablas rotas...','lcalvofernandez','Prefiestas','S', 'N', '2023-12-11 17:00:00', current_timestamp),
            ('Libro con abuelos','Creo que se podria hacer un libro contando un poco la historia de los abuelos del pueblo, sus primeros años en el pueblo y las historias','malegreoro','Prefiestas','N', 'S', '2023-12-25 17:00:00', current_timestamp)
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
