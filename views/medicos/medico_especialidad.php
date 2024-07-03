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
        require_once("./../../controllers/MedicoController.php");
        $rows = contMedicosPorEspecialidad();
        $medicos = MedicosPorEspecialidad();
        // var_dump($empleados);
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
                            <a class="nav-link" aria-current="page" href="./../empleados/index.php">Empleados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./../empleados/empleado_cargo.php">Empleados por Cargo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php">Medicos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Medicos por Especialidad</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="container">
            <h1 class="text-center">Especialidades</h1>
            <table class="table table-striped table-hover table-bordered" >
                <thead class="table-dark">
                    <tr>
                        <th>Especialidades</th>
                        <th>Cantidad de Medicos</th>
                        
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php 
                        if($rows) :
                        foreach($rows as $row): ?>
                        <tr>
                            <td class="btn-filtro"><button class="btn btn-dark"><?= $row['tipo_especialidad']?></button></td>
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

            <h2 class="text-center">Medicos de la Especialidad <span id="spanEspecialidad"></span></h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead class="table-dark">
                        <tr>
                            <th>Especialidad</th>
                            <th>ID Medico</th>
                            <th>ID Empleado</th>
                            <th>Nombre y Apellido</th>
                            <th>Situación Revista</th>
                            <th>Número de Colegiado</th>
                            <th>CUIT</th>
                            <th>DNI</th>
                            <th>Municipio</th>
                            <th>Dirección</th>
                            <th>Código Postal</th>
                            <th>Contacto</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if($medicos) :
                        foreach($medicos as $med): ?>
                        <tr>
                            <td><?= $med['especialidad']?></td>
                            <td><?= $med['id_medico']?></td>
                            <td><?= $med['id_empleado']?></td>
                            <td><?= $med['nombre_persona']?></td>
                            <td><?= $med['situacion_revista']?></td>
                            <td><?= $med['numero_colegiado']?></td>
                            <td><?= $med['cuit_persona']?></td>
                            <td><?= $med['dni_persona']?></td>
                            <td><?= $med['nombre_municipio']?></td>
                            <td><?= $med['direccion']?></td>
                            <td><?= $med['codigo_postal']?></td>
                            <td><?= $med['contacto']?></td>
                            
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
    <!-- JS Propios -->
    <script src="./../../assets/js/forms.js"></script>
</body>
</html>