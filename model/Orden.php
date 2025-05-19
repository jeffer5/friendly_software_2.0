<?php

require_once 'config/database.php'; // traemos la configuracion de la conexion

class Orden{ //creamos clase orden para su uso en Orden controller
    private $db; 


    public function __construct(){
        $this->db = Database::connect();
    }

    public function getAll(){
        $query = $this->db->prepare("SELECT * FROM orden");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC); // “Devuélve todos los resultados de la consulta, como un arreglo de arreglos asociativos.”
    }


    public function getById($id) {
        $query = $this->db->prepare("SELECT * FROM orden WHERE id_ord = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }


    public function getById1($id) {
    // Preparamos la consulta para obtener un usuario por su ID
    $query = $this->db->prepare("SELECT * FROM orden WHERE id_ord = ?");
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



    public function create($data){
        $query = $this->db->prepare("INSERT INTO orden (nro_ord, nom_cli, fec_ent, nom_pro, can_tot, pro_ord)
                                    VALUES (?,?,?,?,?,?)");


        return $query->execute([
            $data['nro_ord'],
            $data['nom_cli'],
            $data['fec_ent'],
            $data['nom_pro'],
            $data['can_tot'],
            $data['pro_ord'],
        ]);

    }


    public function update($id, $data){
            $query = $this->db->prepare("UPDATE orden SET 
                nro_ord = ?, 
                nom_cli = ?, 
                fec_ent = ?, 
                nom_pro = ?, 
                can_tot = ?, 
                pro_ord = ? 
                WHERE id_ord = ?");

            return $query->execute([
                $data['nro_ord'],
                $data['nom_cli'],
                $data['fec_ent'],
                $data['nom_pro'],
                $data['can_tot'],
                $data['pro_ord'],
                $id // este es el id que vas a actualizar
            ]);
        }


    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM orden WHERE id_ord = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }











}

