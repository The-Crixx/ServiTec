<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ServiTec</title>
  <!-- Incluir jQuery desde CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Incluir CSS de Bootstrap para el modal -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Incluir JS de Bootstrap para el modal -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container-flex">

    <?php
    include("conexion.php");

    if (isset($_POST["nctrl"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["carrera"]) && isset($_POST["cred"]) && isset($_POST["contraseña"]) && isset($_POST["rcontraseña"])) {
        $nctrl = $_POST["nctrl"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $carrera = $_POST["carrera"];
        $cred = $_POST["cred"];
        $contraseña = $_POST["contraseña"];
        $rcontraseña = $_POST["rcontraseña"];

        if ($contraseña == $rcontraseña) {
            try {
                $query = "INSERT INTO usuarios (nctrl, nombre, apellidos, carrera, cred, contraseña) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->execute([$nctrl, $nombre, $apellidos, $carrera, $cred, $contraseña]);

                ?><script>
                    $(document).ready(function(){
                        $("#successModal").modal('show');
                    });
                  </script>

                  <!-- Modal de éxito -->
                  <div class="modal" id="successModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Registro Exitoso</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          Se ha registrado con éxito.
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" onclick="window.location.href='login.html'">Aceptar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
            } catch (PDOException $e) {
                ?><script>
                    $(document).ready(function(){
                        $("#errorModal").modal('show');
                    });
                  </script>
                  <!-- Modal de error -->
                  <div class="modal" id="errorModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Error</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          ¡UPS! Algo salió mal, no se pudo registrar.
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" onclick="window.location.href='registro.html'">Aceptar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
            }
        } else {
            ?><script>
                $(document).ready(function(){
                    $("#passwordErrorModal").modal('show');
                });
              </script>
              <!-- Modal de error de contraseña -->
              <div class="modal" id="passwordErrorModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Error</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      Favor de verificar los datos, las contraseñas no coinciden.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" onclick="window.location.href='registro.html'">Aceptar</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php
        }
    } else {
        ?><script>
            alert("Todos los campos son obligatorios.");
            window.location.href = "registro.html";
          </script>
        <?php
    }
    $conn = null;
    ?>
  </div>
</body>

</html>