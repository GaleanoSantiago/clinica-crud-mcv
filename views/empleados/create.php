<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Empleado</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Estilos Propios -->
    <link rel="stylesheet" href="./../../assets/css/style.css">
</head>
<body>
    <?php
        require_once("./../../controllers/EmpleadoController.php");
        $municipios = indexMunicipios();
        $tipo_empleados = indexTipoEmpleados();

        // var_dump($tipo_empleados);
        // die();
    ?>
    <section>
        <div class="container d-flex flex-column align-items-center">
            <h1 class="text-center">Guardar Empleado</h1>
            <form action="./functions.php" method="POST" autocomplete="off">
                <!-- input controlado -->
                <input type="hidden" name="insert">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre y Apellido</label>
                    <input type="text" name="nombre" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="cuit" class="form-label">Cuit</label>
                    <input type="number" name="cuit" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="number" name="dni" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Municipio</label>
                    
                    <select name="municipio" id="" class="form-select">
                        <?php foreach($municipios as $mun) :?>
                            <option value="<?= $mun["id_municipio"]?>"><?= $mun["nombre_municipio"]?></option>
                        <?php endforeach;?>
                    
                    </select>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text" name="direccion" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Codigo Postal</label>
                    <input type="number" name="cod_postal" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Correo Electronico</label>
                    <input type="email" name="email" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="tipo_empleado" class="form-label">Tipo de Empleado</label>
                    <select name="tipo_empleado" id="" class="form-select">
                        <?php foreach($tipo_empleados as $tipo) :?>
                            <option value="<?= $tipo["id_tipo_empleado"]?>"><?= $tipo["tipo_empleado"]?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="mb-3 d-flex justify-content-around">
                    <input type="submit" value="Guardar" class="btn btn-success">
                    <input type="reset" value="Reset" class="btn btn-danger">
                    <a href="./index.php" class="btn btn-primary">Volver a la Lista</a>
                </div>
            </form>
        </div>
        
    </section>
    
    
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
    
</html>