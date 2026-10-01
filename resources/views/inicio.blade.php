<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrenamiento Laravel + Blade</title>
    <style>
        body { margin: 0; font-family: system-ui, sans-serif; }
        .contenedor { max-width: 480px; margin: 4rem auto; text-align: center; }
        button { padding: 0.6rem 1.2rem; font-size: 1rem; cursor: pointer; }
        .ok { color: #2e7d32; }
        .error { color: #c62828; }
    </style>
</head>
<body>
    <main class="contenedor">
        <h1>Entrenamiento: Laravel + Blade</h1>
        <button id="probar" type="button">Probar backend</button>
        <p id="resultado"></p>
    </main>

    <script>
        const boton = document.getElementById('probar');
        const resultado = document.getElementById('resultado');

        boton.addEventListener('click', async () => {
            boton.disabled = true;
            boton.textContent = 'Probando...';
            try {
                const respuesta = await fetch(@json(url('/api/ping')), { headers: { Accept: 'application/json' } });
                const { RESPUESTA, ESTADO, BASEDEDATOS } = await respuesta.json();
                resultado.className = ESTADO > 0 ? 'ok' : 'error';
                resultado.textContent = `${RESPUESTA} (${BASEDEDATOS})`;
            } catch {
                // No se muestran detalles tecnicos al usuario.
                resultado.className = 'error';
                resultado.textContent = 'No se pudo conectar con el backend';
            } finally {
                boton.disabled = false;
                boton.textContent = 'Probar backend';
            }
        });
    </script>
</body>
</html>
