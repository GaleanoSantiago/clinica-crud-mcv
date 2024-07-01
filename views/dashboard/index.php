<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Clinica</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./../empleados/index.php">Empleados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./../medicos/index.php">Medicos</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <h2 class="mt-5">Dashboard</h2>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="./../medicos/index.php">Informe de Medicos</a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="./../empleados/index.php">Informe de Empleados</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <a href="./../empleados/empleado_cargo.php">Informe de Cargo de los Empleados</a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <a href="./../medicos/medico_especialidad.php">Informe de Especialidades de los Medicos</a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <a href="#">Informe de Consultas de los Pacientes</a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="#">Informe de Disponibilidad de Medicos</a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="#">Informe de Periodos de Vacaciones</a>
            </div>
        </div>
        </div>
        <a href="<?php echo BASE_URL; ?>/login/logout" class="btn btn-danger">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
