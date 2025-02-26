<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>ADMIN</h1>
    <p>Esta es la página de administrador</p>
    <a href="index.html">Cerrar sesión</a>
    <div class="container">
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
    </div>

    <script>
        $(document).ready(function() {
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
        });
    </script>
    
</body>
</html>