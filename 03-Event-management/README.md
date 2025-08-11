<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Event Management API

Este proyecto prentende controlar la asistencia a eventos, mandar recordatorios por correo electronico a eventos proximos a los que asistira el usuario.

## Versiones requeridas

-   PHP >= 8
-   Laravel >= 5

## Link del repositorio

```bash
git clone https://github.com/itsFDavid/Laravel-Practice.git/03-Event-management
```

## Configuracion del proyecto

1. Instala las dependencias necesarias

```bash
composer install

# Depende de tu gestor de paquetes favorito
# yarn install
# npm install
pnpm install
```

2. Copia el archivo de variables de entorno y configura las propias

```bash
cp .env.exmaple .env
```

3. Genera la clave unica de la app

```bash
php artisan key:generate
```

4. Una vez configurada la conexion con la base de datos, realiza las migraciones necesarias

```bash
php artisan migrate
```

5. Levanta el proyecto

```bash
php artisan serve
```

## Endpoints

prefix: `/api`

-   Auth:
    -   `POST /login`
    -   `POST /logout`
-   User:
    -   `GET /user`: return info about user with the token passed in the Authorization
-   Event:
    -   `POST /events`: Create an event
    -   `GET /events`: Get all events, also can add this to get relationships `?include=attendees.user, user`
    -   `GET /events/:id`: Get an event by id
    -   `PUT /events/:id`: Update an event by ud
    -   `DELETE /events/:id`: Delete an event by id
-   Attendee:
    -   `GET /events/:idEvent/attendees`: get all attendees for this event, also can add this to get relationships `?include=attendees.user, user`
    -   `GET /events/:idEvent/attendees/:idAttendee`: return info about the attendee in this event, also can add this to get relationships `?include=attendees.user, user`
    -   `DELETE /events/:idEvent/attendees/:idAttendee`: delete attende in this event
    -   `POST /events/:idEvent/attendees`: create an attendee for this event with the token passed in the Authorization
