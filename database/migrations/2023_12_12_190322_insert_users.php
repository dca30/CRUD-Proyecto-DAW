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
        INSERT INTO public.users (name, email, username, password, created_at, updated_at)
        VALUES
            ('Diego','dcalvo@dcalvo.com', 'dcalvo', 'password', current_timestamp, current_timestamp),    
            ('Luis Miguel','lmiguel@lmiguel.com', 'lmiguel', 'password', current_timestamp, current_timestamp),
            ('Montserrat Alegre','malegre@malegre.com', 'malegre', 'password', current_timestamp, current_timestamp),
            ('Sara Calvo','scalvo@scalvo.com', 'scalvo', 'password', current_timestamp, current_timestamp),
            ('Carmen Fernandez','cfernandez@cfernandez.com', 'cfernandez', 'password', current_timestamp, current_timestamp),
            ('Juan Blanco','jblanco@jblanco.com', 'jblanco', 'password', current_timestamp, current_timestamp),
            ('Josefa Oro','joro@joro.com', 'joro', 'password', current_timestamp, current_timestamp),
            ('User','user@user.com', 'user', 'password', current_timestamp, current_timestamp)
            

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
