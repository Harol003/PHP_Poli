<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conceptos Avanzados de PHP - Barbería Politécnico Internacional</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <header>
        <h1>Conceptos Avanzados de PHP en la Barbería Politécnico Internacional</h1>
    </header>

    <section>
        <h2>Ejemplo 1: Funciones con Parámetros</h2>
        <p>Las funciones nos permiten aplicar descuentos personalizados según los servicios que ofrecemos en la barbería.</p>
        <p>Resultado del ejemplo:</p>
        <?php
        function calcularDescuento($total, $porcentaje) {
            return $total - ($total * $porcentaje / 100);
        }

        $total_servicio = 25000;  // Total de un servicio combinado
        $porcentaje_descuento = 15;  // Descuento del 15%

        $total_con_descuento = calcularDescuento($total_servicio, $porcentaje_descuento);
        echo "Total después del descuento de " . $porcentaje_descuento . "%: $" . $total_con_descuento . "<br>";
        ?>

        <h2>Ejemplo 2: Manejo de Formularios</h2>
        <p>En nuestra barbería, usamos formularios para que los clientes hagan reservaciones.</p>
        <form method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>
            <label for="servicio">Selecciona un servicio:</label>
            <select id="servicio" name="servicio">
                <option value="corte">Corte de Cabello</option>
                <option value="barba">Arreglo de Barba</option>
                <option value="completo">Corte y Barba</option>
            </select><br><br>
            <input type="submit" value="Reservar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre_cliente = $_POST["nombre"];
            $servicio_solicitado = $_POST["servicio"];

            echo "Gracias " . $nombre_cliente . ", has reservado el servicio de: " . $servicio_solicitado . "<br>";
        }
        ?>
    </section>

    <footer>
        <p><a href="../index.html">Volver a Inicio</a></p>
    </footer>
</body>
</html>
