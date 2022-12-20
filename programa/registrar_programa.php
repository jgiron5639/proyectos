<?php

include("../conexion.php");

if (isset($_POST['enviar'])){
    if (strlen($_POST['pro_descripcion']) >= 1 &&
        strlen($_POST['pro_estado']) >= 1){
            $pro_descripcion = ($_POST['pro_descripcion']);
            $pro_estado = ($_POST['pro_estado']);
            $consulta = "INSERT INTO programa(pro_descripcion, pro_estado) VALUES ('$pro_descripcion', '$pro_estado')";
            $resultado = mysqli_query($con, $consulta);
            if($resultado){
                ?>
        <?php
        include("programa.php");
        ?>
        <h3 class="ok_programa">Registro exitoso</h3>
        <?php
            }else{
                ?>
    <?php
    include("programa.php");
    ?>
    <h1 class="bad">Error al enviar datos</h1>
    <?php
            }
    }
}