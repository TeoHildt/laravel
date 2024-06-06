..--========INSTRUCCIONES DE INSTALACIÓN========--..

• REQUISITOS: Laragon, PHP, Laravel

1)- Clonar el proyecto a la carpeta "WWW" dentro de el directorio donde haya instalado Laragon.

2)- Abrir Laragon y hacer clic en el botón para abrir la terminal de comandos. Una vez dentro deberá ingresar el siguiente comando:
>cd laravel (esto hará que los comandos se ejecuten en el directorio del programa)

3)- Ingresar los siguientes comandos:
>composer install (esto instalará composer, que es necesario para el funcionamiento del proyecto)
>composer require barryvdh/laravel-dompdf (esto instalará dompdf, necesario para determinadas funciones)

4)- Ingresar el siguiente comando:
>php artisan key:generate

5)- Ingresar los siguientes comandos:
>php artisan migrate (esto creará la base de datos con sus respectivas tablas)
>php artisan db:seed --class=ParametroSeeder

6)- Ingresar los siguientes comandos:
>npm install vite --save-dev
>npm run dev
(Estos son necesarios para el funcionamiento de la gestión de cuentas)

7)- Para inicializar el servidor, ingresar el siguiente comando (puede que necesite abrir una nueva consola):
>php artisan serve

8)- Copiar la dirección dada y ejecutarla en el navegador para comenzar a utilizar el sistema

Importante: El usuario que actúe como administrador deberá intercambiar su numero de rol por "1" en la base de datos luego de registrarse

