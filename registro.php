<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="registro">
        <form action="registrar.php">
            <h1>Registrar una cuenta</h1>
            <label for="nombre">Nombre/s</label>
            <input type="text" id="nombre" name="nombre"></input>
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos"></input>
            <label for="carrera">Carrera</label>
            <input type="text" id="carrera" name="carrera"></input>
            <label for="nCtrl">Numero de control</label>
            <input type="text" id="nCtrl" name="nCtrl">
            <label for="contraseña">Ingresa tu contraseña</label>
            <input type="password" id="contraseña" name="contraseña">
            <input type="submit" value="Registrar">
            <a href="login.php">¿Ya tienes una cuenta?</a>
        </form>
    </div>
</body>
</html>