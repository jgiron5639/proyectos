<?php

session_start();

if (($_SESSION["usuario_clave"]) != '') {
} else {
  header("location:../login/login.php");
}

$con = mysqli_connect("localhost", "root", "", "db_desercion");

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
  <link rel="shortcut icon" type="image/jpg" href="../favicon/sena.png">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/styles.css">
  <title>Bienvenido</title>
</head>

<body>
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#5eb319">
    <div class="container-fluid">
      <img src="../imagenes/logo_blanco.png" width="60px" alt="60px">
      <a class="navbar-brand " href="../aprendiz_pagina/aprendiz.php">Inicio</a>
      <a class="navbar-brand" href="../causa_desercion/causa_desercion.php">Deserción</a>
      <a class="navbar-brand" href="../datos_personales/datos.php">Datos personales</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="CN_aprendiz">
      <img class="icono" src="../favicon/icons8-círculo-sin-signo-de-verificación-48.png" alt="#">
      <?php echo utf8_decode($row['usuario_nombre']) . " " . utf8_decode($row['usuario_apellido']); ?>
      </div>
      <div class="salir_aprendiz">
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
  <h5 class="solicitud">Aceptado</h5>
  <p>
  <?php

$con = mysqli_connect("localhost", "root", "", "db_desercion");

$consulta = "SELECT desercion.apr_id, desercion.der_id, desercion.estado, ficha.fic_numero, desercion.der_fecha_desercion, aprendiz.apr_nombre, aprendiz.apr_apellido,causa_desercion.cad_descripcion, usuarios.usuario_nombre, usuarios.usuario_apellido from desercion INNER JOIN ficha on desercion.fic_numero = ficha.fic_numero INNER JOIN aprendiz on desercion.apr_id = aprendiz.apr_id INNER JOIN causa_desercion ON desercion.cad_codigo=causa_desercion.cad_codigo INNER JOIN usuarios on desercion.usuario_id=usuarios.usuario_id WHERE estado='aceptado' AND aprendiz.usuario_id=" . $_SESSION['usuario_id'];

?>
<table >
  <tr>
    <th class="tablaC2"> Identificación del aprendiz </th>
    <th class="tablaC2"> Número de la ficha </th>
    <th class="tablaC2"> Nombre </th>
    <th class="tablaC2"> Apellido </th>
    <th class="tablaC2"> Fecha de Desercion </th>
    <th class="tablaC2"> Causa de la deserción </th>
    <th class="tablaC2"> Estado </th>
  </tr>
  <?php $resultado = mysqli_query($con, $consulta);
  while ($row = mysqli_fetch_assoc($resultado)) { ?>
    <tr>
      <td class="tablaC2"><?php echo $row["apr_id"] ?></td>
      <td class="tablaC2"><?php echo $row["fic_numero"] ?></td>
      <td class="tablaC2"><?php echo $row["apr_nombre"] ?></td>
      <td class="tablaC2"><?php echo $row["apr_apellido"] ?></td>
      <td class="tablaC2"><?php echo $row["der_fecha_desercion"] ?></td>
      <td class="tablaC2"><?php echo $row["cad_descripcion"] ?></td>
      <td class="tablaC2"><?php echo $row["estado"] ?></td>
    <?php }
  mysqli_free_result($resultado);
    ?>
    </tr>
</table>
  </p>
  <hr>
  <h5 class="solicitud">Rechazado</h5>
  <p>
  <?php

$con = mysqli_connect("localhost", "root", "", "db_desercion");

$consulta = "SELECT desercion.apr_id, desercion.der_id, desercion.estado, ficha.fic_numero, desercion.der_fecha_desercion, aprendiz.apr_nombre, aprendiz.apr_apellido,causa_desercion.cad_descripcion, usuarios.usuario_nombre, usuarios.usuario_apellido from desercion INNER JOIN ficha on desercion.fic_numero = ficha.fic_numero INNER JOIN aprendiz on desercion.apr_id = aprendiz.apr_id INNER JOIN causa_desercion ON desercion.cad_codigo=causa_desercion.cad_codigo INNER JOIN usuarios on desercion.usuario_id=usuarios.usuario_id WHERE estado='rechazado' AND aprendiz.usuario_id=" . $_SESSION['usuario_id']  ;

?>
<table>
  <tr>
    <th class="tablaC2"> Identificación del aprendiz </th>
    <th class="tablaC2"> Número de la ficha </th>
    <th class="tablaC2"> Nombre </th>
    <th class="tablaC2"> Apellido </th>
    <th class="tablaC2"> Fecha de Desercion </th>
    <th class="tablaC2"> Causa de la deserción </th>
    <th class="tablaC2"> Estado </th>
  </tr>
  <?php $resultado = mysqli_query($con, $consulta);
  while ($row = mysqli_fetch_assoc($resultado)) { ?>
    <tr>
      <td class="tablaC2"><?php echo $row["apr_id"] ?></td>
      <td class="tablaC2"><?php echo $row["fic_numero"] ?></td>
      <td class="tablaC2"><?php echo $row["apr_nombre"] ?></td>
      <td class="tablaC2"><?php echo $row["apr_apellido"] ?></td>
      <td class="tablaC2"><?php echo $row["der_fecha_desercion"] ?></td>
      <td class="tablaC2"><?php echo $row["cad_descripcion"] ?></td>
      <td class="tablaC2"><?php echo $row["estado"] ?></td>
    <?php }
  mysqli_free_result($resultado);
    ?>
    </tr>
</table>
  </p>
</div>

  <h5 class="solicitud">Pendiente</h5>

  <?php

  $con = mysqli_connect("localhost", "root", "", "db_desercion");

  $consulta = "SELECT desercion.apr_id, desercion.der_id, desercion.estado, desercion.der_fecha_desercion, ficha.fic_numero, aprendiz.apr_nombre, aprendiz.apr_apellido,causa_desercion.cad_descripcion, usuarios.usuario_nombre, usuarios.usuario_apellido from desercion INNER JOIN ficha on desercion.fic_numero = ficha.fic_numero INNER JOIN aprendiz on desercion.apr_id = aprendiz.apr_id INNER JOIN causa_desercion ON desercion.cad_codigo=causa_desercion.cad_codigo INNER JOIN usuarios on desercion.usuario_id=usuarios.usuario_id WHERE estado='pendiente' AND aprendiz.usuario_id=" . $_SESSION['usuario_id'];

  ?>
  <table>
    <tr>
      <th class="tablaC2">Identificación del aprendiz</th>
      <th class="tablaC2">Número de la ficha</th>
      <th class="tablaC2">Nombre</th>
      <th class="tablaC2">Apellido</th>
      <th class="tablaC2">Fecha de Desercion</th>
      <th class="tablaC2">Causa de la deserción</th>
      <th class="tablaC2">Estado</th>
    </tr>
    <?php $resultado = mysqli_query($con, $consulta);
    while ($row = mysqli_fetch_assoc($resultado)) { ?>
      <tr>
        <td class="tablaC2"><?php echo $row["apr_id"] ?></td>
        <td class="tablaC2"><?php echo $row["fic_numero"] ?></td>
        <td class="tablaC2"><?php echo $row["apr_nombre"] ?></td>
        <td class="tablaC2"><?php echo $row["apr_apellido"] ?></td>
        <td class="tablaC2"><?php echo $row["der_fecha_desercion"] ?></td>
        <td class="tablaC2"><?php echo $row["cad_descripcion"] ?></td>
        <td class="tablaC2"><?php echo $row["estado"] ?></td>
      <?php }
    mysqli_free_result($resultado);
      ?>
      </tr>
  </table>


  <!-- Alerta cerrar sesion -->
  <script>
    function CloseSession() {
      var respuesta = confirm("¿Quiere cerrar la sesión?");
      if (respuesta == true) {
        return true;
      } else {
        return false;
      }
    }
  </script>
  <!-- Fin alerta cerrar sesion -->