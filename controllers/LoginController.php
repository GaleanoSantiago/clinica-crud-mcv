<?php
require_once "./../../models/User.php";


function LofinController(){
    $username = $_POST['username'];
    $password = $_POST['password'];
    return Authenticate($username,$password);
}

