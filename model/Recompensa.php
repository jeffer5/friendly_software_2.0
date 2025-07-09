<?php

require_once 'config/database.php';

class Recompensa { // O el nombre de tu modelo, ej. RecompensaEvento

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    /**
     * Inserta una nueva recompensa o evento en la base de datos.
     *
     * @param string $titulo El título de la recompensa/evento.
     * @param string $descripcion La descripción detallada.
     * @return bool True si la inserción fue exitosa, false de lo contrario.
     */
    public function insertarRecompensaEvento($titulo, $descripcion) {
        try {
            $query = $this->db->prepare("INSERT INTO recompensas_eventos (titulo, descripcion) VALUES(?,?)");
            return $query->execute([$titulo, $descripcion]);
        } catch (PDOException $e) {
            error_log("Error al insertar recompensa/evento: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Obtiene una recompensa o evento por su ID.
     * Útil para cargar datos en un formulario de edición.
     *
     * @param int $id_rec El ID de la recompensa/evento.
     * @return array|null Un array asociativo con los datos, o null si no se encuentra.
     */
    public function getRecompensaEventoById($id_rec) {
        try {
            $query = $this->db->prepare("SELECT * FROM recompensas_eventos WHERE id_rec = ?");
            $query->execute([$id_rec]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener recompensa/evento por ID: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Obtiene todas las recompensas y eventos, opcionalmente filtrados por activos.
     *
     * @param bool $soloActivos Si es true, solo trae los activos.
     * @return array Un array de arrays asociativos con los datos.
     */
    public function obtenerTodasRecompensasEventos($soloActivos = true) {
        try {
            $sql = "SELECT * FROM recompensas_eventos";
            if ($soloActivos) {
                $sql .= " WHERE activo = TRUE";
            }
            $sql .= " ORDER BY fecha_publicacion DESC, id_rec DESC"; // Mostrar los más recientes primero

            $query = $this->db->query($sql);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener todas las recompensas/eventos: " . $e->getMessage());
            return []; // Retorna un array vacío en caso de error
        }
    }

    /**
     * Actualiza una recompensa o evento existente.
     *
     * @param int $id_rec El ID de la recompensa/evento a actualizar.
     * @param string $titulo El nuevo título.
     * @param string $descripcion La nueva descripción.
     * @param bool $activo El nuevo estado activo/inactivo.
     * @return bool True si la actualización fue exitosa, false de lo contrario.
     */
    public function updateRecompensaEvento($id_rec, $titulo, $descripcion, $activo) {
        try {
            $query = $this->db->prepare("
                UPDATE recompensas_eventos
                SET
                    titulo = ?,
                    descripcion = ?,
                    activo = ?
                WHERE id_rec = ?
            ");
            return $query->execute([$titulo, $descripcion, $activo, $id_rec]);
        } catch (PDOException $e) {
            error_log("Error al actualizar recompensa/evento: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Elimina una recompensa o evento.
     *
     * @param int $id_rec El ID de la recompensa/evento a eliminar.
     * @return bool True si la eliminación fue exitosa, false de lo contrario.
     */
    public function deleteRecompensaEvento($id_rec) {
        try {
            $query = $this->db->prepare("DELETE FROM recompensas_eventos WHERE id_rec = ?");
            return $query->execute([$id_rec]);
        } catch (PDOException $e) {
            error_log("Error al eliminar recompensa/evento: " . $e->getMessage());
            return false;
        }
    }
    
}