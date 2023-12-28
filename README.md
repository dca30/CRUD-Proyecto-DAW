> [!NOTE]
>Proyecto DAW Diego Calvo Alegre

Este proyecto esta dockerizado y por lo tanto se debe tener instalado docker en local.


> [!IMPORTANT]
>Para poder utilizar la funcion pg_anonymize hay que seguir una serie de pasos:
> 
> En el contenedor de postgres ejecutamos: 
> apt update -y && apt install -y git && git clone https://github.com/rjuju/pg_anonymize.git && cd pg_anonymize/ && apt install -y postgresql-server-dev-15 gcc && apt autoremove -y && apt install -y make && make && make clean && make install
> Despues en la base de datos ejecutamos lo siguiente:
>
> ALTER ROLE "user" SET session_preload_libraries = 'pg_anonymize';
>
> LOAD 'pg_anonymize';
>
> SECURITY LABEL FOR pg_anonymize ON ROLE "user" IS 'anonymize';
>
> GRANT SELECT ON TABLE public.members TO "user";
>
> SECURITY LABEL FOR pg_anonymize ON COLUMN public.members.phone_number IS $$regexp_replace(phone_number, '\d', 'X', 'g')$$;

De esta manera el usuario 'user' tendria censurado el campo phone_number, sin embargo el usuario 'admin' no tendria ningun problema en verlo


A continuacion, para desplegar el proyecto necesitaremos utilizar un par de comandos

Para lanzar la aplicacion: ./vendor/bin/sail up
Para cargar los estilos: ./vendor/bin/sail npm run dev

> [!TIP]
> Recomiento ejecutar cada comando en una consola y en una tercera ejecutar los comandos artisan si es que hacemos alguna migracion o creamos algun nuevo modelo.
> Por otro lado ejecutar ./vendor/bin/sail npm install y ./vendor/bin/sail npm update para instalar y/o actualizar las dependencias necesarias para que carguen los estilos.


> [!WARNING]
>Aqui tienes una nota especial

> [!CAUTION]
>Aqui tienes una nota especial

CHART LIBRARIES:
https://blog.logrocket.com/exploring-best-laravel-chart-libraries/


CARDS:
https://bbbootstrap.com/snippets/bootstrap-5-jobs-card-listing-59188500