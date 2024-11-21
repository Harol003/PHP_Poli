<?php
// Configuración de la conexión a la base de datos
$host = "localhost";
$dbname = "BarberiaDB";
$username = "Politecnico";
$password = "123456";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Función para leer todos los usuarios
function leerUsuarios($pdo) {
    $sql = "SELECT * FROM Usuarios";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para agregar un usuario
function agregarUsuario($pdo, $nombre, $email, $contraseña) {
    try {
        // Comprobamos si ya existe un usuario con el mismo nombre o email
        $sql = "SELECT COUNT(*) FROM Usuarios WHERE nombre_usuario = '$nombre' OR email = '$email'";
        $stmt = $pdo->query($sql);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            echo "Error: Ya existe un usuario con ese nombre o correo.";
            return;
        }

        // Inserción del nuevo usuario
        $sql = "INSERT INTO Usuarios (nombre_usuario, email, contraseña) VALUES ('$nombre', '$email', '$contraseña')";
        $pdo->exec($sql);
        echo "Usuario agregado correctamente.";
    } catch (PDOException $e) {
        die("Error al agregar usuario: " . $e->getMessage());
    }
}

// Función para eliminar un usuario
function eliminarUsuario($pdo, $id) {
    try {
        $sql = "DELETE FROM Usuarios WHERE id_usuario = $id";
        $pdo->exec($sql);
        echo "Usuario eliminado correctamente.";
    } catch (PDOException $e) {
        die("Error al eliminar usuario: " . $e->getMessage());
    }
}

// Función para modificar un usuario
function modificarUsuario($pdo, $id, $nombre, $email, $contraseña) {
    try {
        // Actualización del usuario
        $sql = "UPDATE Usuarios SET nombre_usuario = '$nombre', email = '$email', contraseña = '$contraseña' WHERE id_usuario = $id";
        $pdo->exec($sql);
        echo "Usuario modificado correctamente.";
    } catch (PDOException $e) {
        die("Error al modificar usuario: " . $e->getMessage());
    }
}

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["crear"])) {
        if (!empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["contraseña"])) {
            agregarUsuario($pdo, $_POST["nombre"], $_POST["email"], $_POST["contraseña"]);
        }
    } elseif (isset($_POST["eliminar"])) {
        if (!empty($_POST["id"])) {
            eliminarUsuario($pdo, $_POST["id"]);
        }
    } elseif (isset($_POST["modificar"])) {
        if (!empty($_POST["id"]) && !empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["contraseña"])) {
            modificarUsuario($pdo, $_POST["id"], $_POST["nombre"], $_POST["email"], $_POST["contraseña"]);
        }
    }
    header("Location: index.php");
    exit();
}
?>
