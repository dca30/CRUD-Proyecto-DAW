> [!NOTE]
>Proyecto DAW Diego Calvo Alegre

Este proyecto esta dockerizado y por lo tanto se debe tener instalado docker en local.


> [!IMPORTANT]
>Para poder utilizar la funcion pg_anonymize hay que seguir una serie de pasos:
> 
> Dentro del contenedor de postgres ejecutamos en la ruta /:
>
> apt update -y && apt install -y git && git clone https://github.com/rjuju/pg_anonymize.git && cd pg_anonymize/ && apt install -y postgresql-server-dev-15 gcc && apt autoremove -y && apt install -y make && make && make clean && make install
>
> Despues en la base de datos ejecutamos lo siguiente:
>
>```sql
> ALTER ROLE "user" SET session_preload_libraries = 'pg_anonymize';
>
> LOAD 'pg_anonymize';
>
> SECURITY LABEL FOR pg_anonymize ON ROLE "user" IS 'anonymize';
>
> GRANT SELECT ON TABLE public.members TO "user";
>
> SECURITY LABEL FOR pg_anonymize ON COLUMN public.members.telefono IS $$regexp_replace(telefono, '\d', 'X', 'g')$$;
>
> SECURITY LABEL FOR pg_anonymize ON COLUMN public.members.domicilio IS $$regexp_replace(domicilio, ' .*', ' ####')$$;
>
> SECURITY LABEL FOR pg_anonymize ON COLUMN public.members.cuota IS 'substr(cuota, 0, 1) || ''**''';

De esta manera el usuario 'user' tendria censurado los campos telefono, domicilio y cuota, sin embargo el usuario 'admin' no tendria ningun problema en verlo


A continuacion, para desplegar el proyecto por primera vez seguiremos la documentacion oficial de Laravel en:

https://laravel.com/docs/10.x/sail#installing-sail-into-existing-applications

Una vez creado el proyecto se debe hacer un update e install de composer y de npm.

Despues, para lanzar el proyecto, desde consola en la ruta / del proyecto ejecutamos los siguientes comandos:

Para lanzar la aplicacion: ./vendor/bin/sail up
Para cargar los estilos: ./vendor/bin/sail npm run dev

> [!TIP]
> Recomiento ejecutar cada comando en una consola y en una tercera ejecutar los comandos artisan si es que hacemos alguna migracion o creamos algun nuevo modelo.