<?php

namespace App\Services;

use App\Core\BaseDeDatos;
use App\Support\Respuesta;

class PingService
{
    public function __construct(private readonly BaseDeDatos $baseDeDatos)
    {
    }

    /** Responde pong y confirma que la base de datos contesta. */
    public function ping(): Respuesta
    {
        $version = $this->baseDeDatos->consultarValor('SELECT sqlite_version()');

        return new Respuesta('pong', 1, "SQLite {$version}");
    }
}
