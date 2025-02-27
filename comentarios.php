<?php
    session_start();
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>Comentarios</h1>
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
                            <a class="dropdown-item" href="departamento.php?id=1">Centro de Computo</a>
                            <a class="dropdown-item" href="departamento.php?id=2">Alfabetización de Adultos Mayores</a>
                            <a class="dropdown-item" href="departamento.php?id=3">Huertos Urbanos</a>
                            <a class="dropdown-item" href="departamento.php?id=4">Brigadista</a>
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
        <h2>Comentarios</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Número de control</th>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Id de departamento</th>
                    <th>Comentario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="commentTableBody">
                <!-- Los datos se cargarán aquí -->
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            // Cargar comentarios
            $.ajax({
                url: 'get_comments.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.error) {
                        alert('Error: ' + data.error);
                    } else {
                        var tableBody = $('#commentTableBody');
                        tableBody.empty();
                        data.forEach(function(comment) {
                            var row = '<tr>' +
                                '<td>' + comment.nctrl + '</td>' +
                                '<td>' + comment.nombre + '</td>' +
                                '<td>' + comment.departamento + '</td>' +
                                '<td>' + comment.id_dep + '</td>' +
                                '<td>' + comment.comentario + '</td>' +
                                '<td>' +
                                    '<button class="btn btn-danger btn-delete" data-nctrl="' + comment.nctrl + '" data-nombre="' + comment.nombre + '" data-departamento="' + comment.departamento + '" data-id_dep="' + comment.id_dep + '" data-comentario="' + comment.comentario + '">Eliminar</button>' +
                                '</td>' +
                                '</tr>';
                            tableBody.append(row);
                        });

                        // Añadir eventos de clic a los botones de eliminar
                        $('.btn-delete').click(function() {
                            var nctrl = $(this).data('nctrl');
                            var nombre = $(this).data('nombre');
                            var departamento = $(this).data('departamento');
                            var id_dep = $(this).data('id_dep');
                            var comentario = $(this).data('comentario');
                            if (confirm('¿Estás seguro de que deseas eliminar este comentario?')) {
                                $.ajax({
                                    url: 'delete_comment.php',
                                    method: 'POST',
                                    data: { nctrl: nctrl, nombre: nombre, departamento: departamento, id_dep: id_dep, comentario: comentario },
                                    dataType: 'json',
                                    success: function(response) {
                                        if (response.success) {
                                            alert('Comentario eliminado correctamente');
                                            location.reload();
                                        } else {
                                            alert('Error al eliminar el comentario: ' + response.error);
                                        }
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        alert('Error al eliminar el comentario: ' + textStatus);
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
        });
    </script>
</body>
</html>