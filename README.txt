..--========INSTRUCCIONES DE INSTALACI�N========--..

� REQUISITOS: Laragon, PHP, Laravel

1)- Clonar el proyecto a la carpeta "WWW" dentro de el directorio donde haya instalado Laragon.

2)- Abrir Laragon y hacer clic en el bot�n para abrir la terminal de comandos. Una vez dentro deber� ingresar el siguiente comando:
>cd laravel (esto har� que los comandos se ejecuten en el directorio del programa)

3)- Ingresar los siguientes comandos:
>composer install (esto instalar� composer, que es necesario para el funcionamiento del proyecto)
>composer require barryvdh/laravel-dompdf (esto instalar� dompdf, necesario para determinadas funciones)

4)- Ingresar el siguiente comando:
>php artisan key:generate

5)- Ingresar el siguiente comando:
>php artisan migrate (esto crear� la base de datos con sus respectivas tablas)

6)- Ingresar los siguientes comandos:
>npm install vite --save-dev
>npm run build
(Estos son necesarios para el funcionamiento de la gesti�n de cuentas)

7)- Para inicializar el servidor, ingresar el siguiente comando:
>php artisan serve

8)- Copiar la direcci�n dada y ejecutarla en el navegador para comenzar a utilizar el sistema

Importante: El usuario que act�e como administrador deber� intercambiar su numero de rol por "1" en la base de datos luego de registrarse

