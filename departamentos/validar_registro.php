<?php

$con=mysqli_connect("localhost", "root", "", "db_desercion");

include("../conexion.php");

if (isset($_POST['submit'])) {
if (strlen($_POST['dep_codigo']) >= 1 &&
        strlen($_POST['dep_nombre']) >= 1){

    $cod = trim($_POST['dep_codigo']);
    $nombre = trim($_POST['dep_nombre']);


    $consulta = "INSERT INTO departamento(dep_codigo, dep_nombre) VALUES ('$cod', '$nombre')";
    $resultado = mysqli_query($con,$consulta);

    if($resultado){
        header("location:departamento.php");
    }else{
        ?>
    <?php
    include("departamento.php");
    ?>
    <h1 class="bad">Error al enviar datos</h1>
    <?php
    }

}

}