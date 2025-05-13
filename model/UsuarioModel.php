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


}