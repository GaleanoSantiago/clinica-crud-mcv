<?php
require_once("./../../controllers/MedicoController.php");
require_once("./../empleados/functions.php");

if(isset($_REQUEST['insertMedico'])){
    insertarMedicoFront();

}elseif(isset($_REQUEST['deleteMedico'])){
    // borrarMedico();
    $response = borrarEmpleado();
    if($response != false){
        header("Location:index.php?msg=elimSuccs");

    }
}elseif(isset($_REQUEST["editMedico"])){
    // echo "editar empleado";
    // die();
    $response = editarMedico();
    if($response != false){
        header("Location:show.php?id=$response&msg=actSuccs");

    }
}elseif(isset($_REQUEST["editMedico"])){
    // echo "editar empleado";
    // die();
    $response = editarMedico();
    if($response != false){
        header("Location:show.php?id=$response&msg=actSuccs");

    }
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

// Para editar medico
function editarMedico(){
    $id_empleado = limpiarcadena(editarEmpleado());
    $id_medico = limpiarcadena($_REQUEST["id_medico"]);
    $numero_colegiado = limpiarcadena($_REQUEST["num_colegiado"]);
    $id_especialidad = limpiarcadena($_REQUEST["especialidad"]);
    $id_situacion_revista = limpiarcadena($_REQUEST["situacion_revista"]);
    $id = updateMedico($id_medico, $id_empleado, $numero_colegiado, $id_especialidad, $id_situacion_revista);
    
    if($id != false){
        // header("Location:show.php?id=$updatedEmpleado&msg=actSucc");
        return $id;
    }else{
        echo false;
    }

}