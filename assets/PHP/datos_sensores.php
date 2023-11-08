<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datos_sensores";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los valores enviados por el Arduino usando POST
$distancia = $_POST["distancia"];
$peso = $_POST["peso"];

// Crear y ejecutar la consulta SQL
$sql = "INSERT INTO datos_sensores (distancia, peso) VALUES ('$distancia', '$peso')";

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
