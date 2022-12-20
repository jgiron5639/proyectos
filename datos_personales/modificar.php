<?php
include("../conexion.php");
?>
<?php

session_start();
if (($_SESSION["usuario_clave"]) != '') {
} else {
  header("location:../login/login.php");
}

$con=mysqli_connect("localhost", "root", "", "db_desercion");

$ciudad = mysqli_query($con,"SELECT ciu_id , ciu_nombre FROM ciudad");
$tipo_id = mysqli_query($con,"SELECT tii_id , tii_descripcion FROM tipo_id");
$rh = mysqli_query($con,"SELECT rh_id , rh_descripcion FROM rh");

$usuario = $_SESSION['usuario_id'];
$sql = "SELECT usuario_nombre, usuario_apellido FROM usuarios WHERE usuario_id='$usuario'";

$resultado = $con->query($sql);
$row = $resultado->fetch_assoc();


?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="shortcut icon" type="image/jpg" href="../favicon/sena.png">
  <link rel="stylesheet" href="../css/styles.css">
  <title>Inicio</title>
</head>

<body>
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#5eb319">
    <div class="container-fluid">
      <img src="../imagenes/logo_blanco.png" width="60px" alt="60px">
      <a class="navbar-brand" href="../aprendiz_pagina/aprendiz.php">Inicio</a>
      <a class="navbar-brand" href="../causa_desercion/causa_desercion.php">Deserción</a>
      <a class="navbar-brand" href="../datos_personales/datos.php">Datos personales</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="CN_aprendiz">
      <img class="icono" src="../favicon/icons8-círculo-sin-signo-de-verificación-48.png" alt="#">
      <?php echo utf8_decode($row['usuario_nombre']) . " " . utf8_decode($row['usuario_apellido']); ?>
      </div>
      <div class="salir">
      <a style="text-decoration:none" class="salir" href="cerrar.php" onclick="return CloseSession()">Cerrar sesión</a>
      </div>
      
      
      <!-- Fin boton cerrar sesion -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
      </div>
    </div>

  </nav>
  <!--/NAVBAR-->
  <body>
  <h1 class="A1">Datos personales</h1>
  <div class="formularioDatos">
    <form action="modificar_validar.php" method="POST">
    <?php
    $id=$_GET["apr_id"];
    
    $sql="SELECT * FROM aprendiz WHERE apr_id = '$id'";
    $result=mysqli_query($con,$sql);
   
      while($row=mysqli_fetch_array($result)){
      ?>
      
      <input  type="hidden" name="apr_id" value="<?php echo $row['apr_id']?>">
          <!--Nombre-->
          <p class="datos">Nombre</p>
          <input class="datos" type="text" name="apr_nombre" value="<?php echo $row['apr_nombre']?>">
          <!--Apellido-->
          <p class="datos">Apellido</p>
          <input class="datos" type="text" name="apr_apellido" value="<?php echo $row['apr_apellido']?>">
          <!--Identificacion-->
          <p class="datos">Identificacion</p>
          <input class="datos" type="text" name="apr_id" value="<?php echo $row['apr_id']?>">
          <!--Tipo de identificacion-->
          <p class="datos">Tipo de Identificacion</p>
          <select class="datos_select" name="tii_id">
    <?php while($A = mysqli_fetch_array($tipo_id)){ ?>

    <option value="<?php echo $A['tii_id'] ?>"><?php echo $A['tii_descripcion'] ?></option>

    <?php
        }
    ?>
    </select>
          <!--Tipo de sangre-->
          <p class="datos">Tipo de Sangre</p>
          <select class="datos_select"  name="rh_id">
    <?php while($B = mysqli_fetch_array($rh)){ ?>

    <option value="<?php echo $B['rh_id'] ?>"><?php echo $B['rh_descripcion'] ?></option>

    <?php
        }
    ?>
    </select>
          <!--Genero-->
          <p class="datos">Genero</p>
          <input class="datos" type="text" name="apr_genero" value="<?php echo $row['apr_genero']?>">
          <!--Edad-->
          <p class="datos">Edad</p>
          <input  class="datos" type="text" name="apr_edad" value="<?php echo $row['apr_edad']?>">
          <!--Telefono-->
          <p class="datos">Telefono</p>
          <input class="datos" type="text" name="apr_telefono" value="<?php echo $row['apr_telefono']?>">
           <!--Ciudad-->
           <p class="datos">Ciudad</p>
        <select class="datos_select" name="ciu_id">
    <?php while($ciu = mysqli_fetch_array($ciudad)){ ?>

    <option value="<?php echo $ciu['ciu_id'] ?>"><?php echo $ciu['ciu_nombre'] ?></option>

    <?php
        }
    ?>
    </select>
    <br>
        <input class="botonDatos" type="submit" value="actualizar">
      </tr>
      <?php
      }
      ?>
    <br>
    <a class="botonDatos" href="datos.php">Volver</a>
    </div>
    </form>
  </body>
</html>
