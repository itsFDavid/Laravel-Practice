<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Livewire poll

Este proyecto prentende crear encuestas que se van actualizando y mostrando los votos en vivo o tiempo real.

## Versiones requeridas

-   PHP >= 8
-   Laravel >= 11
-   Livewire = 3.5

## Link del repositorio

```bash
git clone https://github.com/itsFDavid/Laravel-Practice.git/04-Livewire-poll
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

2. Copia el archivo de las variables de configuracion del entorno y añade las propias

```bash
cp .env.example .env
```

3. Crea la clave unica de la aplicacion

```bash
php artisan key:generate
```

4. Una vez configurada la conexion con la base de datos, haz las migreaciones necesarias

```bash
php artisan migrate
```

5. Levanta el proyecto

```bash
php artisan serve

# Modo desarrollo
pnpm run dev

# Creacion de los asstes para produccion
pnpm run build
```
