<?php
require_once "./../../config/bd.php";

function Authenticate($username,$password){
    
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM usuarios where user_name='$username' and password= AES_ENCRYPT('$password', 'PEPE')");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}


