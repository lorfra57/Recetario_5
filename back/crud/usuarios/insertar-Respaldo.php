<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'recetas';

$conn = mysqli_connect($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Nombre_Usuario = $_POST['Nombre_Usuario'] ?? null;
    $Correo_Electronico = $_POST['Correo_Electronico'] ?? null;
    $Contrasena = $_POST['Contrasena'] ?? null;

    if ($Nombre_Usuario && $Correo_Electronico !== null && $Contrasena) {
        $stmt = $conn->prepare("INSERT INTO usuarios (Nombre_Usuario, Correo_Electronico, Contrasena) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $Nombre_Usuario, $Correo_Electronico, $Contrasena);

        if ($stmt->execute()) {
            $inserted_id = $stmt->insert_id;
            $json_data = [
                'status' => 'success',
                'message' => 'Registro insertado correctamente',
                'data' => [
                    'id' => $inserted_id,
                    'Nombre_usuario' => $Nombre_Usuario,
                    'Correo_electronico' => $Correo_Electronico,
                    'Contrasena' => $Contrasena
                ]
            ];
        } else {
            $json_data = [
                'status' => 'error',
                'message' => 'Error al insertar el registro: ' . $conn->error
            ];
        }

        $stmt->close();
    } else {
        $json_data = [
            'status' => 'error',
            'message' => 'Faltan campos obligatorios'
        ];
    }

    echo json_encode($json_data);
}

$conn->close();

?>