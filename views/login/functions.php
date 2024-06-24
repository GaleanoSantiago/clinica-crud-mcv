<?php

require("../../controllers/LoginController.php");
 //$obj = new LoginController();
 //$import = $obj->authenticate();

//echo $import;



if(isset($_REQUEST['login'])){
    
    if(LofinController()){
        header("Location: ./../../views/empleados/index.php");
    }else{
        header("Location:index.php?msg=error");
    }
}

