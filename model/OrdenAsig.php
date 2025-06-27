<?php

require_once 'config/database.php';


class OrdenAsig{
    private $db;


    public function __construct(){
        $this->db = Database::connect();
        
    }


    public function showOpe(){
        $query = $this->db->prepare("SELECT id_usu,nom_usu FROM usuario WHERE rol_usu = 'operario' ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC); 

    }


    public function showOrd(){
        $query = $this->db->prepare("SELECT id_ord,nro_ord,pro_ord FROM orden ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    public function asignarO($data){
        $query = $this->db->prepare("INSERT INTO detalle_orden(id_usu_fk, id_ord_fk) VALUES(?,?)");

        return $query->execute([

            $data['id_usu_fk'],
            $data['id_ord_fk'],

            ]);

    }


    public function getAll(){
        $query = $this->db->prepare(" SELECT d.id_det , u.nom_usu,u.usu_usu, o.nro_ord, o.nom_cli , o.fec_ent,o.nom_pro, o.can_tot, o.pro_ord
                                      FROM detalle_orden d
                                      JOIN usuario u ON d.id_usu_fk = u.id_usu
                                      JOIN orden o ON d.id_ord_fk = o.id_ord");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }


    public function getById1($id) {
    // Preparamos la consulta para obtener un usuario por su ID
    $query = $this->db->prepare(" SELECT d.id_det , u.nom_usu,u.usu_usu, o.nro_ord, o.nom_cli , o.fec_ent,o.nom_pro, o.can_tot, o.pro_ord
                                      FROM detalle_orden d
                                      JOIN usuario u ON d.id_usu_fk = u.id_usu
                                      JOIN orden o ON d.id_ord_fk = o.id_ord
                                      WHERE id_det = ? ");
    $query->execute([$id]);

    // Recuperamos el resultado
    $detalle = $query->fetch(PDO::FETCH_ASSOC);

    // Verificamos si se encontró un usuario
    if ($detalle) {
        return $detalle;  // Retornamos el usuario encontrado
    } else {
        return null;  // Si no se encontró el usuario, devolvemos null
    }
}



    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM detalle_orden WHERE id_det = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }







}