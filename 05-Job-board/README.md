<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Job Board APP

Este proyecto pretende una plataforma para postular a trabajas, crear ofertas de trabajo, con una interfaz muy intuitiva y facil de usar.

## Versiones requeridas

-   PHP >= 8
-   Laravel >= 11

## Link del repositorio

```bash
git clone https://github.com/itsFDavid/Laravel-Practice.git/05-Job-board
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

2. Copia el archivo de las variables d e configuracion de entorno

```bash
cp .env.exmaple .env
```

3. Crea la clave unica de la aplicacion

```bash
php artisan key:generate
```

4. Una vez configurada la conexion a la base de datos, crea las migraciones necesarias

```bash
php artisan migrate

# O puedes generar de una vez datos de prueba
# para mas info revisa el archivo en database/seeders
php artisan migrate --seed
# o incluso puedes refrescar la base de datos haciendo las migraciones 
# y el seed de los datos, insertando nuevos y borrando los anteriores
php artisan migrate:refresh --seed
```



5. levanta el proyecto

```bash
php artisan serve

# Modo desarrollo
pnpm run dev

# Generar los assets para produccion
pnpm run build
```
