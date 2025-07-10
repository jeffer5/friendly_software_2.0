<?php

require_once 'config/database.php';

class Indicador{
    private $db;

    public function __construct(){
          $this->db = Database::connect();
        
    }


    // Obtener todos los indicadores
    public function getAllIndicadores() {
        $query = $this->db->prepare("SELECT * FROM indicador");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function getIndicadorById($id) {
    // Preparamos la consulta para obtener un usuario por su ID
    $query = $this->db->prepare("SELECT * FROM indicador WHERE id_ind = ?");
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



    public function update($id, $data){
        $query = $this->db->prepare("UPDATE indicador SET 
            can_rea = ?, 
            tie_gas = ?, 
            fec_ind = ? 
            WHERE id_ind = ?");

        return $query->execute([
            $data['can_rea'],
            $data['tie_gas'],
            $data['fec_ind'],
            $id // este es el id que vas a actualizar
        ]);
    }


    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM indicador WHERE id_ind = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }







}