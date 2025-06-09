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



    public function getorden($nro_ord){

       $query = $this->db->prepare(" SELECT d.id_det , u.nom_usu,u.usu_usu, o.nro_ord, o.nom_cli , o.fec_ent,o.nom_pro, o.can_tot, o.pro_ord
                                      FROM detalle_orden d
                                      JOIN usuario u ON d.id_usu_fk = u.id_usu
                                      JOIN orden o ON d.id_ord_fk = o.id_ord
                                      WHERE nro_ord = ? ");
       $query->execute([$nro_ord]);

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

       $query = $this->db->prepare("SELECT i.id_ind, i.can_rea, i.tie_gas, i.fec_ind, u.usu_usu, o.nro_ord, o.nom_pro, o.pro_ord, o.can_tot
                                                FROM indicador i
                                                JOIN detalle_orden d ON i.id_det_fk = d.id_det
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


    public function getindi2($id){

       $query = $this->db->prepare("SELECT i.id_ind, i.can_rea, i.tie_gas, i.fec_ind, u.usu_usu, o.nro_ord, o.nom_pro, o.pro_ord,
                                           p.pro_pro, p.act_pro, p.can_pro, p.tie_pro , p.id_pro                   
                                                FROM indicador i
                                                JOIN detalle_orden d ON i.id_det_fk = d.id_det
                                                JOIN promedio p ON i.id_pro_fk = p.id_pro
                                                JOIN usuario u ON d.id_usu_fk = u.id_usu
                                                JOIN orden o ON d.id_ord_fk = o.id_ord
                                                WHERE id_ind = ? ");
       $query->execute([$id]);
       $indicadors = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // Verificamos si se encontró un usuario
        if ($indicadors ) {
            return $indicadors;  // Retornamos el usuario encontrado
        } else {
            return null;  // Si no se encontró el usuario, devolvemos null
        }


    }


    public function existeEficiencia($id_ind_fk) {
        $query = $this->db->prepare("SELECT COUNT(*) FROM eficiencia WHERE id_ind_fk = ?");
        $query->execute([$id_ind_fk]);
        return $query->fetchColumn() > 0; // Devuelve true si existe, false si no
    }


    public function insertefi($data){

        $query = $this->db->prepare("INSERT INTO eficiencia (id_ind_fk, tot_efi) 
                                     VALUES (?, ?)"); //? sentencias preparadas, seguras contra inyecciones SQL
        return $query->execute([
            $data['id_ind_fk'],
            $data['tot_efi']
        ]); 
    }


    public function verifyCan($nro_ord, $pro_ord){

       $query = $this->db->prepare("SELECT  i.can_rea, o.nro_ord, o.pro_ord, o.can_tot
                                                FROM indicador i
                                                JOIN detalle_orden d ON i.id_det_fk = d.id_det
                                                JOIN orden o ON d.id_ord_fk = o.id_ord
                                                WHERE nro_ord = ? AND  pro_ord = ? ");

       $query->execute([$nro_ord, $pro_ord]);
       return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    
    public function showindi($id){
        // Preparamos la consulta para obtener un usuario por su ID
    $query = $this->db->prepare("SELECT i.id_ind, i.can_rea, i.tie_gas, i.fec_ind, u.usu_usu, o.nro_ord, o.nom_pro, pro_ord, o.can_tot
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


     public function update($id, $data){
        $query = $this->db->prepare("UPDATE indicador SET 
            can_rea = ?, 
            tie_gas = ?, 
            fec_ind = ?, 
            id_det_fk = ?,
            id_pro_fk = ? 
            WHERE id_ind = ?");

        return $query->execute([
            $data['can_rea'],
            $data['tie_gas'],
            $data['fec_ind'],
            $data['id_det_fk'],
            $data['id_pro_fk'],
            $id // este es el id que vas a actualizar
        ]);
    }




}