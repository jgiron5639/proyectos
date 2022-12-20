<?php

include("../conexion.php");
$con=mysqli_connect("localhost", "root", "", "db_desercion");



if(isset($_POST['Ingresar'])){
    if(strlen($_POST['apr_id']) >= 1 && 
        strlen($_POST['fic_numero']) >=1 && 
        strlen($_POST['cad_codigo']) >= 1 && 
        strlen($_POST['usuario_id']) >=1 && 
        strlen($_POST['der_fase']) >=1){

        $apr_id = ($_POST['apr_id']);
        $fic_numero = ($_POST['fic_numero']);
        $cad_codigo = ($_POST['cad_codigo']);
        $usuario_id = ($_POST['usuario_id']);
        $der_fase = ($_POST['der_fase']);

        $consulta = "INSERT INTO desercion (apr_id , fic_numero , cad_codigo , usuario_id , der_fase) VALUES ('$apr_id' , '$fic_numero' , '$cad_codigo' , '$usuario_id' , '$der_fase' )";
        $resultado = mysqli_query($con, $consulta);

        if($resultado){
            ?>
        <?php
        include("desercion.php");
        ?>
        <h4 class="ok_desercion">Registro exitoso</h4>
        <?php
        }else{
            ?>
    <?php
    include("desercion.php");
    ?>
    <h1 class="bad">Error al enviar datos</h1>
    <?php

        }
        }
    }
?>

