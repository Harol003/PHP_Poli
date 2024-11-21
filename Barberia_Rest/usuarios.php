<?php
// Incluir archivo de configuración para conexión a la base de datos
include('config.php');

// Consultar todos los usuarios de la tabla Usuarios
$query = "SELECT * FROM Usuarios"; // Consulta SQL para obtener todos los usuarios
$stmt = $pdo->query($query); // Ejecutar la consulta

// Obtener los resultados de la consulta
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Lista de Usuarios</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Usuario</th>
                <th>Email</th>
                <th>Fecha de Creación</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Iterar sobre los usuarios y mostrar los datos en la tabla
            foreach ($usuarios as $usuario) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($usuario['id_usuario']) . "</td>";
                echo "<td>" . htmlspecialchars($usuario['nombre_usuario']) . "</td>";
                echo "<td>" . htmlspecialchars($usuario['email']) . "</td>";
                echo "<td>" . htmlspecialchars($usuario['fecha_creacion']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
