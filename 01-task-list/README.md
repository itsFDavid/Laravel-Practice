<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# TO-DO APP

Este es un proyecto de tareas por hacer, echo con laravel.

## Versiones requeridas

-   PHP >= 8
-   Laravel >= 5

## Link del repositorio

```bash
git clone https://github.com/itsFDavid/Laravel-Practice.git/01-task-list
```

## Configuracion del proyecto

1. Instalas dependencias

```bash
composer install

# Depende tu controlador de paquetes favorito
# yarn install
# npm install
pnpm install

```

2. Copiar el archivo .env.exmaple a un archivo .env, configurar las varibales de entorno propias

```bash
mv .env.example .env
```

3. Una vez conectado a la base de datos, hacer las migraciones

```bash
php artisan migrate
```

4. Levanta el proyecto

```bash
php artisan serve
```
