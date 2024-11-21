<?php
// Configurar la conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "root_password";
$dbname = "BarberiaDB";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función que será expuesta a través del servicio SOAP
function obtenerUsuarios() {
    global $conn;
    // Consulta SQL para obtener los usuarios
    $sql = "SELECT id_usuario, nombre_usuario, email FROM Usuarios";
    $result = $conn->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        $usuarios = array();
        // Procesar cada fila del resultado
        while($row = $result->fetch_assoc()) {
            // Agregar cada usuario a un array
            $usuarios[] = array(
                'id_usuario' => $row["id_usuario"],
                'nombre_usuario' => $row["nombre_usuario"],
                'email' => $row["email"]
            );
        }
        return $usuarios;
    } else {
        return array();
    }
}

// Configurar las opciones del servidor SOAP
$options = array('uri' => 'http://localhost/soap-server.php');

// Crear un nuevo servidor SOAP
$server = new SoapServer(NULL, $options);

// Registrar las funciones que el servidor SOAP expondrá
$server->addFunction("obtenerUsuarios");

// Procesar las solicitudes SOAP
$server->handle();
?>
