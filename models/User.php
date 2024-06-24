<?php
require_once "./../../config/bd.php";

function Authenticate($username,$password){
    
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM usuarios where user_name='$username' and password= AES_ENCRYPT('$password', 'PEPE')");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

    
/*
class User {
    private $db;

    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function getUserByUsernameAndPassword($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM 'usuarios' WHERE 'user_name' = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Verificar si se encontró un usuario
        if ($user) {
            // Desencriptar la contraseña almacenada en la base de datos
            $storedPassword = openssl_decrypt($user['password'], 'aes-128-cbc', 'secret_key', 0, '1234567890123456');
            
            // Verificar si las contraseñas coinciden
            if ($password === $storedPassword) {
                return $user;
            }
        }

        return false;
    }
}*/
