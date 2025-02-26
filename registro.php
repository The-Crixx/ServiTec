<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiTec</title>
</head>
<body>
    <div id="registro">
        <form action="registrar.php">
            <h1>Registrar una cuenta</h1>
            <label for="nombre">Nombre/s</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" required>
            <label for="nCtrl">Numero de control</label>
            <input type="text" id="nCtrl" name="nCtrl" required>
            <label for="carrera">Carrera</label>
            <select id="carrera" name="carrera" required>
                <option value="ingsis">Ingeniería en Sistemas Computacionales</option>
                <option value="ingindus">Ingeniería Industrial</option>
                <option value="ingmeca">Ingeniería Mecanica</option>
                <option value="ingelec">Ingeniería Electrónica</option>
                <option value="ingquim">Ingeniería Química</option>
                <option value="inginf">Ingeniería en Informatica</option>
            </select>
            <label for="contraseña">Ingresa tu contraseña</label>
            <input type="password" id="contraseña" name="contraseña" required>
            <input type="submit" value="Registrar">
            <a href="login.php">¿Ya tienes una cuenta?</a>
        </form>
    </div>
</body>
</html>