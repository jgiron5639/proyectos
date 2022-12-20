<?php

$con = mysqli_connect('localhost', 'root', '', 'db_desercion');

include("../conexion.php");

 if (isset($_POST['enviar'])){
    if (strlen($_POST['fic_numero']) >=1 &&
    strlen($_POST['apr_id']) >=1 &&
    strlen($_POST['mat_estado']) >=1){

    $numero = ($_POST['fic_numero']);
    $apr = ($_POST['apr_id']);
    $estado = ($_POST['mat_estado']);

            $consulta = "INSERT INTO matricula(fic_numero, apr_id, mat_estado) VALUES ('$numero', '$apr', '$estado')";
            $resultado = mysqli_query($con,$consulta);
            if($resultado){
                ?>
        <?php
        include("matricula.php");
        ?>
        <h2 class="ok_matricula">Registro exitoso</h2>
        <?php
            }else{
                ?>
    <?php
    include("matricula.php");
    ?>
    <h1 class="bad">Error al enviar datos</h1>
    <?php
            }
    }
}