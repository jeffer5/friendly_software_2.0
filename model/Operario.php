<?php

require_once 'config/database.php';


class Operario{
    private $db;

    public function __construct(){
        
        $this->db = Database::connect();


    }


    public function getByid($usu_usu){

       $query = $this->db->prepare(" SELECT d.id_det , u.nom_usu,u.usu_usu, o.nro_ord, o.nom_cli , o.fec_ent,o.nom_pro, o.can_tot, o.pro_ord
                                      FROM detalle_orden d
                                      JOIN usuario u ON d.id_usu_fk = u.id_usu
                                      JOIN orden o ON d.id_ord_fk = o.id_ord
                                      WHERE usu_usu = ? ");
       $query->execute([$usu_usu]);

       $detalles = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // Verificamos si se encontró un usuario
        if ($detalles) {
            return $detalles;  // Retornamos el usuario encontrado
        } else {
            return null;  // Si no se encontró el usuario, devolvemos null
        }


    }



    public function getorden($usu_usu){

       $query = $this->db->prepare(" SELECT d.id_det , u.nom_usu,u.usu_usu, o.nro_ord, o.nom_cli , o.fec_ent,o.nom_pro, o.can_tot, o.pro_ord
                                      FROM detalle_orden d
                                      JOIN usuario u ON d.id_usu_fk = u.id_usu
                                      JOIN orden o ON d.id_ord_fk = o.id_ord
                                      WHERE usu_usu = ? ");
       $query->execute([$usu_usu]);

       $detalles = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // Verificamos si se encontró un usuario
        if ($detalles) {
            return $detalles;  // Retornamos el usuario encontrado
        } else {
            return null;  // Si no se encontró el usuario, devolvemos null
        }


    }



    public function getprom(){

       $query = $this->db->prepare("SELECT * FROM promedio");
       $query->execute();
       $promedios = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // Verificamos si se encontró un usuario
        if ($promedios) {
            return $promedios;  // Retornamos el usuario encontrado
        } else {
            return null;  // Si no se encontró el usuario, devolvemos null
        }


    }


    public function insertindi($data){

       $query = $this->db->prepare("insert into indicador(can_rea,tie_gas,fec_ind,id_det_fk,id_pro_fk) values
                                    ( ?,?,?,?,?) ");
       return $query->execute([
            $data['can_rea'],
            $data['tie_gas'],
            $data['fec_ind'],
            $data['id_det_fk'],
            $data['id_pro_fk']

       ]);
       
    }



    public function getindi(){

       $query = $this->db->prepare("SELECT i.id_ind, i.can_rea, i.tie_gas, i.fec_ind, u.usu_usu, o.nro_ord, o.nom_pro, pro_ord
                                                FROM indicador i
                                                JOIN detalle_orden d ON i.id_pro_fk = d.id_det
                                                JOIN usuario u ON d.id_usu_fk = u.id_usu
                                                JOIN orden o ON d.id_ord_fk = o.id_ord");
       $query->execute();
       $promedios = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // Verificamos si se encontró un usuario
        if ($promedios) {
            return $promedios;  // Retornamos el usuario encontrado
        } else {
            return null;  // Si no se encontró el usuario, devolvemos null
        }


    }



    /*public function insert($id,$data){

       $existe = $this->db->prepare("SELECT 1 FROM eficiencia WHERE id_ind_fk = ? LIMIT 1");
       $existe->execute([$id]);
       return $existe->fetch(PDO::FETCH_ASSOC);

        if($existe->rowCount()==0){

        $query = $this->db->prepare("INSERT INTO promedio (pro_pro, act_pro, can_pro, tie_pro) 
                                     VALUES (?, ?, ?, ?)"); //? sentencias preparadas, seguras contra inyecciones SQL
        return $query->execute([
            $data['pro_pro'],
            $data['act_pro'],
            $data['can_pro'],
            $data['tie_pro']
        ]);


        }
    }*/


    public function showindi($id){
        // Preparamos la consulta para obtener un usuario por su ID
    $query = $this->db->prepare("SELECT i.id_ind, i.can_rea, i.tie_gas, i.fec_ind, u.usu_usu, o.nro_ord, o.nom_pro, pro_ord
                                                FROM indicador i
                                                JOIN detalle_orden d ON i.id_pro_fk = d.id_det
                                                JOIN usuario u ON d.id_usu_fk = u.id_usu
                                                JOIN orden o ON d.id_ord_fk = o.id_ord
                                                WHERE id_ind = ? ");
    $query->execute([$id]);

    // Recuperamos el resultado
    $indicador = $query->fetch(PDO::FETCH_ASSOC);

    // Verificamos si se encontró un usuario
    if ($indicador) {
        return $indicador;  // Retornamos el usuario encontrado
    } else {
        return null;  // Si no se encontró el usuario, devolvemos null
    }

    }





}