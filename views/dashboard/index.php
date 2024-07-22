<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
            <h2>Gestión de datos</h2>
        </div>
        <div class="container-card">
            <div class="card">
                <figure>
                    <img src="../../assets/images/medicosLogo.jpg">
                </figure>
                <div class="contenido-card">
                    <h3>Medicos</h3>
                    <p>Accede aquí para administrar, actualizar y consultar información detallada 
                    sobre nuestros médicos.</p>
                    <a href="./../medicos/index.php">Ver Más</a>
                </div>
            </div>
            <div class="card">
                <figure>
                    <img src="../../assets/images/empleadosLogo.jpg">
                </figure>
                <div class="contenido-card">
                    <h3>Empleados</h3>
                    <p>Accede aquí para administrar, actualizar y consultar información detallada 
                    sobre nuestros empleados</p>
                    <a href="./../empleados/index.php">Ver Más</a>
                </div>
            </div>
            <div class="card">
                <figure>
                    <img src="../../assets/images/pacientesLogo.jpg">
                </figure>
                <div class="contenido-card">
                    <h3>Pacientes</h3>
                    <p>Accede aquí para administrar, actualizar y consultar información detallada 
                    sobre nuestros pacientes</p>
                    <a href="./../medicos/index.php">Ver Más</a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </footer>
</body>
</html>
