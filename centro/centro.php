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
<!-- /NAVBAR -->

<?php

$con=mysqli_connect("localhost", "root", "", "db_desercion");

$ciudad = mysqli_query($con,"SELECT ciu_id , ciu_nombre FROM ciudad");

?>

    
    <form class="formCen" action="./validar_registro.php" method="post">
    <h1>Registro de Centro</h1>
    <p>Codigo</p>
    <input name="cen_codigo" type="text" placeholder="codigo de centro" required><br>
    <p>Nombre</p>
    <input name="cen_descripcion" type="text" placeholder="nombre del centro" required><br>
    <p>Telefono</p>
    <input name="cen_telefono" type="text" placeholder="telefono del centro" required><br>
    <p>Direccion</p>
    <input name="cen_direccion" type="text" placeholder="direccion del centro" required><br>
    </select>

    <p>Ciudad</p><select class="formCen_select" name="ciu_id">
    <?php while($ciu = mysqli_fetch_array($ciudad)){ ?>

    <option value="<?php echo $ciu['ciu_id'] ?>"><?php echo $ciu['ciu_nombre'] ?></option>

    <?php
        }
    ?>
    </select>
    <br>
    <input type="submit" class="botonCau" name="submit" value="Inscribir"><br>
    <button type="button" class="botonLista" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Ver Listado
</button>
</form>

<?php

$con = mysqli_connect("localhost", "root", "", "db_desercion");

include("../conexion.php");

$centro = "SELECT centro.cen_codigo, centro.cen_descripcion, centro.cen_telefono, centro.cen_direccion, ciudad.ciu_nombre from centro INNER JOIN ciudad on centro.ciu_id=ciudad.ciu_id";

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
        <table>
            <tr>
                <th> Codigo</th>
                <th> Nombre</th>
                <th> Telefono</th>
                <th> Direccion</th>
                <th> Ciudad</th>
                <th> Modificar</th>
                <th>Eliminar</th>
            </tr>
            <?php $resultado = mysqli_query($con, $centro);
            while ($row = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td> <?php echo $row["cen_codigo"] ?></td>
                    <td> <?php echo $row["cen_descripcion"] ?></td>
                    <td> <?php echo $row["cen_telefono"] ?></td>
                    <td> <?php echo $row["cen_direccion"] ?></td>
                    <td> <?php echo $row["ciu_nombre"] ?></td>
                    <td><a href="modificar.php?cen_codigo=<?php echo $row['cen_codigo']?>"><button class="btn btn-outline-success" type="button" onclick="return ConfirmModf()">Modificar</button></a></td>
                    <td><a href="eliminar.php?cen_codigo=<?php echo $row['cen_codigo']?>"><button class="btn btn-outline-danger" type="button" onclick="return ConfirmDelete()">Eliminar</button></a></td>
                <?php }
            mysqli_free_result($resultado); ?>
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

  <!-- Alerta eliminar -->
<script>
  function ConfirmDelete() {
    var respuesta = confirm("¿Quiere eliminar este registro?");
    if (respuesta == true) {
      return true;
    } else {
      return false;
    }
  }
</script>
<!-- Fin alerta eliminar -->

<!-- alerta cerrar sesion -->
<script>
   function CloseSession()
  {
    var respuesta = confirm("¿Quiere cerrar la sesión?");
    if (respuesta==true){
      return true;
    }else{
      return false;
    }
  }
</script>
<!-- Fin alerta cerrar sesion -->