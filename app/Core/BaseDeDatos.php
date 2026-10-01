<?php

namespace App\Core;

use Illuminate\Support\Facades\DB;

/** Unico punto de acceso a la base de datos (equivalente a DBPool del backend Java). */
class BaseDeDatos
{
    public function consultarValor(string $sql): string
    {
        $fila = (array) DB::selectOne($sql);

        return (string) reset($fila);
    }
}
