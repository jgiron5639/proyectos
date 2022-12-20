<?php

include("../conexion.php");
 if (isset($_POST['enviar'])){
    if (strlen($_POST['cad_descripcion']) >=1 &&
    strlen($_POST['cad_mat_estado']) >=1){

    $descripcion = ($_POST['cad_descripcion']);
    $estado = ($_POST['cad_mat_estado']);
            $consulta = "INSERT INTO causa_desercion(cad_descripcion, cad_mat_estado) VALUES ('$descripcion','$estado')";
            $resultado = mysqli_query($con,$consulta);
            if($resultado){
                ?>
                <?php
                include("causa.php");
                ?>
                <h3 class="ok_causa">Registro exitoso</h3>
                <?php
            }else{
                ?>
    <?php
    include("causa.php");
    ?>
    <h1 class="bad">Error al enviar datos</h1>
    <?php
            }
 }
}
