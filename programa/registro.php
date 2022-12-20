<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programa de Formacion</title>
    
</head>
<body>

<p>Registro del Programa</p>
    <form action="./validar_programa.php" method="post">
    <!--Codigo, descripcion y estado-->
    <p>Codigo <input type="text" placeholder="ingrese el codigo de la ficha" name="codigo"></p>
    <p>Nombre<input type="text" placeholder="ingrese el nombre de la ficha" name="nombre"></p>
    <select name="estado" id="estado_id">
        <option value="">Escoge un Estado de Formacion</option>
        <option value="activo">Activo</option>
        <option value="finalizado">Finalizado</option>
        <option value="cancelado">Cancelado</option>
    </select>
    <input type="submit" value="Ingresar" name="submit">
    </form>
</body>
</html>