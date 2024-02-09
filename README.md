# Libreria-BackEnd
## Desarrollo BackEnd

Este proyecto fue realizado en:
- php 8.0
- [Laravel 8.*](https://laravel.com/) 
- MySql

## Instalacion


### _Tener Instalado PHP 8.0 y Composer



### Inicializar Proyecto
Agregar las crendenciales de la base de datos MySql en el archivo .env 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=libreria
DB_USERNAME=DB_USERNAME <-
DB_PASSWORD=secret <-
```
Ejecutar :
```bash
composer install  
```
Si surge algun problema ejecutar :
```bash
composer update  
```

## Inicializar Base de datos

Ejecutar:
```bash
php artisan migrate

```

Ejecutar:
```bash
php artisan migrate
```

Cargar datos ejecutar:

```bash
php artisan db:seed
```

El programa se ejecutara y se podran realizar distintas peticiones a la API.

## Levantar Proyecto

Ejecutar:
```bash
php artisan serve  
```
El proyecto se ejecutara en el puerto 8000

## Referencia de API para Libreria-BackEnd
el proyecto contiene los metodso [GET, POST, PUT, PATCH, DELETE]


[http://127.0.0.1:8000/api/v1/cliente](http://127.0.0.1:8000/api/v1/cliente) 


[http://127.0.0.1:8000/api/v1/autor](http://127.0.0.1:8000/api/v1/autor) 

[http://127.0.0.1:8000/api/v1/prestamos](http://127.0.0.1:8000/api/v1/prestamos) 

[http://127.0.0.1:8000/api/v1/libros](http://127.0.0.1:8000/api/v1/libros) 

#### Para obtener los clientes con prestamos vencidos ingresar a la ruta:


[http://127.0.0.1:8000/api/v1/cliente?prestamosVencidos=true](http://127.0.0.1:8000/api/v1/cliente?prestamosVencidos=true) 

#### Para Agrupar prestamos por semana o mes ingresar a la ruta

[http://127.0.0.1:8000/api/v1/prestamos?filter=mes](http://127.0.0.1:8000/api/v1/prestamos?filter=mes) 

[http://127.0.0.1:8000/api/v1/prestamos?filter=semana](http://127.0.0.1:8000/api/v1/prestamos?filter=semana) 




