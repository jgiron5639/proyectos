<?php

session_start();
$usuario = $_POST['usuario_id'];
$clave = $_POST['usuario_clave'];

$_SESSION['usuario_clave'] = $clave;

//CONEXION

$con = mysqli_connect("localhost", "root", "", "db_desercion");



$consulta = "SELECT * FROM usuarios where usuario_id = '$usuario' and usuario_clave = '$clave'";

$resultado = mysqli_query($con, $consulta);

$rows = mysqli_fetch_array($resultado);

$_SESSION['usuario_id'] = $usuario;
$_SESSION['rol_id'] = $rows['rol_id'];

if ($resultado->num_rows == 0) {
  header('location:../login/login.php');
}

if ($rows['rol_id'] == 1) {
  header('location:../aprendiz_pagina/aprendiz.php');
} else
if ($rows['rol_id'] == 2) {
  header('location:../coordinador/coordinador.php');

}


mysqli_free_result($resultado);
mysqli_close($con);
