<?php

namespace Tests\Feature;

use Tests\TestCase;

class PingTest extends TestCase
{
    public function test_ping_responde_con_el_contrato_estandar(): void
    {
        $this->getJson('/api/ping')
            ->assertOk()
            ->assertJsonPath('RESPUESTA', 'pong')
            ->assertJsonPath('ESTADO', 1)
            ->assertJsonStructure(['RESPUESTA', 'ESTADO', 'BASEDEDATOS']);
    }

    public function test_una_ruta_inexistente_no_expone_detalles_internos(): void
    {
        $this->getJson('/api/noexiste')
            ->assertNotFound()
            ->assertExactJson([
                'RESPUESTA' => 'Ocurrio un error al procesar la solicitud',
                'ESTADO' => 0,
            ]);
    }

    public function test_la_pagina_de_inicio_muestra_el_boton(): void
    {
        $this->get('/')->assertOk()->assertSee('Probar backend');
    }
}
