<?php
require_once 'config/database.php'; //traemos la conexion a la base de datos

class Supervisor {  //creamos una clase supervisor
    private $db;  //se crea una variable privada

    // creamos un constructor el cual nos permite usar la base de datos 
    public function __construct() {
        $this->db = Database::connect(); // Usamos la clase Database que ya hicimos //$this-> accede a las propiedades
    }

    
    // Obtener todos los usuarios
    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM usuario");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }



    public function existeUsuario($usu_usu, $ndo_usu) {
        $query = $this->db->prepare("SELECT COUNT(*) FROM usuario WHERE usu_usu = ? OR ndo_usu = ?");
        $query->execute([$usu_usu , $ndo_usu]);
        return $query->fetchColumn() > 0; // Devuelve true si existe, false si no
    }
    



    // Agregar un nuevo operario
    public function create($data) {
        
        $query = $this->db->prepare("INSERT INTO usuario (nom_usu, ape_usu, tdo_usu, ndo_usu, tel_usu, usu_usu, pass_usu, rol_usu, fot_usu) 
                                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"); //? sentencias preparadas, seguras contra inyecciones SQL
        return $query->execute([
            $data['nom_usu'],
            $data['ape_usu'],
            $data['tdo_usu'],
            $data['ndo_usu'],
            $data['tel_usu'],
            $data['usu_usu'],
            password_hash($data['pass_usu'], PASSWORD_DEFAULT),
            $data['rol_usu'],
            $data['fot_usu']
        ]);
    }

    // Buscar un operario por ID
    public function getById($id) {
        $query = $this->db->prepare("SELECT * FROM usuario WHERE id_usu = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }


    public function getById1($id) {
    // Preparamos la consulta para obtener un usuario por su ID
    $query = $this->db->prepare("SELECT * FROM usuario WHERE id_usu = ?");
    $query->execute([$id]);

    // Recuperamos el resultado
    $usuario = $query->fetch(PDO::FETCH_ASSOC);

    // Verificamos si se encontró un usuario
    if ($usuario) {
        return $usuario;  // Retornamos el usuario encontrado
    } else {
        return null;  // Si no se encontró el usuario, devolvemos null
    }
}



    // Agregar un nuevo operario
    public function registrar($data) {
        
        $query = $this->db->prepare("INSERT INTO usuario (nom_usu, ape_usu, tdo_usu, ndo_usu, tel_usu, usu_usu, pass_usu, rol_usu, fot_usu) 
                                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"); //? sentencias preparadas, seguras contra inyecciones SQL
        return $query->execute([
            $data['nom_usu'],
            $data['ape_usu'],
            $data['tdo_usu'],
            $data['ndo_usu'],
            $data['tel_usu'],
            $data['usu_usu'],
            password_hash($data['pass_usu'], PASSWORD_DEFAULT),
            $data['rol_usu'],
            $data['fot_usu']
        ]);
    }



    public function update($id, $data){
        $query = $this->db->prepare("UPDATE usuario SET 
            nom_usu = ?, 
            ape_usu = ?, 
            tdo_usu = ?, 
            ndo_usu = ?, 
            tel_usu = ?, 
            usu_usu = ?, 
            rol_usu = ?, 
            fot_usu = ?
            WHERE id_usu = ?");

        return $query->execute([
            $data['nom_usu'],
            $data['ape_usu'],
            $data['tdo_usu'],
            $data['ndo_usu'],
            $data['tel_usu'],
            $data['usu_usu'],
            $data['rol_usu'],
            $data['fot_usu'],
            $id // este es el id que vas a actualizar
        ]);
    }


    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM usuario WHERE id_usu = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }




}