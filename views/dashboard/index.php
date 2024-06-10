<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . BASE_URL . '/login/index');
    exit;
}

// Obtener los datos del usuario de la sesión
$user_id = $_SESSION['user_id'];
// Aquí deberías tener una lógica para obtener los datos del usuario de la base de datos utilizando su ID

// Ahora puedes mostrar los datos del usuario en la tabla
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Dashboard</h2>
        <div class="table-responsive mt-4">
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Persona ID</th>
                        <th>Rol ID</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $user_id; ?></td>
                        <td><?php echo $user['user_name']; ?></td>
                        <td><?php echo $user['id_persona']; ?></td>
                        <td><?php echo $user['id_rol_usuario']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="<?php echo BASE_URL; ?>/login/logout" class="btn btn-danger">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
