<?php

namespace App\Support;

use JsonSerializable;

/** Respuesta estandar: ESTADO > 0 es exito, ESTADO 0 se devuelve como HTTP 400. */
final class Respuesta implements JsonSerializable
{
    public function __construct(
        public readonly string $mensaje,
        public readonly int $estado,
        public readonly ?string $baseDeDatos = null,
    ) {
    }

    public function jsonSerialize(): array
    {
        return array_filter(
            [
                'RESPUESTA' => $this->mensaje,
                'ESTADO' => $this->estado,
                'BASEDEDATOS' => $this->baseDeDatos,
            ],
            fn ($valor) => $valor !== null,
        );
    }
}
