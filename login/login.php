<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" type="image/jpg" href="../favicon/sena.png">
    <title>Inicio de Sesion</title>
</head>

<body class="cuerpo">
        <div class="formulario">
            <form action="validar_login.php" method="POST">
                <h1 class="titulo">Iniciar Sesión</h1>
                <img class="imglogin" src="../imagenes./logo.png" width="150" height="150">
                <p><input class="inputLogin" type="text" placeholder="Número de identificación" name="usuario_id"></p>
                <p><input class="inputLogin"type="password" placeholder="Contraseña" name="usuario_clave"></p>
                <button type="submit" class="boton" name="enviar">Ingresar</button>
            </form>
        </div>
    </div>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--/Bootstrap-->
</body>

</html>