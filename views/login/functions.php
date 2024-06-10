<?php

require("../../controllers/LoginController.php");
// $obj = new LoginController();
// $import = $obj->authenticate()();

echo $import;

if(isset($_REQUEST['login'])){
    header("Location: ./../../views/empleados/index.php");
}else{

}