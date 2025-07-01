<?php
require_once 'config/database.php'; //traemos la conexion a la base de datos

class UsuarioModel {  //creamos una clase supervisor
    private $db;  //se crea una variable privada

    // creamos un constructor el cual nos permite usar la base de datos 
    public function __construct() {
        $this->db = Database::connect(); // Usamos la clase Database que ya hicimos //$this-> accede a las propiedades
    }


    public function findUsu($usu_usu, $pass_usu) {
    $query = $this->db->prepare("SELECT * FROM usuario WHERE usu_usu = ?"); // la variable $query es igual a this osea usuario luego que entre a la base de datos y luego que prepare mi consulta
    $query->execute([$usu_usu]); //se está ejecutando la consulta preparada y se le está pasando el valor real que sustituirá al ?
    $user = $query->fetch(PDO::FETCH_ASSOC); //es un método de PDO (PHP Data Objects) que prepara una consulta SQL con parámetros para evitar inyecciones SQL.

    if ($user && password_verify($pass_usu, $user['pass_usu'])) {
        return $user; // Usuario autenticado guarda los valores del select
    }

    return false; // Usuario no encontrado o contraseña incorrecta
}


    public function createPasswordResetToken($email, $token) {
        // Define el tiempo de expiración del token (ej. 1 hora)
        $expires_at = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $query = $this->db->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)");
        return $query->execute([$email, $token, $expires_at]);
    }


    public function findToken($token) {
        $query = $this->db->prepare("SELECT * FROM password_resets WHERE token = ?");
        $query->execute([$token]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    
    
    public function updatePassword($email, $hashed_password) {
        $query = $this->db->prepare("UPDATE usuario SET pass_usu = ? WHERE ema_usu = ?");
        return $query->execute([$hashed_password, $email]);
    }


    public function deleteToken($token) {
        $query = $this->db->prepare("DELETE FROM password_resets WHERE token = ?");
        return $query->execute([$token]);
    }


    public function findUserByEmail($email){
        $query = $this->db->prepare("SELECT * FROM usuario WHERE ema_usu = ?");  
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_ASSOC);

    }


}