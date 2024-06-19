<?php
require_once("./../../controllers/MedicoController.php");
require_once("./../empleados/functions.php");

if(isset($_REQUEST['insertMedico'])){
    insertarMedicoFront();

}

function insertarMedicoFront(){
    $id_empleado = limpiarcadena(insertarEmpleado());
    // echo $id_empleado;
    // die();
    $num_colegiado = limpiarcadena($_REQUEST["num_colegiado"]);
    $id_especialidad = limpiarcadena($_REQUEST["especialidad"]);
    $id_situacion_revista = limpiarcadena($_REQUEST["situacion_revista"]);

    $id_medico = guardarMedico($id_empleado, $num_colegiado, $id_especialidad, $id_situacion_revista);
}
