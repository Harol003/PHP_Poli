<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conceptos Intermedios de PHP - Barbería Politécnico Internacional</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <header>
        <h1>Conceptos Intermedios de PHP en la Barbería Politécnico Internacional</h1>
    </header>

    <section>
        <h2>Ejemplo 1: Condicionales</h2>
        <p>Usamos condicionales para determinar si la barbería está abierta o cerrada en función del día y la hora.</p>
        <p>Resultado del ejemplo:</p>
        <?php
        $dia_actual = date("D");  // Día actual en formato abreviado
        $hora_actual = date("H");  // Hora actual en formato 24 horas

        if ($dia_actual == "Sun") {
            echo "Es domingo, la barbería está cerrada.<br>";
        } elseif ($hora_actual >= 9 && $hora_actual <= 18) {
            echo "La barbería está abierta.<br>";
        } else {
            echo "La barbería está cerrada por fuera de horario.<br>";
        }
        ?>

        <h2>Ejemplo 2: Bucles</h2>
        <p>Usamos bucles para gestionar la atención de clientes en la barbería, por ejemplo, para mostrar cuántos clientes hemos atendido en el día.</p>
        <p>Resultado del ejemplo:</p>
        <?php
        for ($cliente = 1; $cliente <= 5; $cliente++) {
            echo "Atendiendo al cliente número: " . $cliente . "<br>";
        }
        ?>
    </section>

    <footer>
        <p><a href="../index.html">Volver a Inicio</a></p>
    </footer>
</body>
</html>
