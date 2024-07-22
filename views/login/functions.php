<?php
session_start();
require("../../controllers/LoginController.php");

if(isset($_REQUEST['login'])){
    
    if(LofinController()){
        $_SESSION['user']=$_POST['username'];
        header("Location: ./../dashboard/");
    }else{
        header("Location:index.php?msg=error");
    }
}

