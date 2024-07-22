<?php
require_once("./../../controllers/EmpleadoController.php");


if(isset($_REQUEST['insertEmpleado'])){
    $id = insertarEmpleado();
    if($id != false){
        header("Location:create.php?msg=emplGuard");

    }
}

function insertarEmpleado(){
    // echo "Insertando empleado";
    // echo "<br>";
    $apellido= limpiarcadena($_POST["apellido"]);
    $nombre = limpiarcadena($_POST["nombre"]);
    $cuit = limpiarcadena($_POST["cuit"]);
    $dni = limpiarcadena($_POST["dni"]);
    $municipio = limpiarcadena($_POST["municipio"]);
    $direccion = limpiarcadena($_POST["direccion"]);
    $cod_postal = limpiarcadena($_POST["cod_postal"]);
    $email = limpiarcadena($_POST["email"]);
    $id_tipo_empleado = limpiarcadena($_POST["tipo_empleado"]);

    // Atributos no definidos adecuadamente aun
    $id_vacacion = null;

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
    $id_persona = guardarPersona($apellido,$nombre, $cuit, $dni, $municipio, $id_direccion, $id_contacto);

    // Guardando empleado
    $id_empleado = guardar($id_persona, $id_tipo_empleado, $id_vacacion);
    
    return $id_empleado;
};

?>