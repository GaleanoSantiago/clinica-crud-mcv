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

function contMedicosPorEspecialidad() {
    $result = contMedicosPorEspecialidadModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}
function contMedicosPorEspecialidad2() {
    $result = contMedicosPorEspecialidadModel2();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function MedicosPorEspecialidad() {
    $result = MedicosPorEspecialidadModel();
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

// Para eliminar Medico. NO SE USA
// Para eliminar un medico en realidad se utiliza la funcion
// para eliminar empleado del EmpleadoController.php debido la
// relacion en cascada que tienen las dos tablas

function deleteMedico($id) {
    $result = deleteMedicoModel($id);
    if ($result != false) {
        header("Location:index.php?msg=elimSuccs");
    } else {
        // header("Location:show.php?id=".$id);
        echo "No se elimino el registro";
    }
}
?>