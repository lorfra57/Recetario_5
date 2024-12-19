<?php
header( "Access-Control-Allow-Origin: http://localhost:3000" );

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "recetas";

$Nombre_Usuario 	= $_POST[ "Nombre_Usuario" ];
$Correo_Electronico = $_POST[ "Correo_Electronico" ];
$Contrasena 	    = $_POST[ "Contrasena" ];

$conn = mysqli_connect( $db_host, $db_user, $db_pass, $db_name );
if( ! $conn ) { die( "DB Connection failed..!" ); }

$query = "INSERT INTO usuarios VALUES( NULL, '$Nombre_Usuario', '$Correo_Electronico', '$Contrasena' )";
$query_result = mysqli_query( $conn, $query );

$json_data = [
    "result" => $query_result,
	"status" => "New record created",
    "usuario" => $Nombre_Usuario,
    "correo" => $Correo_Electronico,
    "contrasena" => $Contrasena
];

echo json_encode( $json_data );
?>