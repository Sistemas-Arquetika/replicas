<?php

$servername = "localhost";
//existe la base de datos "admin" para poder consultar las otras bases
$database = "aranda";
$username = "admin";
$password = "12345";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Conexion fallida".mysqli_connect_error());
}

//echo "Conexion Exitosa!";
//cerrar conexion para liberar recursos
//mysqli_close($conn);

?>