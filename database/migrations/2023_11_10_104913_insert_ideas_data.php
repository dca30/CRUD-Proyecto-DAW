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
            ('Jotas','Estaria bien que volviera a haber espectaculos de jotas', 'dcalvo', 'A', '1',  '1', current_timestamp, current_timestamp),
            ('Cambio DJ','El DJ del año 2023 no me ha gustado, estaria bien cambiar de cara al año siguiente', 'user', 'B', '0',   '0', current_timestamp, current_timestamp),
            ('Sombra juegos niños','Los juegos para los niños han estado bien pero se les podria poner zona de sombrillas que sino pasan calor', 'user', 'C', '0',  '0', current_timestamp, current_timestamp),
            ('Misma discomovil','Me gustaria continuar con esta discomovil ya que la musica ha estado bien', 'pepe', 'A', '0',  '0', current_timestamp, current_timestamp),
            ('Cambio hora bingo','Yo adelantaria el bingo a las 2 de la mañana en vez de ser a las 3:30, los mayores tenemos sueño', 'maria', 'A', '1',  '0', current_timestamp, current_timestamp),
            ('Cohetes chupinazo','Se podrian tirar un par de cohetes a modo de chupinazo el dia que empiecen las fiestas', 'admin', 'C', '1',  '0', current_timestamp, current_timestamp),
            ('Holy run','En las eras podriamos hacer un holy run con polvos de colores biodegradables para no ensuciar el campo y poner algunos grifos de cerveza el dia de los disfraces','jcalvoasensio','B','0', '0', current_timestamp, current_timestamp),
            ('Concurso fotografia','Para el año que viene podriamos poner de tematica Los ancianos','scalvoalegre','A','1', '0', current_timestamp, current_timestamp),
            ('Excursion pozas','El miercoles antes de que empiecen las fiestas se podria hacer una excursion y merendar todos juntos en las pozas del rio','dcalvo','C','0', '0', current_timestamp, current_timestamp),
            ('Cambio hora torneo guiñote','Todos los años el torneo es a las 4 y para los que hemos salido de fiesta el dia anterior no nos viene nada bien, se podria cambiar a las 19h','user','A','1', '0', current_timestamp, current_timestamp),
            ('Campos got talent','Me ha parecido muy buena idea y creo que podriamos poner mas categorias para los niños','emolinasanguesa','C','1', '0', current_timestamp, current_timestamp),
            ('Vender hot-dogs barra','A partir de cierta hora de la madrugada los jovenes quieren comer y con los bocadillos no es suficiente, podriamos vender tambien perritos calientes para dar un poco de variedad','emolinasanguesa','B','1', '1', current_timestamp, current_timestamp),
            ('Alargar horario discomovil','Este año la discomovil ha acabado a las 6:30, no estaria mal que durara hasta las 8 no?','jcalvoasensio','A','0', '0', current_timestamp, current_timestamp),
            ('Madalenas para chocolatada','Siempre me han gustado los bizcochitos de la chocolatada pero podriamos probar un año con madalenas','dcalvo','A','1', '0', current_timestamp, current_timestamp),
            ('Arreglar futbolin','Es una pena que teniendo un futbolin tan majo no le estemos dando uso porque no esta engrasado y hay un par de tablas rotas...','lcalvofernandez','B','0', '1', current_timestamp, current_timestamp),
            ('Libro con abuelos','Creo que se podria hacer un libro contando un poco la historia de los abuelos del pueblo, sus primeros años en el pueblo y las historias','malegreoro','C','1', '0', current_timestamp, current_timestamp)
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
