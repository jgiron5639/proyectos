<?php

$con=mysqli_connect("localhost", "root", "", "db_desercion");

include("../conexion.php");

if (isset($_POST['submit'])) {
    if (strlen($_POST['tii_descripcion']) >= 1 &&
        strlen($_POST['tii_sigla']) >= 1){

    $nombre = trim($_POST['tii_descripcion']);
    $siglas = trim($_POST['tii_sigla']);

    $consulta = "INSERT INTO tipo_id(tii_descripcion, tii_sigla) VALUES ('$nombre', '$siglas')";
    $resultado = mysqli_query($con,$consulta);
    if($resultado){
        ?>
        <?php
        include("tipo_id.php");
        ?>
        <h1 class="ok">Registro exitoso</h1>
        <?php
    }else{
        ?>
        <?php
        include("tipo_id.php");
        ?>
        <h1 class="bad">Error al enviar datos</h1>
        <?php
    }
    }
}


