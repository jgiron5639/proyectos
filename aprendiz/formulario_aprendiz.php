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
</body>

</html>

<?php
include("../conexion.php");
?>
<?php

if (($_SESSION["usuario_clave"]) != '') {
}
?>

<?php
include("../conexion.php");

$ciudad = mysqli_query($con, "SELECT ciu_id, ciu_nombre FROM ciudad");
$san = mysqli_query($con, "SELECT rh_id, rh_descripcion FROM rh");
$id = mysqli_query($con, "SELECT tii_id, tii_descripcion FROM tipo_id");
?>
<div class="formularioAprendiz">
<form  action="registrar_aprendiz.php" method="POST" autocomplete="off">
  <h1 class="A1">Registro de aprendices</h1>
  <p class="pAprendiz">Cedula</p>
  <input class="inputAprendiz" placeholder="Identificación" type="number" required  name="apr_id">
  <p class="pAprendiz">Nombres</p>
  <input class="inputAprendiz" placeholder="Nombre" required type="text" name="apr_nombre">
  <p class="pAprendiz">Apellidos</p>
  <input class="inputAprendiz" placeholder="Apelidos" required type="text" name="apr_apellido">
  <p class="pAprendiz">Telefono</p>
  <input class="inputAprendiz" placeholder="Teléfono" required type="text" name="apr_telefono">
  <p class="pAprendiz">Ciudad</p>
  <select class="inputAprendiz_select" name="ciu_id">
    <?php while ($datos = mysqli_fetch_array($ciudad)) { ?>

      <option value="<?php echo $datos['ciu_id'] ?>"><?php echo $datos['ciu_nombre'] ?></option>

    <?php
    }
    ?>
  </select>
    <p class="pAprendiz">Tipo de Documento</p>
    <select class="inputAprendiz_select" name="tii_id">
    <?php while ($tipo = mysqli_fetch_array($id)) { ?>

      <option value="<?php echo $tipo['tii_id'] ?>"><?php echo $tipo['tii_descripcion'] ?></option>

    <?php
    }
    ?>
  </select >
    <p class="pAprendiz">Tipo de Sangre</p>
    <select class="inputAprendiz_select" name="rh_id">
    <?php while ($gre = mysqli_fetch_array($san)) { ?>

      <option value="<?php echo $gre['rh_id'] ?>"><?php echo $gre['rh_descripcion'] ?></option>

    <?php
    }
    ?>
  </select>
  <p class="pAprendiz">Genero</p>
  <select  class="inputAprendiz_select" name="apr_genero" required>
      <option value=" "></option>
      <option value="Masculino">Masculino</option>
      <option value="Femenino">Femenino</option>

    </select>
  <p class="pAprendiz">Edad</p>
  <input class="inputAprendiz" placeholder="Edad" type="number" required  name="apr_edad">
  <input class="botonFormA" type="submit" name="enviar">

</form>
</div>

<?php

include("../conexion.php");
$aprendiz = "SELECT aprendiz.apr_id, aprendiz.apr_nombre, aprendiz.apr_apellido,aprendiz.apr_telefono,ciudad.ciu_nombre, tipo_id.tii_descripcion,rh.rh_descripcion,aprendiz.apr_genero,aprendiz.apr_edad from aprendiz INNER JOIN ciudad on aprendiz.ciu_id = ciudad.ciu_id INNER JOIN rh on aprendiz.rh_id = rh.rh_id INNER JOIN tipo_id ON aprendiz.tii_id=tipo_id.tii_id";
?>
<h3 class="tituloAprendiz">Listado Aprendices</h3>

  <table class="listaAprendiz">
  <thead class="FormAprendizC">
    <tr class="BodyA">
      <th class="TablaListaA">Identificación del Aprendiz</th>
      <th class="TablaListaA">Nombre</th>
      <th class="TablaListaA">Apellidos</th>
      <th class="TablaListaA">Telefono</th>
      <th class="TablaListaA">Nombre de la Ciudad</th>
      <th class="TablaListaA">Tipo de Doc.</th>
      <th class="TablaListaA">Tipo de Sangre</th>
      <th class="TablaListaA">Genero</th>
      <th class="TablaListaA">Edad</th>
    </tr>
    </thead>
    <?php $resultado = mysqli_query($con, $aprendiz);
    while ($row = mysqli_fetch_assoc($resultado)) { ?>
      <tr class="BodyA">
        <td class="TablaListaA"> <?php echo $row["apr_id"]; ?></td>
        <td class="TablaListaA"> <?php echo $row["apr_nombre"]; ?></td>
        <td class="TablaListaA"> <?php echo $row["apr_apellido"]; ?></td>
        <td class="TablaListaA"> <?php echo $row["apr_telefono"]; ?></td>
        <td class="TablaListaA"> <?php echo $row["ciu_nombre"]; ?></td>
        <td class="TablaListaA"> <?php echo $row["tii_descripcion"]; ?></td>
        <td class="TablaListaA"> <?php echo $row["rh_descripcion"]; ?></td>
        <td class="TablaListaA"> <?php echo $row["apr_genero"]; ?></td>
        <td class="TablaListaA"> <?php echo $row["apr_edad"]; ?></td>

      <?php }
    mysqli_free_result($resultado); ?></td>
      </tr>
  </table>


</body>

</html>

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