<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicos</title>
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
        require_once("./../../controllers/MedicoController.php");
        $rows = indexMedicos();
        $especialidades = contMedicosPorEspecialidad2();
        $situacion_revista = indexSituacionRevista();
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
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link" href="./../empleados/index.php">Empleados</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link " href="./../empleados/empleado_cargo.php">Empleados por Cargo</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Medicos</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="./medico_especialidad.php">Medicos por Especialidad</a>
                        </li> -->
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="container">
            <h1 class="text-center">Médicos</h1>
            
            <div class="mb-3">
            </div>
            <div class="mb-3 d-flex justify-content-around">
                <a href="./create.php" class="btn btn-success">Agregar Nuevo Medico</a>

                <!-- Button trigger modal -->
                
                <div class="d-flex gap-4">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Filtrar Datos
                    </button>
                    <button id="exportPDF" class="btn btn-outline-warning">Exportar a PDF</button>
                    <button id="exportExcel" class="btn btn-outline-success">Exportar a Excel</button>
                </div>
            </div>
            <?php if(isset($_GET["msg"])=="elimSuccs"): ?>
                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                    <strong>Medico</strong> eliminado con exito de la base de datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Medico</th>
                            <th>ID Empleado</th>
                            <th>Nombre y Apellido</th>
                            <th>Especialidad</th>
                            <th>Situación Revista</th>
                            <th>Número de Colegiado</th>
                            <th>CUIT</th>
                            <th>DNI</th>
                            <th>Municipio</th>
                            <th>Dirección</th>
                            <th>Código Postal</th>
                            <th>Contacto</th>
                            <th>Funciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if($rows) :
                        foreach($rows as $row): ?>
                        <tr>
                            <td><?= $row['id_medico']?></td>
                            <td><?= $row['id_empleado']?></td>
                            <td><?= $row['nombre_persona']?></td>
                            <td><?= $row['especialidad']?></td>
                            <td><?= $row['situacion_revista']?></td>
                            <td><?= $row['numero_colegiado']?></td>
                            <td><?= $row['cuit_persona']?></td>
                            <td><?= $row['dni_persona']?></td>
                            <td><?= $row['nombre_municipio']?></td>
                            <td><?= $row['direccion']?></td>
                            <td><?= $row['codigo_postal']?></td>
                            <td><?= $row['contacto']?></td>
                            <td>
                                <form action="./functions.php" method="POST">
                                    <input type="hidden" name="deleteMedico">
                                    <input type="hidden" name="id_medico" value="<?= $row['id_medico']?>">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Filtros</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 d-flex align-items-end gap-4">
                    <label for="especialidad" class="form-label">Especialidad:</label>
                    <select name="especialidad" id="filterEspecialidad" class="form-select">
                        <!-- Esta option es para no utilizar este parametro para el filtro -->
                        <option value="0">NO APLICAR FILTRO</option>
                    <?php foreach($especialidades as $esp) :?>
                        <option value="<?= $esp["id_especialidad"]?>"><?= $esp["tipo_especialidad"]?> (<?= $esp['cantidad_registros']?>)</option>
                    <?php endforeach;?>
                    </select>
                </div>
                <div class="mb-3 d-flex align-items-end gap-4">
                    <label for="especialidad" class="form-label">Situacion Revista:</label>
                    <select name="situacion_revista" id="filterSituRevista" class="form-select">
                        <!-- Esta option es para no utilizar este parametro para el filtro -->
                        <option value="0">NO APLICAR FILTRO</option>
                    <?php foreach($situacion_revista as $situ) :?>
                        <option value="<?= $situ["id_situacion_revista"]?>"><?= $situ["situacion_revista"]?> (<?= $situ['cantidad_registros']?>)</option>
                    <?php endforeach;?>
                    </select>
                </div>
                </div>
            <div class="modal-footer d-flex justify-content-around">
                
                <!-- Boton para quitar todos los filtros (mostrar todas las filas) -->
                <button class="btn btn-outline-danger" id="clearFiltro" data-bs-dismiss="modal">Limpiar Filtro</button>
                <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal" id="filterBtn">Aplicar Filtro</button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
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