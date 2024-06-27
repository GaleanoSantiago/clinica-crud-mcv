<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados por Cargo</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Estilos Propios -->
    <link rel="stylesheet" href="./../../assets/css/style.css">
    <style>
        th,td{
            text-align:center;
        }
        table{
            margin-bottom:40px !important;
            font-size:.82rem;
        }
    </style>
</head>
<body>
    <?php
        require_once("./../../controllers/EmpleadoController.php");
        $rows = contEmpleadosPorCargo();
        $empleados = EmpleadosPorCargo();
        // var_dump($empleados);
        // die();
    ?>
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
                            <a class="nav-link" aria-current="page" href="./index.php">Empleados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Empleados por Cargo</a>
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
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Cargos</th>
                        <th>Cantidad de Empleados</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if($rows) :
                        foreach($rows as $row): ?>
                        <tr>
                            <td><?= $row['tipo_empleado']?></td>
                            <td><?= $row['cantidad_registros']?></td>
                            
                            
                        </tr>
                        <?php endforeach; ?>
                        
                        <?php else : ?>
                            <tr>
                                <td colspan="2" class="text-center">No hay Registros</td>
                            </tr>
                        <?php endif; ?>
                </tbody>
            </table>

            <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Cargo</th>
                            <th>ID Empleado</th>
                            <th>ID Persona</th>
                            <th>Nombre y Apellido</th>
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
                        if($empleados) :
                        foreach($empleados as $empl): ?>
                        <tr>
                            <td><?= $empl['tipo_empleado']?></td>
                            <td><?= $empl['id_empleado']?></td>
                            <td><?= $empl['id_persona']?></td>
                            <td><?= $empl['nombre_persona']?></td>
                            <td><?= $empl['cuit_persona']?></td>
                            <td><?= $empl['dni_persona']?></td>
                            <td><?= $empl['nombre_municipio']?></td>
                            <td><?= $empl['direccion']?></td>
                            <td><?= $empl['codigo_postal']?></td>
                            <td><?= $empl['contacto']?></td>
                            
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
    </section>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>