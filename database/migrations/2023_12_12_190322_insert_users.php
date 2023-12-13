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
            ('Administrador','admin@admin.com', 'admin', 'password', current_timestamp, current_timestamp),
            ('Diego','dcalvo@dcalvo.com', 'dcalvo', 'password', current_timestamp, current_timestamp)
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
