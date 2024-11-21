<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conceptos Básicos de PHP - Barbería Politécnico Internacional</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <header>
        <h1>Conceptos Básicos de PHP en la Barbería Politécnico Internacional</h1>
    </header>

    <section>
        <h2>Ejemplo 1: Variables y Tipos de Datos</h2>
        <p>En la barbería usamos PHP para gestionar los precios de los cortes de cabello, los servicios ofrecidos y otros datos importantes. Veamos algunos ejemplos básicos.</p>
        <p>Resultado del ejemplo:</p>
        <?php
        // Variables representando servicios en la barbería
        $nombre_barberia = "Barbería Politécnico Internacional";  // String
        $ubicacion = "Soacha";  // String
        $precio_corte = 15000;  // Entero (precio de un corte)
        $precio_barba = 10000;  // Entero (precio de arreglo de barba)
        $abierto = true;  // Booleano para indicar si la barbería está abierta

        // Mostrar información
        echo "Bienvenido a " . $nombre_barberia . " ubicada en " . $ubicacion . ".<br>";
        echo "El precio de un corte de cabello es: $" . $precio_corte . "<br>";
        echo "El precio de un arreglo de barba es: $" . $precio_barba . "<br>";
        echo "¿Está la barbería abierta? " . ($abierto ? "Sí" : "No") . "<br>";
        ?>

        <h2>Ejemplo 2: Operadores Aritméticos</h2>
        <p>En la barbería también hacemos cálculos rápidos, como el total por diferentes servicios y descuentos.</p>
        <p>Resultado del ejemplo:</p>
        <?php
        $total_servicios = $precio_corte + $precio_barba;
        $descuento = 0.1 * $total_servicios;  // 10% de descuento
        $total_con_descuento = $total_servicios - $descuento;

        echo "Total sin descuento: $" . $total_servicios . "<br>";
        echo "Descuento aplicado: $" . $descuento . "<br>";
        echo "Total final con descuento: $" . $total_con_descuento . "<br>";
        ?>
    </section>

    <footer>
        <p><a href="../index.html">Volver a Inicio</a></p>
    </footer>
</body>
</html>
