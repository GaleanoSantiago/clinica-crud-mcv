<?php
require_once("./../../controllers/EmpleadoController.php");


if(isset($_REQUEST['insert'])){
    insertarEmpleado();
}

function insertarEmpleado(){
    // echo "Insertando empleado";
    // echo "<br>";
    $nombre = limpiarcadena($_POST["nombre"]);
    $cuit = limpiarcadena($_POST["cuit"]);
    $dni = limpiarcadena($_POST["dni"]);
    $municipio = limpiarcadena($_POST["municipio"]);
    $direccion = limpiarcadena($_POST["direccion"]);
    $cod_postal = limpiarcadena($_POST["cod_postal"]);
    $email = limpiarcadena($_POST["email"]);
    $id_tipo_empleado = limpiarcadena($_POST["tipo_empleado"]);

    $id_rol_persona = limpiarcadena(2);
    $id_vacacion = limpiarcadena(1);

    // Validar input del nuevo municipio dentro del modal
    if($_REQUEST["new_municipio"]!=""){
        
        $new_municipio = $_REQUEST["new_municipio"];
        $id_departamento = $_REQUEST["departamento_empleado"];
        $municipio = guardarMunicipio($new_municipio, $id_departamento);
    }

    // Guardar registro en contacto y obtener id_contacto
    $id_contacto = limpiarcadena(guardarContacto($email));
    // Guardar registro en direccion y obtener id_direccion
    $id_direccion = limpiarcadena(guardarDireccion($direccion, $cod_postal));
    // Guardar registro en personas y obtener el id_persona
    $id_persona = guardarPersona($nombre, $cuit, $dni, $municipio, $id_direccion, $id_contacto, $id_rol_persona);

    // Guardando empleado
    $id_empleado = guardar($id_persona, $id_tipo_empleado, $id_vacacion);


    // echo $id_contacto;
    // echo "<br>";
    // echo $id_direccion;
    // echo "<br>";
    // echo $id_persona;
    // echo "<br>";
    // echo $id_empleado;

};

?>