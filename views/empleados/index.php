<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Estilos Propios -->
    <link rel="stylesheet" href="./../../assets/css/style.css">
</head>
<body>
    <?php
        require_once("./../../controllers/EmpleadoController.php");
        $rows = index();
        // var_dump($rows);
        // die();
    ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="./../dashboard/index.php">Clinica</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Empleados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./empleado_cargo.php">Empleados por Cargo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./../medicos/index.php">Medicos</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="container">
            <h1 class="text-center">Empleados</h1>
            <div class="mb-3">
                <a href="./create.php" class="btn btn-success">Agregar Nuevo Empleado</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Empleado</th>
                            <th>ID Persona</th>
                            <th>Nombre y Apellido</th>
                            <th>Tipo de Empleado</th>
                            <th>CUIT</th>
                            <th>DNI</th>
                            <th>Municipio</th>
                            <th>Dirección</th>
                            <th>Codigo Postal</th>
                            <th>Contacto</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if($rows) :
                        foreach($rows as $row): ?>
                        <tr>
                            <td><?= $row['id_empleado']?></td>
                            <td><?= $row['id_persona']?></td>
                            <td><?= $row['nombre_persona']?></td>
                            <td><?= $row['tipo_empleado']?></td>
                            <td><?= $row['cuit_persona']?></td>
                            <td><?= $row['dni_persona']?></td>
                            <td><?= $row['nombre_municipio']?></td>
                            <td><?= $row['direccion']?></td>
                            <td><?= $row['codigo_postal']?></td>
                            <td><?= $row['contacto']?></td>
                            
                        </tr>
                        <?php endforeach; ?>
                        
                        <?php else : ?>
                            <tr>
                                <td colspan="3" class="text-center">No hay Registros</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    
<!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>