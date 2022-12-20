<?php
include("../conexion.php");
$id = $_GET['id'];
$fecha = date("d/m/y");

echo $id;


$datos = mysqli_query($con, "UPDATE desercion  SET der_fecha_desercion='$fecha', estado='RECHAZADO' WHERE der_id='$id'");
if ($datos) {
    header("location:coordinador.php");
}
