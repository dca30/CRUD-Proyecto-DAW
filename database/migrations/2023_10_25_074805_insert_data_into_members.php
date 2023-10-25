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
        INSERT INTO public.members (first_name, last_name, phone_number, email, fee, created_at, updated_at)
        VALUES
            ('Diego', 'Gómez', '111-111-1111', 'diego@gomez.com', 12, current_timestamp, current_timestamp),
            ('Juan', 'Martínez', '222-222-2222', 'juan@martinez.com', 7, current_timestamp, current_timestamp),
            ('Maria', 'López', '333-333-3333', 'maria@lopez.com', 5, current_timestamp, current_timestamp),
            ('Carlos', 'Fernández', '444-444-4444', 'carlos@fernandez.com', 9, current_timestamp, current_timestamp),
            ('Isabel', 'Rodríguez', '555-555-5555', 'isabel@rodriguez.com', 18, current_timestamp, current_timestamp),
            ('Pedro', 'Sánchez', '666-666-6666', 'pedro@sanchez.com', 14, current_timestamp, current_timestamp),
            ('Laura', 'Pérez', '777-777-7777', 'laura@perez.com', 3, current_timestamp, current_timestamp),
            ('Ana', 'García', '888-888-8888', 'ana@garcia.com', 2, current_timestamp, current_timestamp),
            ('Manuel', 'Molina', '999-999-9999', 'manuel@molina.com', 11, current_timestamp, current_timestamp),
            ('Carmen', 'Torres', '101-101-1010', 'carmen@torres.com', 16, current_timestamp, current_timestamp),
            ('Sergio', 'Hernández', '202-202-2020', 'sergio@hernandez.com', 8, current_timestamp, current_timestamp),
            ('Elena', 'Santos', '303-303-3030', 'elena@santos.com', 4, current_timestamp, current_timestamp),
            ('Pablo', 'Díaz', '404-404-4040', 'pablo@diaz.com', 6, current_timestamp, current_timestamp),
            ('Natalia', 'Cabrera', '505-505-5050', 'natalia@cabrera.com', 13, current_timestamp, current_timestamp),
            ('Luis', 'Ortega', '606-606-6060', 'luis@ortega.com', 10, current_timestamp, current_timestamp),
            ('Sofía', 'Vargas', '707-707-7070', 'sofia@vargas.com', 15, current_timestamp, current_timestamp),
            ('Andrés', 'Reyes', '808-808-8080', 'andres@reyes.com', 19, current_timestamp, current_timestamp),
            ('Valeria', 'Gutiérrez', '909-909-9090', 'valeria@gutierrez.com', 1, current_timestamp, current_timestamp),
            ('Javier', 'Navarri', '010-010-1010', 'javier@navarri.com', 20, current_timestamp, current_timestamp),
            ('María José', 'Gómez', '121-121-1212', 'mariajose@gomez.com', 0, current_timestamp, current_timestamp),
            ('Roberto', 'García', '232-232-2323', 'roberto@garcia.com', 7, current_timestamp, current_timestamp),
            ('Sara', 'Fernández', '343-343-3434', 'sara@fernandez.com', 3, current_timestamp, current_timestamp),
            ('Francisco', 'Martínez', '454-454-4545', 'francisco@martinez.com', 12, current_timestamp, current_timestamp),
            ('Alicia', 'López', '565-565-5656', 'alicia@lopez.com', 8, current_timestamp, current_timestamp),
            ('Miguel Ángel', 'Sánchez', '676-676-6767', 'miguelangel@sanchez.com', 11, current_timestamp, current_timestamp),
            ('Marta', 'Pérez', '787-787-7878', 'marta@perez.com', 5, current_timestamp, current_timestamp),
            ('Antonio', 'González', '898-898-8989', 'antonio@gonzalez.com', 16, current_timestamp, current_timestamp),
            ('Sandra', 'Ramírez', '909-909-9090', 'sandra@ramirez.com', 9, current_timestamp, current_timestamp),
            ('José Luis', 'Díaz', '101-010-1010', 'joseluis@diaz.com', 14, current_timestamp, current_timestamp),
            ('Marta', 'Hernández', '212-121-2121', 'marta@hernandez.com', 7, current_timestamp, current_timestamp),
            ('Alejandro', 'Fuentes', '323-232-3232', 'alejandro@fuentes.com', 18, current_timestamp, current_timestamp),
            ('Eva', 'Ruíz', '434-343-4343', 'eva@ruiz.com', 1, current_timestamp, current_timestamp),
            ('Fernando', 'Vega', '545-454-5454', 'fernando@vega.com', 10, current_timestamp, current_timestamp),
            ('Nuria', 'Morales', '656-565-6565', 'nuria@morales.com', 6, current_timestamp, current_timestamp),
            ('Juan José', 'Gálvez', '767-676-7676', 'juanjose@galvez.com', 17, current_timestamp, current_timestamp),
            ('Cristina', 'Paredes', '878-787-8787', 'cristina@paredes.com', 2, current_timestamp, current_timestamp),
            ('Ricardo', 'Soto', '989-898-9898', 'ricardo@soto.com', 19, current_timestamp, current_timestamp),
            ('Carmen Rosa', 'Vargas', '090-909-0909', 'carmenrosa@vargas.com', 15, current_timestamp, current_timestamp),
            ('Manuel José', 'Navarro', '202-020-2020', 'manueljose@navarro.com', 13, current_timestamp, current_timestamp),
            ('Elena María', 'Santos', '313-131-3131', 'elenamaria@santos.com', 8, current_timestamp, current_timestamp),
            ('Luis Miguel', 'Ruíz', '424-242-4242', 'luismi@ruiz.com', 5, current_timestamp, current_timestamp),
            ('Pilar', 'Fernández', '535-353-5353', 'pilar@fernandez.com', 11, current_timestamp, current_timestamp),
            ('Rafael', 'González', '646-464-6464', 'rafael@gonzalez.com', 7, current_timestamp, current_timestamp),
            ('María Pilar', 'Molina', '757-575-7575', 'mariapilar@molina.com', 9, current_timestamp, current_timestamp),
            ('David', 'Morales', '868-686-8686', 'david@morales.com', 12, current_timestamp, current_timestamp),
            ('María Dolores', 'Gómez', '979-797-9797', 'mariadolores@gomez.com', 6, current_timestamp, current_timestamp),
            ('Jorge', 'Santos', '080-808-0808', 'jorge@santos.com', 18, current_timestamp, current_timestamp),
            ('Rosa María', 'Soto', '191-919-1919', 'rosamaria@soto.com', 1, current_timestamp, current_timestamp),
            ('Joaquín', 'Vega', '202-020-2020', 'joaquin@vega.com', 16, current_timestamp, current_timestamp),
            ('Sofía', 'Paredes', '313-131-3131', 'sofia@paredes.com', 13, current_timestamp, current_timestamp),
            ('José Manuel', 'Ruíz', '424-242-4242', 'josemanuel@ruiz.com', 5, current_timestamp, current_timestamp),
            ('Natalia', 'Ramírez', '535-353-5353', 'natalia@ramirez.com', 14, current_timestamp, current_timestamp),
            ('Francisco José', 'Gálvez', '646-464-6464', 'franciscojose@galvez.com', 9, current_timestamp, current_timestamp),
            ('Laura María', 'Cabrera', '757-575-7575', 'lauramaria@cabrera.com', 3, current_timestamp, current_timestamp),
            ('Alberto', 'Pérez', '868-686-8686', 'alberto@perez.com', 7, current_timestamp, current_timestamp),
            ('Sara María', 'Molina', '080-808-0808', 'saramaria@molina.com', 12, current_timestamp, current_timestamp),
            ('Javier', 'Navarro', '191-919-1919', 'javier@navarro.com', 11, current_timestamp, current_timestamp),
            ('Celia', 'Fernández', '292-929-2929', 'celia@fernandez.com', 10, current_timestamp, current_timestamp),
            ('Álvaro', 'Gómez', '393-939-3939', 'alvaro@gomez.com', 8, current_timestamp, current_timestamp),
            ('María Carmen', 'López', '494-949-4949', 'mariacarmen@lopez.com', 19, current_timestamp, current_timestamp),
            ('José Antonio', 'Martínez', '595-959-5959', 'joseantonio@martinez.com', 15, current_timestamp, current_timestamp),
            ('Ana María', 'Santos', '606-066-6060', 'anamaria@santos.com', 1, current_timestamp, current_timestamp),
            ('Luis Miguel', 'Ruíz', '717-177-7171', 'luismiguel@ruiz.com', 17, current_timestamp, current_timestamp),
            ('Marta', 'González', '828-828-8282', 'marta@gonzalez.com', 6, current_timestamp, current_timestamp),
            ('Andrés', 'Cabrera', '939-393-9393', 'andres@cabrera.com', 3, current_timestamp, current_timestamp),
            ('Carmen', 'Vargas', '040-404-0404', 'carmen@vargas.com', 2, current_timestamp, current_timestamp),
            ('Rafael', 'Soto', '151-515-1515', 'rafael@soto.com', 20, current_timestamp, current_timestamp),
            ('Silvia', 'Hernández', '262-626-2626', 'silvia@hernandez.com', 4, current_timestamp, current_timestamp),
            ('Pedro', 'Paredes', '373-737-3737', 'pedro@paredes.com', 10, current_timestamp, current_timestamp),
            ('Eva', 'Fernández', '484-848-4848', 'eva@fernandez.com', 8, current_timestamp, current_timestamp),
            ('Santiago', 'Martínez', '595-959-5959', 'santiago@martinez.com', 15, current_timestamp, current_timestamp),
            ('Laura', 'Gómez', '626-262-6262', 'laura@gomez.com', 19, current_timestamp, current_timestamp),
            ('Alberto', 'López', '737-373-7373', 'alberto@lopez.com', 9, current_timestamp, current_timestamp),
            ('Nuria', 'Cabrera', '848-848-8484', 'nuria@cabrera.com', 11, current_timestamp, current_timestamp),
            ('Miguel Ángel', 'Vargas', '959-959-9595', 'miguelangel@vargas.com', 7, current_timestamp, current_timestamp),
            ('María Pilar', 'Soto', '060-606-0606', 'mariapilar@soto.com', 12, current_timestamp, current_timestamp),
            ('Luis', 'Hernández', '171-717-1717', 'luis@hernandez.com', 18, current_timestamp, current_timestamp),
            ('Sofía', 'González', '282-828-2828', 'sofia@gonzalez.com', 14, current_timestamp, current_timestamp),
            ('Roberto', 'Ruíz', '393-939-3939', 'roberto@ruiz.com', 5, current_timestamp, current_timestamp),
            ('Isabel', 'Santos', '504-045-5045', 'isabel@santos.com', 3, current_timestamp, current_timestamp),
            ('Joaquín', 'Martínez', '615-156-6156', 'joaquin@martinez.com', 16, current_timestamp, current_timestamp),
            ('Cristina', 'Fernández', '726-267-7267', 'cristina@fernandez.com', 1, current_timestamp, current_timestamp),
            ('Pablo', 'Gómez', '837-738-8378', 'pablo@gomez.com', 20, current_timestamp, current_timestamp);
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
