<?php

require_once "./../../models/Medicos.php";

// function lastId() {
//     return lastIdModel();
// }

function indexMedicos() {
    $result = indexMedicosModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

// index de Especialidad
function indexEspecialidad() {
    $result = indexEspecialidadModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

// index de Situacion Revista
function indexSituacionRevista() {
    $result = indexSituacionRevistaModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}
// Guardar Medico
function guardarMedico($id_empleado, $num_colegiado, $id_especialidad, $id_situacion_revista) {
    $id = insertarMedico($id_empleado, $num_colegiado, $id_especialidad, $id_situacion_revista);
    if ($id != false) {
        // header("Location:show.php?id=".$id."&msg=prodGuard");
        header("Location:create.php?msg=medGuard");
        // return $id;
    } else {
        // header("Location:create.php?msg=errorGuard");
        return "Error al almacenar medico";

    }
}
?>