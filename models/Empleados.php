<?php
require_once "./../../config/bd.php";

function getConnection() {
    $con = new db();
    return $con->conexion();
}

function indexModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM empleados");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// Insertar direccion
function insertarDireccion($direccion, $cod_postal){
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO direcciones VALUES 
        (NULL, :direccion, :codigo_postal)"
    );
    
    $stament->bindParam(":direccion", $direccion);
    $stament->bindParam(":codigo_postal", $cod_postal);
    
    return ($stament->execute()) ? $PDO->lastInsertId() : false;
}
// Insentar contactos
function insertarContacto($email){
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO contactos VALUES 
        (NULL, :contacto)"
    );
    
    $stament->bindParam(":contacto", $email);
    
    return ($stament->execute()) ? $PDO->lastInsertId() : false;
}

// Insertar personas
function insertarPersona($nombre, $cuit, $dni, $municipio, $id_direccion, $id_contacto, $id_rol_persona) {
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO personas VALUES 
        (NULL, :nombre, :cuit, :dni, :municipio, :id_direccion, 
        :id_contacto, :id_rol_persona)"
    );
    
    $stament->bindParam(":nombre", $nombre);
    $stament->bindParam(":cuit", $cuit);
    $stament->bindParam(":dni", $dni);
    $stament->bindParam(":municipio", $municipio);
    $stament->bindParam(":id_direccion", $id_direccion);
    $stament->bindParam(":id_contacto", $id_contacto);
    $stament->bindParam(":id_rol_persona", $id_rol_persona);

    return ($stament->execute()) ? $PDO->lastInsertId() : false;
}

// Insertar Empleados
function insertar($id_persona, $id_tipo_empleado, $id_vacacion) {
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO empleados VALUES 
        (NULL, :id_persona, :id_tipo_empleado, :id_vacacion)"
    );
    
    $stament->bindParam(":id_persona", $id_persona);
    $stament->bindParam(":id_tipo_empleado", $id_tipo_empleado);
    $stament->bindParam(":id_vacacion", $id_vacacion);
    
    return ($stament->execute()) ? $PDO->lastInsertId() : false;
}

// Index de Municipios
function indexMunicipiosModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM municipios");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// Index de Tipo Empleados
function indexTipoEmpleadosModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM tipos_empleado");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}




// ================================= Funciones que no se utlizan todavia =======================================
function lastIdModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT MAX(producto_id) AS id FROM productos");
    return ($stament->execute()) ? $stament->fetch() : false;
}

function showModel($id) {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM productos WHERE producto_id = :id limit 1");
    $stament->bindParam(":id", $id);
    return ($stament->execute()) ? $stament->fetch() : false;
}

function indexCategoriasModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM categoria");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}



function updateModel($id, $nombre, $cod_prod, $descripcion, $precio, $precio_descuento, $oferta, $categoria, $fecha, $img) {
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "UPDATE productos SET cnombre_producto = :nombre, cod_producto = :cod_prod, cdescripcion_producto = :descripcion,
        nprecio = :precio, nprecio_descuento = :precio_descuento,
        boferta_especial = :oferta, rela_categoria_id = :categoria, dfecha_alta = :fecha, cimg_prod = :img WHERE producto_id = :id"
    );
    
    $stament->bindParam(":id", $id);
    $stament->bindParam(":nombre", $nombre);
    $stament->bindParam(":cod_prod", $cod_prod);
    $stament->bindParam(":descripcion", $descripcion);
    $stament->bindParam(":precio", $precio);
    $stament->bindParam(":precio_descuento", $precio_descuento);
    $stament->bindParam(":oferta", $oferta);
    $stament->bindParam(":categoria", $categoria);
    $stament->bindParam(":fecha", $fecha);
    $stament->bindParam(":img", $img);
    return ($stament->execute()) ? $id : false;
}

function deleteModel($id) {
    $PDO = getConnection();
    $stament = $PDO->prepare("DELETE FROM productos WHERE producto_id = :id");
    $stament->bindParam(":id", $id);
    return ($stament->execute()) ? true : false;
}

function borrarDescuentoAllModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("UPDATE productos SET boferta_especial = false, nprecio_descuento = 0");
    return ($stament->execute()) ? true : false;
}

?>