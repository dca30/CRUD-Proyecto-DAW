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
    $sql = "alter role \"user\" SET session_preload_libraries = 'pg_anonymize';";
    DB::statement($sql);
    $sql ="LOAD 'pg_anonymize';";
    DB::statement($sql);
    $sql ="SECURITY LABEL FOR pg_anonymize ON ROLE \"user\" IS 'anonymize';";
    DB::statement($sql);
    $sql ="GRANT SELECT ON TABLE public.members TO \"user\";";
    DB::statement($sql);
    $sql ="SECURITY LABEL FOR pg_anonymize ON COLUMN public.members.phone_number IS \$\$regexp_replace(phone_number, '\d', 'X', 'g')\$\$;";
    DB::statement($sql);
    /*
    $sql .="SECURITY LABEL FOR pg_anonymize ON COLUMN public.members.last_name IS \$\$substr(last_name, 1, 1) || '*****'\$\$;";
    $sql .="SECURITY LABEL FOR pg_anonymize ON COLUMN public.members.birthday IS \$\$date_trunc('year', birthday)::date\$\$;";
    $sql .="SECURITY LABEL FOR pg_anonymize ON COLUMN public.members.phone_number IS \$\$regexp_replace(phone_number, '\d', 'X', 'g')\$\$;";
    $sql .="SECURITY LABEL FOR pg_anonymize ON COLUMN public.ic_md5_pass.password IS \$\$substr(password, 0, 1) || '*****'\$\$";
    */
    
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