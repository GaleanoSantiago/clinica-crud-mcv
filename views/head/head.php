<?php 
session_start();

if(!isset($_SESSION['user'])){
    header("Location:./../../index.php");
}


if(isset($_REQUEST['cerrar_session'])){
    session_unset();
    session_destroy();
    header("Location:./../../index.php");
}

$head=" <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
            <div class='container-fluid'>
                <a class='navbar-brand' href='../dashboard/'>
                    <img src='../../assets/images/hospital_logo.png' alt='logo' width='150px'>
                </a>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav'
                    aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarNav'>
                    <ul class='navbar-nav'>
                        <li class='nav-item'>
                            <a class='nav-link' aria-current='page' href='./../empleados/index.php'>Empleados</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./../medicos/index.php'>Medicos</a>
                        </li>
                         <li class='nav-item'>
                            <a class='nav-link' href='./../head/head.php?cerrar_session=true'>Cerrar Session</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>";

?>