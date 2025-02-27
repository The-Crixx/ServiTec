<?php
    session_start();
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>ADMIN</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="principal.php">ServiTec</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Departamentos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="centro_computo.php">Centro de Computo</a>
                            <a class="dropdown-item" href="alfabetizacion.php">Alfabetización de Adultos Mayores</a>
                            <a class="dropdown-item" href="huertos_urbanos.php">Huertos Urbanos</a>
                            <a class="dropdown-item" href="brigadista.php">Brigadista</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="guia_documentos.php">Guía para Documentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="interes.php">Interés</a>
                    </li>
                    <?php if ($_SESSION['nctrl'] == '21011015'): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrador
                        </a>
                        <div class="dropdown-menu" aria-labelledby="adminDropdown">
                            <a class="dropdown-item" href="admin.php">Usuario</a>
                            <a class="dropdown-item" href="comentarios.php">Comentarios</a>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Usuarios</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Número de control</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Carrera</th>
                    <th>Créditos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <!-- Los datos se cargarán aquí -->
            </tbody>
        </table>
        <button class="btn btn-success" data-toggle="modal" data-target="#addUserModal">Agregar Usuario</button>
    </div>

    <!-- Modal para agregar usuario -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="form-group">
                            <label for="nctrl">Número de control</label>
                            <input type="text" class="form-control" id="nctrl" name="nctrl" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                        </div>
                        <div class="form-group">
                            <label for="carrera">Carrera</label>
                            <select class="form-control" id="carrera" name="carrera" required>
                                <option value="">Selecciona una carrera</option>
                                <option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales</option>
                                <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                                <option value="Ingeniería Electrónica">Ingeniería Electrónica</option>
                                <option value="Ingeniería Mecánica">Ingeniería Mecánica</option>
                                <!-- Agrega más opciones según sea necesario -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cred">Créditos</label>
                            <input type="number" class="form-control" id="cred" name="cred" required>
                        </div>
                        <div class="form-group">
                            <label for="contraseña">Contraseña</label>
                            <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de error -->
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="errorModalBody">
                    <!-- Mensaje de error se mostrará aquí -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Cargar usuarios
            $.ajax({
                url: 'get_users.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.error) {
                        alert('Error: ' + data.error);
                    } else {
                        var tableBody = $('#userTableBody');
                        tableBody.empty();
                        data.forEach(function(user) {
                            var row = '<tr>' +
                                '<td>' + user.nctrl + '</td>' +
                                '<td>' + user.nombre + '</td>' +
                                '<td>' + user.apellidos + '</td>' +
                                '<td>' + user.carrera + '</td>' +
                                '<td>' + user.cred + '</td>' +
                                '<td>' +
                                    '<button class="btn btn-primary btn-edit" data-id="' + user.nctrl + '">Modificar</button> ' +
                                    '<button class="btn btn-danger btn-delete" data-id="' + user.nctrl + '">Eliminar</button>' +
                                '</td>' +
                                '</tr>';
                            tableBody.append(row);
                        });

                        // Añadir eventos de clic a los botones de modificar y eliminar
                        $('.btn-edit').click(function() {
                            var nctrl = $(this).data('id');
                            // Lógica para modificar el usuario
                            window.location.href = 'edit_user.php?nctrl=' + nctrl;
                        });

                        $('.btn-delete').click(function() {
                            var nctrl = $(this).data('id');
                            if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
                                $.ajax({
                                    url: 'delete_user.php',
                                    method: 'POST',
                                    data: { nctrl: nctrl },
                                    dataType: 'json',
                                    success: function(response) {
                                        if (response.success) {
                                            alert('Usuario eliminado correctamente');
                                            location.reload();
                                        } else {
                                            alert('Error al eliminar el usuario: ' + response.error);
                                        }
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        alert('Error al eliminar el usuario: ' + textStatus);
                                    }
                                });
                            }
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error al obtener los datos: ' + textStatus);
                }
            });

            // Agregar usuario
            $('#addUserForm').submit(function(event) {
                event.preventDefault();

                // Validaciones adicionales
                var nctrl = $('#nctrl').val();
                var cred = $('#cred').val();

                if (nctrl.length !== 8) {
                    $('#errorModalBody').text('El número de control debe ser de 8 dígitos.');
                    $('#errorModal').modal('show');
                    return;
                }

                if (cred < 168 || cred > 260) {
                    $('#errorModalBody').text('Los créditos deben estar entre 168 y 260.');
                    $('#errorModal').modal('show');
                    return;
                }

                $.ajax({
                    url: 'add_user.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            alert('Usuario agregado correctamente');
                            location.reload();
                        } else {
                            alert('Error al agregar el usuario: ' + response.error);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error al agregar el usuario: ' + textStatus);
                    }
                });
            });
        });
    </script>
    
</body>
</html>