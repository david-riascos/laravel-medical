<?php

namespace Tests\Unit;

use App\Core\BaseDeDatos;
use App\Services\PingService;
use PHPUnit\Framework\TestCase;

class PingServiceTest extends TestCase
{
    public function test_responde_pong_con_la_version_de_la_base_de_datos(): void
    {
        $baseDeDatos = $this->createStub(BaseDeDatos::class);
        $baseDeDatos->method('consultarValor')->willReturn('3.44.0');

        $respuesta = (new PingService($baseDeDatos))->ping();

        $this->assertSame('pong', $respuesta->mensaje);
        $this->assertSame(1, $respuesta->estado);
        $this->assertSame('SQLite 3.44.0', $respuesta->baseDeDatos);
    }
}
