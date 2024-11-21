<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario está logueado, de lo contrario redirigir al login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Incluir el archivo que contiene las funciones para gestionar usuarios
include 'usuarios_crud.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h1>Gestión de Usuarios</h1>

        <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?> | <a href="logout.php">Cerrar sesión</a></h2>

        <!-- Formulario para agregar usuario -->
        <h2>Agregar Usuario</h2>
        <form method="POST" action="usuarios_crud.php">
            <label for="nombre">Nombre de Usuario:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>
            
            <button type="submit" name="crear">Agregar Usuario</button>
        </form>

        <!-- Formulario para modificar usuario -->
        <h2>Modificar Usuario</h2>
        <form method="POST" action="usuarios_crud.php">
            <label for="id">ID de Usuario:</label>
            <input type="number" id="id" name="id" required>
            
            <label for="nombre">Nombre de Usuario:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>
            
            <button type="submit" name="modificar">Modificar Usuario</button>
        </form>

        <!-- Formulario para eliminar usuario -->
        <h2>Eliminar Usuario</h2>
        <form method="POST" action="usuarios_crud.php">
            <label for="id">ID de Usuario:</label>
            <input type="number" id="id" name="id" required>
            <button type="submit" name="eliminar">Eliminar Usuario</button>
        </form>

        <h2>Lista de Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    // Llamamos a la función que lee todos los usuarios
                    $usuarios = leerUsuarios($pdo);

                    // Mostrar cada usuario en la tabla
                    foreach ($usuarios as $usuario) {
                        echo "<tr>";
                        echo "<td>" . $usuario['id_usuario'] . "</td>";
                        echo "<td>" . $usuario['nombre_usuario'] . "</td>";
                        echo "<td>" . $usuario['email'] . "</td>";
                        echo "<td>
                                <form method='POST' action='usuarios_crud.php' style='display:inline;'>
                                    <input type='hidden' name='id' value='" . $usuario['id_usuario'] . "'>
                                    <button type='submit' name='eliminar'>Eliminar</button>
                                </form>
                                <form method='POST' action='index.php' style='display:inline;'>
                                    <input type='hidden' name='id' value='" . $usuario['id_usuario'] . "'>
                                    <input type='text' name='nombre' value='" . $usuario['nombre_usuario'] . "' required>
                                    <input type='email' name='email' value='" . $usuario['email'] . "' required>
                                    <input type='password' name='contraseña' value='" . $usuario['contraseña'] . "' required>
                                    <button type='submit' name='modificar'>Modificar</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo "Error al cargar usuarios: " . $e->getMessage();
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
