<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servitec</title>
</head>
<body>
    <div id="login">
    <h1>Inicio de sesión</h1>
    <form action="login.php"></form>
    <label for="nctrl">Ingresa tu numero de control:</label>
    <input type="text" id="nctrl" name="nctrl" placeholder="Numero de control" validate=true>
    <label for="contraseña">Ingresa tu contraseña</label>
    <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña">
    <input type="submit" value="Iniciar sesión">
    <a href="registro.php">¿Aun no tienes cuenta?</a>
    </div>
</body>
</html>