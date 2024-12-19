<?php
header( "Access-Control-Allow-Origin: http://localhost:3000" );

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "recetas";

$Nombre          	= $_POST[ "Nombre" ];
$Preparacion        = $_POST[ "Preparacion" ];
$Ingredientes 	    = $_POST[ "Ingredientes" ];
$ID_Usuario         = $_POST["ID_Usuario" ];

$conn = mysqli_connect( $db_host, $db_user, $db_pass, $db_name );
if( ! $conn ) { die( "DB Connection failed..!" ); }

$query = "INSERT INTO recetas VALUES( NULL, '$Nombre', '$Preparacion', '$Ingredientes', '$ID_Usuario' )";
$query_result = mysqli_query( $conn, $query );

$json_data = [
    "result" => $query_result,
	"status" => "New record created",
    "Nombre" => $Nombre,
    "Preparacion" => $Preparacion,
    "Ingredientes" => $Ingredientes,
    "ID_Usuario" => $ID_Usuario
];

echo json_encode( $json_data );
?>