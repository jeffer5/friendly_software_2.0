<?php

require_once 'config/database.php';


class Estandar{
    private $db;


    public function __construct(){
        
        $this->db=Database::connect();

    }


    public function getAll(){
        $query = $this->db->prepare("SELECT * FROM promedio");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }


    public function getById($id) {
        $query = $this->db->prepare("SELECT * FROM promedio WHERE id_pro = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }


    public function getById1($id) {
        // Preparamos la consulta para obtener un usuario por su ID
        $query = $this->db->prepare("SELECT * FROM promedio WHERE id_pro = ?");
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

     public function create($data) {
        
        $query = $this->db->prepare("INSERT INTO promedio (pro_pro, act_pro, can_pro, tie_pro) 
                                     VALUES (?, ?, ?, ?)"); //? sentencias preparadas, seguras contra inyecciones SQL
        return $query->execute([
            $data['pro_pro'],
            $data['act_pro'],
            $data['can_pro'],
            $data['tie_pro']
        ]);
    }


    public function update($id, $data){
        $query = $this->db->prepare("UPDATE promedio SET 
            pro_pro = ?, 
            act_pro = ?, 
            can_pro = ?, 
            tie_pro = ? 
            WHERE id_pro = ?");

        return $query->execute([
            $data['pro_pro'],
            $data['act_pro'],
            $data['can_pro'],
            $data['tie_pro'],
            $id // este es el id que vas a actualizar
        ]);
    }


    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM promedio WHERE id_pro = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }





}