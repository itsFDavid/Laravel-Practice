<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# BOOK REVIEW APP

Este proyecto pretende dejar reseñar a titulos de libros, estas se pueden filtrar por mejores reseñas o ultimas fechas

## Versiones requeridas

-   PHP >= 8
-   Laravel >= 5

## Link del repositorio

```bash
git clone https://github.com/itsFDavid/Laravel-Practice.git/02-book-review
```

## Configuracion del proyecto

1. Instalas dependencias
```bash
compose install

# Depente tu gestor de paquetes favorito
# yarn install
# npm install
pnpm install
```

2. Copia el archivo de configuracion de las variables de entorno y configura las tuyas propias
```bash
cp .env.example .env
```

3. Genera la clave unica de la aplicacion
```bash
php artisan key:generate
```

