<?php
include("../conexion.php");

$id = $_POST['ciu_id'];
    $eliminar = "DELETE FROM ciudad WHERE ciu_id = '$id'";
    $resultadoEli = mysqli_query($con,$eliminar);
    if($resultadoEli){
      header("location: ciudad.php");
    }else{
      echo "no se ha eliminado los datos";
    }
?>