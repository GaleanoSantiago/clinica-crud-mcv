<?php
require_once "./../../config/bd.php";


function indexModel() {
    $PDO = getConnection();
    // $stament = $PDO->prepare("SELECT * FROM empleados");
    $stament = $PDO->prepare("SELECT empleados.id_empleado, personas.id_persona, personas.nombre_persona, tipos_empleado.tipo_empleado, personas.cuit_persona, personas.dni_persona, municipios.nombre_municipio, direcciones.direccion, direcciones.codigo_postal, contactos.contacto FROM empleados INNER JOIN personas ON empleados.id_persona = personas.id_persona INNER JOIN tipos_empleado ON empleados.id_tipo_empleado = tipos_empleado.id_tipo_empleado INNER JOIN municipios ON personas.id_municipio = municipios.id_municipio INNER JOIN direcciones ON personas.id_direccion = direcciones.id_direccion INNER JOIN contactos ON personas.id_contacto = contactos.id_contacto ORDER BY empleados.id_empleado");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}
// Funcion para la lista de empleados agrupados por cargo
function EmpleadosPorCargoModel($date,$opcion) {
    $PDO = getConnection();
    // $stament = $PDO->prepare("SELECT * FROM empleados");
    $date = date_format(date_create($date), 'Y-m-d');
    if($opcion==1){
        $stament = $PDO->prepare("SELECT empleados.id_empleado, personas.id_persona, personas.nombre_persona, tipos_empleado.tipo_empleado, personas.cuit_persona, personas.dni_persona, municipios.nombre_municipio, direcciones.direccion, direcciones.codigo_postal, contactos.contacto,vacaciones.fecha_inicio, vacaciones.fecha_fin FROM empleados INNER JOIN personas ON empleados.id_persona = personas.id_persona INNER JOIN tipos_empleado ON empleados.id_tipo_empleado = tipos_empleado.id_tipo_empleado INNER JOIN municipios ON personas.id_municipio = municipios.id_municipio INNER JOIN direcciones ON personas.id_direccion = direcciones.id_direccion INNER JOIN contactos ON personas.id_contacto = contactos.id_contacto INNER JOIN vacaciones on vacaciones.id_vacacion= empleados.id_vacacion WHERE vacaciones.fecha_inicio='$date' ORDER BY tipos_empleado.tipo_empleado, empleados.id_empleado;");
    return ($stament->execute()) ? $stament->fetchAll() : false;
    }
    if ($opcion==2) {
        $stament = $PDO->prepare("SELECT empleados.id_empleado, personas.id_persona, personas.nombre_persona, tipos_empleado.tipo_empleado, personas.cuit_persona, personas.dni_persona, municipios.nombre_municipio, direcciones.direccion, direcciones.codigo_postal, contactos.contacto,vacaciones.fecha_inicio, vacaciones.fecha_fin FROM empleados INNER JOIN personas ON empleados.id_persona = personas.id_persona INNER JOIN tipos_empleado ON empleados.id_tipo_empleado = tipos_empleado.id_tipo_empleado INNER JOIN municipios ON personas.id_municipio = municipios.id_municipio INNER JOIN direcciones ON personas.id_direccion = direcciones.id_direccion INNER JOIN contactos ON personas.id_contacto = contactos.id_contacto INNER JOIN vacaciones on vacaciones.id_vacacion= empleados.id_vacacion WHERE vacaciones.fecha_fin='$date' ORDER BY tipos_empleado.tipo_empleado, empleados.id_empleado;");
        return ($stament->execute()) ? $stament->fetchAll() : false;
    }
    $stament = $PDO->prepare("SELECT empleados.id_empleado, personas.id_persona, personas.nombre_persona, personas.apellido_persona, tipos_empleado.tipo_empleado, personas.cuit_persona, personas.dni_persona, municipios.nombre_municipio, direcciones.direccion, direcciones.codigo_postal, contactos.contacto,vacaciones.fecha_inicio, vacaciones.fecha_fin FROM empleados INNER JOIN personas ON empleados.id_persona = personas.id_persona INNER JOIN tipos_empleado ON empleados.id_tipo_empleado = tipos_empleado.id_tipo_empleado INNER JOIN municipios ON personas.id_municipio = municipios.id_municipio INNER JOIN direcciones ON personas.id_direccion = direcciones.id_direccion INNER JOIN contactos ON personas.id_contacto = contactos.id_contacto INNER JOIN vacaciones on vacaciones.id_vacacion= empleados.id_vacacion
 ORDER BY tipos_empleado.tipo_empleado, empleados.id_empleado;");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}
// Funcion para mostrar empleados por cargo 
function contEmpleadosPorCargoModel(){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT 
        te.id_tipo_empleado,
        te.tipo_empleado,
        COUNT(e.id_empleado) AS cantidad_registros
    FROM 
        empleados e
    INNER JOIN 
        tipos_empleado te ON e.id_tipo_empleado = te.id_tipo_empleado
    GROUP BY 
        te.id_tipo_empleado, te.tipo_empleado
    ORDER BY 
        te.id_tipo_empleado;
    ");
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
function insertarPersona($apellido,$nombre, $cuit, $dni, $municipio, $id_direccion, $id_contacto) {
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO personas VALUES 
        (NULL,:apellido , :nombre, :cuit, :dni, :municipio, :id_direccion, 
        :id_contacto)"
    );
    $stament->bindParam(":apellido", $apellido);
    $stament->bindParam(":nombre", $nombre);
    $stament->bindParam(":cuit", $cuit);
    $stament->bindParam(":dni", $dni);
    $stament->bindParam(":municipio", $municipio);
    $stament->bindParam(":id_direccion", $id_direccion);
    $stament->bindParam(":id_contacto", $id_contacto);

    return ($stament->execute()) ? $PDO->lastInsertId() : false;
}

// Insertar Municipio
function insertarMunicipio($nombre_municipio, $id_departamento) {
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO municipios VALUES 
        (NULL, :nombre_municipio, :id_departamento)"
    );
    
    $stament->bindParam(":nombre_municipio", $nombre_municipio);
    $stament->bindParam(":id_departamento", $id_departamento);
    
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

// Index de Departamentos
function indexDepartamentosModel(){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM departamentos");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// Index de Paises
function indexPaisesModel(){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM paises");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// Index de Provincias
function indexProvinciasModel(){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM provincias");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

?>