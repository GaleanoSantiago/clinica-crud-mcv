<?php

require_once "./../../models/Empleados.php";

function lastId() {
    return lastIdModel();
}

function index() {
    $result = indexModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function EmpleadosPorCargo($date=false,$opcion=false) {
    $result = EmpleadosPorCargoModel($date,$opcion);
    if ($result) {
        return $result;
    } else {
        return false;
    }
}
function contEmpleadosPorCargo() {
    $result = contEmpleadosPorCargoModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

// insertar direccion
function guardarDireccion($direccion, $cod_postal) {
    $id = insertarDireccion($direccion, $cod_postal);
    if ($id != false) {
        return $id;
    } else {
        return "no se guardo la direccion";
    }
}

// insertar contactos
function guardarContacto($email) {
    $id = insertarContacto($email);
    if ($id != false) {
        return $id;
    } else {
        return "no se guardo el contacto";
    }
}

// insertar persona
function guardarPersona($apellido,$nombre, $cuit, $dni, $municipio, $id_direccion, $id_contacto) {
    $id = insertarPersona($apellido,$nombre, $cuit, $dni, $municipio, $id_direccion, $id_contacto);
    if ($id != false) {
        return $id;
    } else {
        return "no se guardo la persona";
    }
}

// Insertar Municipio
function guardarMunicipio($nombre_municipio, $id_departamento) {
    $id = insertarMunicipio($nombre_municipio, $id_departamento);
    if ($id != false) {
        return $id;
    } else {
        return "no se guardo el municipio";

    }
}
// Guardar Empleado
function guardar($id_persona, $id_tipo_empleado, $id_vacacion) {
    $id = insertar($id_persona, $id_tipo_empleado, $id_vacacion);
    if ($id != false) {
        // header("Location:show.php?id=".$id."&msg=prodGuard");
        // header("Location:create.php?msg=emplGuard");
        return $id;
    } else {
        // header("Location:create.php?msg=errorGuard");
        return false;

    }
}

function indexMunicipios() {
    $result = indexMunicipiosModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function indexTipoEmpleados() {
    $result = indexTipoEmpleadosModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function indexDepartamentos(){
    $result = indexDepartamentosModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function indexPaises(){
    $result = indexPaisesModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function indexProvincias(){
    $result = indexProvinciasModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function limpiarcadena($campo) {
    $campo = strip_tags($campo);
    $campo = filter_var($campo, FILTER_UNSAFE_RAW);
    $campo = htmlspecialchars($campo);
    return $campo;
}

?>

