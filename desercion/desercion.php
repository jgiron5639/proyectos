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

  <?php

  $con = mysqli_connect("localhost", "root", "", "db_desercion");

  $causa = mysqli_query($con, "SELECT cad_codigo, cad_descripcion FROM causa_desercion");
  $ficha = mysqli_query($con, "SELECT fic_numero FROM ficha");

  ?>

  <div class="desercion">
    <form action="registrar_desercion.php" method="POST" >

      <h1 class="inicioDeser">Inicio de Desercion</h1>
      <p class="Deser1">Identificacion del Aprendiz</p>
      <input class="deserApren" placeholder="Identificación" type="number" required  name="apr_id" >
      
      <p class="Deser1">Numero de Ficha</p>
      <select class="deserApren_select" name="fic_numero"  required>
        <?php while ($A = mysqli_fetch_array($ficha)) { ?>
          <option value="<?php echo $A['fic_numero'] ?>"><?php echo $A['fic_numero'] ?></option>

        <?php
        }
        ?>
      </select>
            
      </select>

      <p class="Deser1">Causa de la Deserción</p>
      <select class="deserApren_select" required name="cad_codigo">
        <?php while ($deser = mysqli_fetch_array($causa)) { ?>

          <option value="<?php echo $deser['cad_codigo'] ?>"><?php echo $deser['cad_descripcion'] ?></option>

        <?php
        }
        ?>
      </select>

      <p class="Deser1">Identificacion Usuario</p>
      <input class="deserApren" placeholder="Identificación" type="number" required  name="usuario_id">
      <p class="Deser1">Fase de la Desercion</p>
    <select  class="deserApren_select" name="der_fase" id="der_fase" required>
      <option value="Analisis">Analisis</option>
      <option value="Planeacion">Planeacion</option>
      <option value="Ejecucion">Ejecucion</option>
      <option value="Evaluacion">Evaluacion</option>
    </select>

<br>
      <input class="botonDeser" type="submit" value="Ingresar" name="Ingresar">
<br>
      <button type="button" class="botonDeser" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Ver Listado
</button>
</form>

<?php

$con = mysqli_connect("localhost", "root", "", "db_desercion");

include("../conexion.php");

$desercion = "SELECT desercion.apr_id, desercion.fic_numero, desercion.cad_codigo, desercion.der_fase, aprendiz.apr_nombre, aprendiz.apr_apellido from desercion INNER JOIN aprendiz on desercion.apr_id=aprendiz.apr_id";

?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div>
        <table class="tabla_desercion" >
        <thead >
            <tr >
                <th> Identificacion</th>
                <th> Nombre del Aprendiz</th>
                <th> Apellido del Aprendiz</th>
                <th> Numero de Ficha</th>
                <th> Causa de desercion</th>
                <th> Fase de la desercion</th>
            </tr>
            </thead>
            <?php $resultado = mysqli_query($con, $desercion);
            while ($row = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td> <?php echo $row["apr_id"] ?></td>
                    <td> <?php echo $row["apr_nombre"] ?></td>
                    <td> <?php echo $row["apr_apellido"] ?></td>
                    <td> <?php echo $row["fic_numero"] ?></td>
                    <td> <?php echo $row["cad_codigo"] ?></td>
                    <td> <?php echo $row["der_fase"] ?></td>
                <?php }
            mysqli_free_result($resultado); ?>
                </tr>
        </table>
    </div>
      </div>
    </div>
  </div>
</div>


  </div>
  
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