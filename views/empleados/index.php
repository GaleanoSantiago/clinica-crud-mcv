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
    <link rel="stylesheet" href="../../assets/css/styleCard.css">
</head>
<body>
<header>
       <?php 
       include './../head/head.php';
       echo $head;
       ?>
    </header>

    <main>
    <div class="title-cards">
            <h2>Gestión de datos de empleados</h2>
        </div>
        <div class="container-card">
            <div class="card">
                <figure>
                    <img src="../../assets/images/empleadosAgregarLogo.jpg">
                </figure>
                <div class="contenido-card">
                    <h3>Agregar</h3>
                    <p>Accede aquí para agregar información detallada 
                    sobre un nuevo empleado.</p>
                    <a href="./create.php">Ver Más</a>
                </div>
            </div>
            <div class="card">
                <figure>
                    <img src="../../assets/images/empleadosConsultarLogo.jpg">
                </figure>
                <div class="contenido-card">
                    <h3>Consultar</h3>
                    <p>Accede aquí para consultar información detallada 
                    sobre nuestros empleados</p>
                    <a href="./../empleados/empleado_cargo.php">Ver Más</a>
                </div>
            </div>
            <div class="card">
                <figure>
                    <img src="../../assets/images/empleadosVacacionesLogo.jpg">
                </figure>
                <div class="contenido-card">
                    <h3>Vacaciones</h3>
                    <p>Accede aquí para asignar vacaciones a nuestros empleados</p>
                    <a href="">Ver Más</a>
                </div>
            </div>
        </div>
    </main>
    
<!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>