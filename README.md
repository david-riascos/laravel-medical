# laravel-medical

Proyecto personal de práctica: un sistema de información clínica en miniatura (login, usuarios y permisos, historia clínica, banco de sangre, RIPS...) construido con **Laravel 13** y **Blade**, como parte de un laboratorio donde replico el mismo problema en distintos stacks para comparar cómo resuelve cada uno las mismas piezas (autenticación, capas, validación, pruebas).

> Todo el contenido (datos, usuarios, pacientes, etc.) es **ficticio**. Este repositorio es solo para aprendizaje personal.

## Stack

| Pieza | Detalle |
|---|---|
| Framework | Laravel 13, PHP 8.3 |
| Base de datos | SQLite |
| Vistas | Blade (CSS/JS en la propia vista, sin Vite ni Node) |
| Pruebas | PHPUnit |

## Arquitectura

Una sola app (vistas + API en el mismo proyecto), con capas separadas:

```
Controller → Service → Core (acceso a BD)
```

- El **controller** solo delega.
- El **service** tiene la lógica de negocio.
- El **core/repository** es el único que toca la base de datos.

Las respuestas de la API siguen un contrato fijo:

```json
{ "RESPUESTA": "...", "ESTADO": 1, "BASEDEDATOS": "..." }
```

`ESTADO > 0` es éxito; `ESTADO 0` responde con HTTP 400 y sin exponer detalles internos del error.

## Cómo correrlo

```bash
composer install
copy .env.example .env   # si no existe ya
php artisan key:generate
php artisan serve --port=8085
```

Abrir `http://localhost:8085`.

## Pruebas

```bash
php artisan test
```

## Estado

Proyecto en construcción, avanzando módulo por módulo (login → usuarios/permisos → historia clínica → banco de sangre → RIPS → integración).
