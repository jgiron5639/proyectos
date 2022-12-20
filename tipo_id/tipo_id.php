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
  <link rel="stylesheet" href="../css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="shortcut icon" type="image/jpg" href="../favicon/sena.png">
  <link rel="stylesheet" href="../css/styles.css">
  <title>Inicio</title>
</head>

<body>
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #5eb319">
    <div class="container-fluid">
      <img class="logo" src="../imagenes/logo_blanco.png">
      <a class="opciones" href="../coordinador/coordinador.php">Inicio</a>
      <a class="opciones" href="../desercion/desercion.php">Deserción</a>
      
      <a class="opciones" href="../aprendiz/formulario_aprendiz.php">Registrar Aprendices</a>
      <a class="opciones" href="../matricula/matricula.php">Registrar Matricula</a>
      <a class="opciones" href="../ficha/ficha.php">Registrar Ficha</a>
      <div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="conf dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Configuración del Sistema
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="../causa/causa.php">Causa de Desercion</a></li>
              <li><a class="dropdown-item" href="../centro/centro.php">Centro</a></li>
              <li><a class="dropdown-item" href="../ciudad/ciudad.php">Ciudad</a></li>
              <li><a class="dropdown-item" href="../departamentos/departamento.php">Departamento</a></li>
              <li><a class="dropdown-item" href="../programa/programa.php">Programa</a></li>
              <li><a class="dropdown-item" href="../rh/rh.php">Tipo de Sangre</a></li>
              <li><a class="dropdown-item" href="../tipo_id/tipo_id.php">Tipo de Identificación</a></li>
            </ul>
          </li>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="CN">
        <img class="icono" src="../favicon/icons8-círculo-sin-signo-de-verificación-48.png" alt="#">
        <?php echo utf8_decode($row['usuario_nombre']) . " " . utf8_decode($row['usuario_apellido']); ?>
      </div>
      <div class="salir">
        <a style="text-decoration: none;" href="cerrar.php" onclick="return CloseSession()">Cerrar Sesión</a>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
      </div>
    </div>
  </nav>
  <!--/NAVBAR-->


  <form class="FormId" action="./validar_registro.php" method="post">
    <h1>Registro de Tipos de Identificacion</h1>
    <p>Nombre</p>
    <input name="tii_descripcion" type="text" placeholder="Ingresa el nombre del tipo de documento" required><br>
    <p>Siglas</p>
    <input name="tii_sigla" type="text" placeholder="Ingresa siglas de la sangre" onkeyup="javascript:this.value=this.value.toUpperCase();" required><br>
    <input class="botonId" type="submit" name="submit" value="inscribir"><br></form>
    <?php
    include("../conexion.php");
    $tipo_id = "SELECT * FROM tipo_id";
    ?>
    <h1 class="ListaId">Listado Tipos de Identificación</h1>
    <div>
      <table class="tablaId">
        <thead class="IdHead">
        <tr class="BodyId">
          <th class="tablaListaId"> Nombre</th>
          <th class="tablaListaId"> Siglas</th>
          <th class="tablaListaId">Modificar</th>
          <th class="tablaListaId">Eliminar</th>
        </tr>
        </thead>
        <?php $resultado = mysqli_query($con, $tipo_id);
        while ($row = mysqli_fetch_assoc($resultado)) { ?>
          <tr class="BodyId">
            <td class="tablaListaId"> <?php echo $row["tii_descripcion"] ?></td>
            <td class="tablaListaId"> <?php echo $row["tii_sigla"] ?></td>
            <td class="tablaListaId"><a href="./modificar.php?tii_id=<?php echo $row['tii_id'] ?>"><button class="btn btn-outline-success" type="button" onclick="return ConfirmModf()">Modificar</button></a></td>
            <td class="tablaListaId"><a href="./eliminar.php?tii_id=<?php echo $row['tii_id'] ?>"><button class="btn btn-outline-danger" type="button" onclick="return ConfirmDelete()">Eliminar</button></a></td>
          <?php }
        mysqli_free_result($resultado) ?></td>
          </tr>
      </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Alerta modificar -->
    <script>
      function ConfirmModf() {
        var respuesta = confirm("¿Quiere modificar este registro?");
        if (respuesta == true) {
          return true;
        } else {
          return false;
        }
      }
    </script>
    <!-- Fin alerta modificar -->

    <!--Alerta eliminar-->
    <script>
      function ConfirmDelete() {
        var respuesta = confirm("¿Esta seguro que desea eliminar este registro?");
        if (respuesta == true) {
          return true;
        } else {
          return false;
        }
      }
    </script>
    <!--/Alerta eliminar-->
    <!-- alerta cerrar sesion -->
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