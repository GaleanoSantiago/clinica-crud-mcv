<?php
require_once "./../../models/Diagnosticos.php";

function indexDiagnostico(){
    $rows = indexDiagnosticoModel();
    return $rows;
}

function showDiagnostico($id) {
    $rows = showDiagnosticoModel($id);
    return $rows;
}

function guardarDiagnostico($id_consulta, $descripcion, $notas_adicionales){
    $response = guardarDiagnosticoModel($id_consulta, $descripcion, $notas_adicionales);
    return $response;
}

