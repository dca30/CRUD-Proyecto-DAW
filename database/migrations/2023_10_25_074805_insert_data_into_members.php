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
        INSERT INTO public.members (nombre, apellidos, telefono, email, domicilio, cuota, created_at, updated_at)
    VALUES
    ('Diego', 'Gómez González', '111-111-1111', 'diego@gomez.com', 'Avenida de la Luna 234, 3B', 12, current_timestamp, current_timestamp),
    ('Juan', 'Martínez Rodríguez', '222-222-2222', 'juan@martinez.com', 'Calle de las Estrellas 567, 8C', 7, current_timestamp, current_timestamp),
    ('Maria', 'López García', '333-333-3333', 'maria@lopez.com', 'Plaza del Unicornio 890, 2D', 5, current_timestamp, current_timestamp),
    ('Carlos', 'Fernández Fernández', '444-444-4444', 'carlos@fernandez.com', 'Paseo de las Mariposas 123, 4E', 9, current_timestamp, current_timestamp),
    ('Isabel', 'Rodríguez López', '555-555-5555', 'isabel@rodriguez.com', 'Camino de los Sueños 456, 7F', 18, current_timestamp, current_timestamp),
    ('Pedro', 'Sánchez Martínez', '666-666-6666', 'pedro@sanchez.com', 'Ronda de las Hadas 789, 1A', 14, current_timestamp, current_timestamp),
    ('Laura', 'Pérez Sánchez', '777-777-7777', 'laura@perez.com', 'Carrera de los Deseos 234, 5B', 3, current_timestamp, current_timestamp),
    ('Ana', 'García Pérez', '888-888-8888', 'ana@garcia.com', 'Avenida de las Sombras 567, 2C', 2, current_timestamp, current_timestamp),
    ('Manuel', 'Molina Gómez', '999-999-9999', 'manuel@molina.com', 'Calle del Misterio 890, 6D', 11, current_timestamp, current_timestamp),
    ('Carmen', 'Torres Díaz', '101-101-1010', 'carmen@torres.com', 'Plaza de los Enigmas 123, 8E', 16, current_timestamp, current_timestamp),
    ('Sergio', 'Hernández Vázquez', '202-202-2020', 'sergio@hernandez.com', 'Paseo de las Quimeras 456, 1F', 8, current_timestamp, current_timestamp),
    ('Elena', 'Santos Torres', '303-303-3030', 'elena@santos.com', 'Camino de las Leyendas 789, 3A', 4, current_timestamp, current_timestamp),
    ('Pablo', 'Díaz Ramírez', '404-404-4040', 'pablo@diaz.com', 'Ronda de las Maravillas 234, 2B', 6, current_timestamp, current_timestamp),
    ('Natalia', 'Cabrera Romero', '505-505-5050', 'natalia@cabrera.com', 'Carrera de las Aventuras 567, 4C', 13, current_timestamp, current_timestamp),
    ('Luis', 'Ortega Suárez', '606-606-6060', 'luis@ortega.com', 'Avenida de los Secretos 890, 6D', 10, current_timestamp, current_timestamp),
    ('Sofía', 'Vargas Herrera', '707-707-7070', 'sofia@vargas.com', 'Calle de la Imaginación 123, 8E', 15, current_timestamp, current_timestamp),
    ('Andrés', 'Reyes Jiménez', '808-808-8080', 'andres@reyes.com', 'Plaza de los Sueños 456, 1F', 19, current_timestamp, current_timestamp),
    ('Valeria', 'Gutiérrez Mendoza', '909-909-9090', 'valeria@gutierrez.com', 'Paseo de las Maravillas 789, 3A', 1, current_timestamp, current_timestamp),
    ('Javier', 'Navarri Castro', '010-010-1010', 'javier@navarri.com', 'Camino de los Misterios 234, 2B', 20, current_timestamp, current_timestamp),
    ('María José', 'Gómez Álvarez', '121-121-1212', 'mariajose@gomez.com', 'Ronda de las Ilusiones 567, 4C', 0, current_timestamp, current_timestamp),
    ('Roberto', 'García Flores', '232-232-2323', 'roberto@garcia.com', 'Carrera de las Fantasías 890, 6D', 7, current_timestamp, current_timestamp),
    ('Sara', 'Fernández Medina', '343-343-3434', 'sara@fernandez.com', 'Avenida de los Deseos 123, 8E', 3, current_timestamp, current_timestamp),
    ('Francisco', 'Martínez Ortiz', '454-454-4545', 'francisco@martinez.com', 'Calle de la Magia 456, 1F', 12, current_timestamp, current_timestamp),
    ('Alicia', 'López Ruiz', '565-565-5656', 'alicia@lopez.com', 'Plaza de las Mariposas 789, 3A', 8, current_timestamp, current_timestamp),
    ('Miguel Ángel', 'Sánchez Velázquez', '676-676-6767', 'miguelangel@sanchez.com', 'Paseo de las Quimeras 234, 2B', 11, current_timestamp, current_timestamp),
    ('Marta', 'Pérez Alonso', '787-787-7878', 'marta@perez.com', 'Camino de las Leyendas 567, 4C', 5, current_timestamp, current_timestamp),
    ('Antonio', 'González Moreno', '898-898-8989', 'antonio@gonzalez.com', 'Ronda de los Enigmas 890, 6D', 16, current_timestamp, current_timestamp),
    ('Sandra', 'Ramírez Delgado', '909-909-9090', 'sandra@ramirez.com', 'Carrera de las Maravillas 123, 8E', 9, current_timestamp, current_timestamp),
    ('José Luis', 'Díaz Núñez', '101-010-1010', 'joseluis@diaz.com', 'Avenida de los Sueños 456, 1F', 14, current_timestamp, current_timestamp),
    ('Marta', 'Hernández Ríos', '212-121-2121', 'marta@hernandez.com', 'Calle de las Ilusiones 789, 3A', 7, current_timestamp, current_timestamp),
    ('Alejandro', 'Fuentes Vega', '323-232-3232', 'alejandro@fuentes.com', 'Plaza de las Fantasías 234, 2B', 18, current_timestamp, current_timestamp),
    ('Eva', 'Ruíz Castro', '434-343-4343', 'eva@ruiz.com', 'Paseo de los Deseos 567, 4C', 1, current_timestamp, current_timestamp),
    ('Fernando', 'Vega Bravo', '545-454-5454', 'fernando@vega.com', 'Camino de la Magia 890, 6D', 10, current_timestamp, current_timestamp),
    ('Nuria', 'Morales Molina', '656-565-6565', 'nuria@morales.com', 'Ronda de las Mariposas 123, 8E', 6, current_timestamp, current_timestamp),
    ('Juan José', 'Gálvez Silva', '767-676-7676', 'juanjose@galvez.com', 'Carrera de las Quimeras 456, 1F', 17, current_timestamp, current_timestamp),
    ('Cristina', 'Paredes Paredes', '878-787-8787', 'cristina@paredes.com', 'Avenida de los Misterios 789, 3A', 2, current_timestamp, current_timestamp),
    ('Ricardo', 'Soto Montes', '989-898-9898', 'ricardo@soto.com', 'Calle de los Enigmas 234, 2B', 19, current_timestamp, current_timestamp),
    ('Carmen Rosa', 'Vargas Gutiérrez', '090-909-0909', 'carmenrosa@vargas.com', 'Plaza de las Leyendas 567, 4C', 15, current_timestamp, current_timestamp),
    ('Manuel José', 'Navarro Rojas', '202-020-2020', 'manueljose@navarro.com', 'Paseo de las Maravillas 890, 6D', 13, current_timestamp, current_timestamp),
    ('Elena María', 'Santos Reyes', '313-131-3131', 'elenamaria@santos.com', 'Camino de los Sueños 123, 8E', 8, current_timestamp, current_timestamp),
    ('Luis Miguel', 'Ruíz Aguilar', '424-242-4242', 'luismi@ruiz.com', 'Ronda de las Ilusiones 456, 1F', 5, current_timestamp, current_timestamp),
    ('Pilar', 'Fernández Navarro', '535-353-5353', 'pilar@fernandez.com', 'Carrera de las Fantasías 789, 3A', 11, current_timestamp, current_timestamp),
    ('Rafael', 'González Torres', '646-464-6464', 'rafael@gonzalez.com', 'Avenida de los Secretos 234, 2B', 7, current_timestamp, current_timestamp),
    ('María Pilar', 'Molina Guzmán', '757-575-7575', 'mariapilar@molina.com', 'Calle de la Imaginación 567, 4C', 9, current_timestamp, current_timestamp),
    ('David', 'Morales Cordero', '868-686-8686', 'david@morales.com', 'Plaza de los Deseos 890, 6D', 12, current_timestamp, current_timestamp),
    ('María Dolores', 'Gómez Flores', '979-797-9797', 'mariadolores@gomez.com', 'Paseo de las Mariposas 123, 8E', 6, current_timestamp, current_timestamp),
    ('Jorge', 'Santos Soto', '080-808-0808', 'jorge@santos.com', 'Camino de las Quimeras 456, 1F', 18, current_timestamp, current_timestamp),
    ('Rosa María', 'Soto Vidal', '191-919-1919', 'rosamaria@soto.com', 'Ronda de las Leyendas 789, 3A', 1, current_timestamp, current_timestamp),
    ('Joaquín', 'Vega Cabrera', '202-020-2020', 'joaquin@vega.com', 'Carrera de los Misterios 234, 2B', 16, current_timestamp, current_timestamp),
    ('Sofía', 'Paredes Ramos', '313-131-3131', 'sofia@paredes.com', 'Avenida de las Aventuras 567, 4C', 13, current_timestamp, current_timestamp),
    ('José Manuel', 'Ruíz Bravo', '424-242-4242', 'josemanuel@ruiz.com', 'Calle del Misterio 890, 6D', 5, current_timestamp, current_timestamp),
    ('Natalia', 'Ramírez Marín', '535-353-5353', 'natalia@ramirez.com', 'Plaza de la Imaginación 123, 8E', 14, current_timestamp, current_timestamp),
    ('Francisco José', 'Gálvez Solís', '646-464-6464', 'franciscojose@galvez.com', 'Ronda de las Maravillas 456, 1F', 9, current_timestamp, current_timestamp),
    ('Laura María', 'Cabrera Serrano', '757-575-7575', 'lauramaria@cabrera.com', 'Carrera de las Quimeras 789, 3A', 3, current_timestamp, current_timestamp),
    ('Alberto', 'Pérez León', '868-686-8686', 'alberto@perez.com', 'Avenida de los Sueños 234, 2B', 7, current_timestamp, current_timestamp),
    ('Sara María', 'Molina Salgado', '080-808-0808', 'saramaria@molina.com', 'Calle de las Ilusiones 567, 4C', 12, current_timestamp, current_timestamp),
    ('Javier', 'Navarro Hidalgo', '191-919-1919', 'javier@navarro.com', 'Plaza de las Fantasías 890, 6D', 11, current_timestamp, current_timestamp),
    ('Celia', 'Fernández Salazar', '292-929-2929', 'celia@fernandez.com', 'Paseo de los Deseos 123, 8E', 10, current_timestamp, current_timestamp),
    ('Álvaro', 'Gómez Ponce', '393-939-3939', 'alvaro@gomez.com', 'Camino de la Magia 456, 1F', 8, current_timestamp, current_timestamp),
    ('María Carmen', 'López Valle', '494-949-4949', 'mariacarmen@lopez.com', 'Ronda de las Ilusiones 789, 3A', 19, current_timestamp, current_timestamp),
    ('José Antonio', 'Martínez Cáceres', '595-959-5959', 'joseantonio@martinez.com', 'Camino de las Leyendas 234, 2B', 15, current_timestamp, current_timestamp),
    ('Ana María', 'Santos Fuentes', '606-066-6060', 'anamaria@santos.com','Ronda de los Enigmas 567, 4C' , 1, current_timestamp, current_timestamp),
    ('Luis Miguel', 'Ruíz Gallego', '717-177-7171', 'luismiguel@ruiz.com', 'Carrera de las Maravillas 890, 6D' ,17, current_timestamp, current_timestamp),
    ('Marta', 'González Moya', '828-828-8282', 'marta@gonzalez.com',  'Avenida de los Sueños 123, 8E', 6,current_timestamp, current_timestamp),
    ('Andrés', 'Cabrera Fajardo', '939-393-9393', 'andres@cabrera.com', 'Calle de las Ilusiones 456, 1F' ,3, current_timestamp, current_timestamp),
    ('Carmen', 'Vargas Reyes', '040-404-0404', 'carmen@vargas.com', 'Plaza de las Fantasías 789, 3A', 2, current_timestamp, current_timestamp),
    ('Rafael', 'Soto Pinto', '151-515-1515', 'rafael@soto.com', 'Paseo de los Deseos 234, 2B', 20,current_timestamp, current_timestamp),
    ('Silvia', 'Hernández Burgos', '262-626-2626', 'silvia@hernandez.com','Camino de la Magia 567,  4C' , 4, current_timestamp, current_timestamp),
    ('Pedro', 'Paredes Benítez', '373-737-3737', 'pedro@paredes.com', 'Ronda de las Mariposas 890, 6D', 10, current_timestamp, current_timestamp),
    ('Eva', 'Fernández Guerra', '484-848-4848', 'eva@fernandez.com','Carrera de las Quimeras 123, 8E' , 8, current_timestamp, current_timestamp),
    ('Santiago', 'Martínez Espinoza', '595-959-5959', 'santiago@martinez.com', 'Avenida de los Misterios 456, 1F', 15, current_timestamp, current_timestamp),
    ('Laura', 'Gómez Sepúlveda', '626-262-6262', 'laura@gomez.com',  'Calle de los Enigmas 789, 3A',19,  current_timestamp, current_timestamp),
    ('Alberto', 'López Aguayo', '737-373-7373', 'alberto@lopez.com',  'Plaza de las Leyendas 234, 2B',9,  current_timestamp, current_timestamp),
    ('Nuria', 'Cabrera Pizarro', '848-848-8484', 'nuria@cabrera.com',  'Paseo de las Maravillas 567, 4C', 11, current_timestamp, current_timestamp),
    ('Miguel Ángel', 'Vargas Cáceres', '959-959-9595', 'miguelangel@vargas.com', 'Camino de los Sueños 890, 6D' , 7, current_timestamp, current_timestamp),
    ('María Pilar', 'Soto Araya', '060-606-0606', 'mariapilar@soto.com', 'Ronda de las Ilusiones 123, 8E' , 12, current_timestamp, current_timestamp),
    ('Luis', 'Hernández Godoy', '171-717-1717', 'luis@hernandez.com',  'Carrera de las Fantasías 456, 1F',18,  current_timestamp, current_timestamp),
    ('Sofía', 'González Escobar', '282-828-2828', 'sofia@gonzalez.com',  'Avenida de los Secretos 789, 3A',14,  current_timestamp, current_timestamp),
    ('Roberto', 'Ruíz Miranda', '393-939-3939', 'roberto@ruiz.com',  'Calle de la Imaginación 234, 2B',5,  current_timestamp, current_timestamp),
    ('Isabel', 'Santos Leiva', '504-045-5045', 'isabel@santos.com',  'Plaza de los Deseos 567, 4C', 3, current_timestamp, current_timestamp),
    ('Joaquín', 'Martínez Del Valle', '615-156-6156', 'joaquin@martinez.com',  'Paseo de las Mariposas 890, 6D', 16, current_timestamp, current_timestamp),
    ('Cristina', 'Fernández Valenzuela', '726-267-7267', 'cristina@fernandez.com',  'Camino de las Quimeras 123, 8E',1,  current_timestamp, current_timestamp),
    ('Pablo', 'Gómez Ulloa', '837-738-8378', 'pablo@gomez.com',  'Ronda de las Leyendas 456, 1F', 20, current_timestamp, current_timestamp);
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
