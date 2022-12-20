<?php

session_start();

if(($_SESSION["usuario_clave"])!=''){
}else{
  header("location:login.php");
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/jpg" href="../favicon/sena.png">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Causa de Deserción</title>
</head>
<body>
<!--NAVBAR-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#5eb319">
    <div class="container-fluid">
      <img src="../imagenes/logo_blanco.png" width="60px" alt="60px">
      <a class="navbar-brand" href="../aprendiz_pagina/aprendiz.php">Inicio</a>
      <a class="navbar-brand" href="../causa_desercion/causa_desercion.php">Deserción</a>
      <a class="navbar-brand" href="../datos_personales/datos.php">Datos Personales</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="CN_aprendiz">
      <img class="icono" src="../favicon/icons8-círculo-sin-signo-de-verificación-48.png" alt="#">
      <?php echo utf8_decode($row['usuario_nombre']) . " " . utf8_decode($row['usuario_apellido']); ?>
      </div>
      <div class="salir">
      <a style="text-decoration:none" class="salir" href="cerrar.php" onclick="return CloseSession()">Cerrar Sesión</a>
      </div>
      
      
      <!-- Fin boton cerrar sesion -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
      </div>
    </div>

  </nav>
<!--/NAVBAR-->
<?php

$con=mysqli_connect("localhost", "root", "", "db_desercion");

$causa=mysqli_query($con,"SELECT cad_codigo, cad_descripcion FROM causa_desercion");

$ficha = mysqli_query($con, "SELECT fic_numero FROM ficha");

?>


  <form action="registrar_retiro.php" method="POST">

    <h1 class="Deser1">Inicio de Desercion</h1>
    <p class="Deser1">Identificacion del Aprendiz</p>
    <input class="deserApren" type="text" name="apr_id">
    <p class="Deser1">Numero de Ficha</p>
    <select class="deserApren_select" name="fic_numero"  required>
        <?php while ($A = mysqli_fetch_array($ficha)) { ?>
          <option value="<?php echo $A['fic_numero'] ?>"><?php echo $A['fic_numero'] ?></option>

        <?php
        }
        ?>
      </select>
  </select>

  <p class="Deser1">Causa de la Deserción </p>
  <select class="deserApren_select" name="cad_codigo">
  <?php while($deser = mysqli_fetch_array($causa)){ ?>

  <option value="<?php echo $deser['cad_codigo'] ?>"><?php echo $deser['cad_descripcion'] ?></option>

  <?php
  }
  ?>
  </select>

  <p class="Deser1">Identificacion Usuario</p>
  <input class="deserApren" type="text" name="usuario_id">
  <p class="Deser1">Fase de la Desercion</p>
  <select class="deserApren_select" name="der_fase" required>
    <option value=""></option>
      <option value="Lectiva">Lectiva</option>
      <option value="Practica">Practica</option>
    </select>
    <br>
    <br>
      <input class="deserApren" type="submit" value="Ingresar" name="Ingresar">
  </form>
</body>
</html>

<!-- Alerta cerrar sesion -->
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