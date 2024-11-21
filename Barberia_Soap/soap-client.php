<?php
// URL del servidor SOAP
$wsdl = NULL;
$options = array('location' => 'http://localhost/soap-server.php', 'uri' => 'http://localhost/soap-server.php');

// Crear un cliente SOAP
$client = new SoapClient($wsdl, $options);

try {
    // Llamar al método 'obtenerUsuarios' expuesto por el servidor SOAP
    $usuarios = $client->obtenerUsuarios();
    
    // Mostrar los resultados
    echo "<h2>Lista de Usuarios</h2>";
    echo "<ul>";
    foreach ($usuarios as $usuario) {
        echo "<li>ID: " . $usuario['id_usuario'] . " - Nombre: " . $usuario['nombre_usuario'] . " - Email: " . $usuario['email'] . "</li>";
    }
    echo "</ul>";
    
} catch (SoapFault $e) {
    // Manejo de errores en caso de que falle la solicitud SOAP
    echo "Error: " . $e->getMessage();
}
?>
