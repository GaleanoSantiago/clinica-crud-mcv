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
    <!-- Exportar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    
    <!-- Estilos Propios -->
    <link rel="stylesheet" href="./../../assets/css/style.css">
</head>
<body>
    <?php
        require_once("./../../controllers/EmpleadoController.php");
        $rows = index();
        
        // var_dump($foraneos);
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
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="./empleado_cargo.php">Empleados por Cargo</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="./../medicos/index.php">Medicos</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="./../medicos/medico_especialidad.php">Medicos por Especialidad</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="container" >
            <h1 class="text-center">Empleados</h1>
            
            <div class="mb-3 d-flex justify-content-around">
                    
                    <a href="./create.php" class="btn btn-success">Agregar Nuevo Empleado</a>
                
                <div class="d-flex gap-4">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Filtrar Datos
                    </button>
                    <button id="exportPDF" class="btn btn-outline-warning">Exportar a PDF</button>
                    <button id="exportExcel" class="btn btn-outline-success">Exportar a Excel</button>
                </div>
            </div>
            <?php if(isset($_GET["msg"])=="elimSuccs"): ?>
                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                    <strong>Empleado</strong> eliminado con exito de la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" id="myTable">
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
                            <th>Fecha Alta Vacaciones</th>
                            <th>Fecha Baja Vacaciones</th>
                            <th>Funciones</th>
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
                            <td><?= $row['fecha_inicio']?></td>
                            <td><?= $row['fecha_fin']?></td>
                            <td>
                                <form action="./functions.php" method="POST">
                                    <input type="hidden" name="deleteEmpleado">
                                    <input type="hidden" name="id_empleado" value="<?= $row['id_empleado']?>">
                                    <input type="submit" class="btn btn-outline-danger btn-delete" value="Borrar">
                                </form>
                            </td>
                            
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
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Filtro de licencia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- <form action="empleado_cargo.php" method="POST" autocomplete="off" id="filtro"> -->
                <div class="modal-body">
                    <div class="mb-3 d-flex align-items-end gap-4">
                        <label for="fecha_inicio" class="form-label">Fecha Inicio de Vacaciones:</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                    </div>
                    <div class="mb-3 d-flex align-items-end gap-4">
                        <label for="fecha_final" class="form-label">Fecha Fin de Vacaciones:</label>
                        <input type="date" name="fecha_final" id="fecha_final" class="form-control">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-around border">
                    <button class="btn btn-outline-danger" id="clearFiltro" data-bs-dismiss="modal">Limpiar Filtro</button>
                    <!-- <input type="submit" value="Aplicar Filtro" class="btn btn-outline-success"> -->
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal" id="filterBtn">Aplicar Filtro</button>

                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
                <!-- </form> -->
                
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- JS Propios -->
    <script src="./../../assets/js/forms.js"></script>
    
</body>
</html>