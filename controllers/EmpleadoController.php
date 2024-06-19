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
function guardarPersona($nombre, $cuit, $dni, $municipio, $id_direccion, $id_contacto, $id_rol_persona) {
    $id = insertarPersona($nombre, $cuit, $dni, $municipio, $id_direccion, $id_contacto, $id_rol_persona);
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

// ================================= Funciones que no se utlizan todavia =======================================

function show($id) {
    $result = showModel($id);
    if ($result != false) {
        return $result;
    } else {
        header("Location:index.php");
    }
}


function indexCategorias() {
    $result = indexCategoriasModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function update($id, $nombre, $cod_prod, $descripcion, $precio, $precio_descuento, $oferta, $categoria, $fecha, $img) {
    $result = updateModel($id, $nombre, $cod_prod, $descripcion, $precio, $precio_descuento, $oferta, $categoria, $fecha, $img);
    if ($result != false) {
        header("Location:show.php?id=".$id);
    } else {
        header("Location:index.php");
    }
}

function delete($id) {
    $result = deleteModel($id);
    if ($result != false) {
        header("Location:index.php?msg=elimSuccs");
    } else {
        header("Location:show.php?id=".$id);
    }
}

function borrarDescuentoAll() {
    $result = borrarDescuentoAllModel();
    if ($result != false) {
        header("Location:index.php?funciono=si");
    } else {
        header("Location:index.php?funciono=no");
    }
}


?>

