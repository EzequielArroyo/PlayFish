<?php

$usuario = $_POST ["user"]; //creo la variable usuario y le guardo el valor traido del POST
$contrasenia = $_POST ["pass"];
session_start();
$_SESSION["usuario"]=$usuario;

$conexion = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($conexion, "playfish_store");
//Consulta a la base de datos
$consulta = "SELECT * FROM user WHERE username='$usuario' AND password='$contrasenia'";
//ejecuto la querry
$resultado= mysqli_query($conexion, $consulta);
$fila = mysqli_fetch_array($resultado);
if ($fila['id_rol']==1){//es admin
    header('location: my_stock.php');
}elseif($fila['id_rol']==2){
    header('location: all_products.php');
}else{
    header('location: error.html');
}

//Valores a validar
