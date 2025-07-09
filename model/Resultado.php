<?php

require_once 'config/database.php';

class Resultado{
    private $db;


    public function __construct(){
        $this->db = Database::connect();

    }


    public function getAllEfi(){
        $query = $this->db->prepare("SELECT e.id_efi, e.id_ind_fk, e.tot_efi,i.id_ind, i.can_rea, i.tie_gas, i.fec_ind,u.id_usu , u.usu_usu, u.nom_usu, u.ape_usu, o.nro_ord, o.nom_pro, o.pro_ord,
                                           p.pro_pro, p.act_pro, p.can_pro, p.tie_pro , p.id_pro                   
                                                FROM eficiencia e
                                                JOIN indicador i ON id_ind_fk = i.id_ind
                                                JOIN detalle_orden d ON i.id_det_fk = d.id_det
                                                JOIN promedio p ON i.id_pro_fk = p.id_pro
                                                JOIN usuario u ON d.id_usu_fk = u.id_usu
                                                JOIN orden o ON d.id_ord_fk = o.id_ord
                                                ");

        $query->execute();
        $getAll = $query->fetchAll(PDO::FETCH_ASSOC); 

         if ($getAll) {
            return $getAll;  // Retornamos el usuario encontrado
        } else {
            return null;  // Si no se encontró el usuario, devolvemos null
        }

    }


    public function getAllbyUsu($id_usu){
        $query = $this->db->prepare("SELECT e.id_efi, e.id_ind_fk, e.tot_efi,i.id_ind, i.can_rea, i.tie_gas, i.fec_ind,u.id_usu ,u.usu_usu, u.nom_usu, u.ape_usu , o.nro_ord, o.nom_pro, o.pro_ord,
                                           p.pro_pro, p.act_pro, p.can_pro, p.tie_pro , p.id_pro                   
                                                FROM eficiencia e 
                                                JOIN indicador i ON id_ind_fk = i.id_ind
                                                JOIN detalle_orden d ON i.id_det_fk = d.id_det
                                                JOIN promedio p ON i.id_pro_fk = p.id_pro
                                                JOIN usuario u ON d.id_usu_fk = u.id_usu
                                                JOIN orden o ON d.id_ord_fk = o.id_ord
                                                WHERE id_usu = ?");
    
        $query->execute([$id_usu]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }



    

    public function getAllbyOrd($nro_ord){
        $query = $this->db->prepare("SELECT e.id_efi, e.id_ind_fk, e.tot_efi,i.id_ind, i.can_rea, i.tie_gas, i.fec_ind,u.id_usu , u.usu_usu, o.nro_ord, o.nom_pro, o.pro_ord,o.fec_ent,
                                           p.pro_pro, p.act_pro, p.can_pro, p.tie_pro , p.id_pro                   
                                                FROM eficiencia e
                                                JOIN indicador i ON id_ind_fk = i.id_ind
                                                JOIN detalle_orden d ON i.id_det_fk = d.id_det
                                                JOIN promedio p ON i.id_pro_fk = p.id_pro
                                                JOIN usuario u ON d.id_usu_fk = u.id_usu
                                                JOIN orden o ON d.id_ord_fk = o.id_ord
                                                WHERE nro_ord = ?");
    
        $query->execute([$nro_ord]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


 public function getRankingByOrdersCompleted($fecha1, $fecha2) {
        $query = $this->db->prepare("
            SELECT
                u.usu_usu,
                u.nom_usu,
                u.ape_usu,
                COUNT(o.id_ord) AS total_ordenes_completadas,
                SUM(e.tot_efi) AS suma_eficiencia_total,
                AVG(e.tot_efi) AS promedio_eficiencia
            FROM eficiencia e
            JOIN indicador i ON e.id_ind_fk = i.id_ind
            JOIN detalle_orden d ON i.id_det_fk = d.id_det
            JOIN usuario u ON d.id_usu_fk = u.id_usu
            JOIN orden o ON d.id_ord_fk = o.id_ord
            WHERE i.fec_ind BETWEEN ? AND ?
            -- Si solo quieres contar órdenes marcadas como 'Completado', descomenta la siguiente línea:
            -- AND o.estado_ord = 'Completado'
            GROUP BY u.id_usu, u.usu_usu, u.nom_usu, u.ape_usu
            ORDER BY total_ordenes_completadas DESC, promedio_eficiencia DESC
        ");

        $query->execute([$fecha1, $fecha2]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }



    public function conData($fecha1,$fecha2){
        $query = $this->db->prepare("SELECT e.id_efi, e.id_ind_fk, e.tot_efi,i.id_ind, i.can_rea, i.tie_gas, i.fec_ind,u.id_usu , u.usu_usu, o.nro_ord, o.nom_pro, o.pro_ord,o.fec_ent,
                                           p.pro_pro, p.act_pro, p.can_pro, p.tie_pro , p.id_pro                   
                                                FROM eficiencia e
                                                JOIN indicador i ON id_ind_fk = i.id_ind
                                                JOIN detalle_orden d ON i.id_det_fk = d.id_det
                                                JOIN promedio p ON i.id_pro_fk = p.id_pro
                                                JOIN usuario u ON d.id_usu_fk = u.id_usu
                                                JOIN orden o ON d.id_ord_fk = o.id_ord
                                                WHERE i.fec_ind BETWEEN ? AND ?");
    
        $query->execute([$fecha1,$fecha2]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    



}