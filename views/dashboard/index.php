<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Estilos Propios -->
    <link rel="stylesheet" href="./../../assets/css/style.css">
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
        <h2 class="mt-5 text-center">Inicio</h2>
        <div class="diseno-section-cards">
            <a href="./../medicos/index.php">
            <div class="card" >
				<!-- <span class="text-success card-span"><i class="fa fa-check"></i> SELECCIONADO</span> -->
				<div class="card-body">

                    <div class="card-logo">
                        <img src="./../../assets/img/medicos.svg" class="card-svg">
                    </div>
                    <h3 class="card-title">Médicos</h3>
                    <!-- <p class="card-text">Subir el diseño que desea que tenga el vaso, acepta formato de jpg, png, svg y pdf.</p> -->
                    <!-- <button class="btn btn-outline-success btn-card">Seleccionar Opcion de Diseño</button> -->
                    
			    </div>
		    </div>
            </a>
            <a href="./../empleados/index.php">
            <div class="card" >
				<div class="card-body">

                    <div class="card-logo">
                        <img src="./../../assets/img/empleados.svg" class="card-svg">
                    </div>
                    <h3 class="card-title">Empleados</h3>
                    <!-- <p class="card-text">Subir el diseño que desea que tenga el vaso, acepta formato de jpg, png, svg y pdf.</p> -->
                    <!-- <button class="btn btn-outline-success btn-card">Seleccionar Opcion de Diseño</button> -->
                    
			    </div>
		    </div>
            </a>
            <a href="./../empleados/index.php">
            <div class="card" >
				<div class="card-body">

                    <div class="card-logo">
                        <img src="./../../assets/img/pacientes.svg" class="card-svg">
                    </div>
                    <h3 class="card-title">Pacientes</h3>
			    </div>
		    </div>
            </a>
        </div>
        
        <a href="<?php echo BASE_URL; ?>/login/logout" class="btn btn-danger">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
