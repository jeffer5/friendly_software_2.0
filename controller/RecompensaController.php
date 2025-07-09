<?php

// Asegúrate de que la ruta al modelo sea correcta.
// Si tu modelo Recompensa.php está en 'models/', entonces la ruta debe ser 'models/Recompensa.php'
require_once 'model/Recompensa.php';

class RecompensaController {
    private $recompensaModel; // Renombré la propiedad para ser más explícito

    public function __construct() {
        $this->recompensaModel = new Recompensa(); // Instancia del modelo Recompensa
    }

    // --- Acción para mostrar el formulario y la lista de recompensas/eventos ---
    public function mostrarFormularioYLista() {
        // Obtener todas las recompensas/eventos (incluyendo inactivos para la gestión)
        $recompensas_eventos = $this->recompensaModel->obtenerTodasRecompensasEventos(false);
        // La vista debe estar en 'views/RecompensasEventos/gestion_recompensas.php' según lo discutido
        require_once 'views/RecompensasEventos/gestion_recompensas.php';
    }

    // --- Acción para procesar el formulario de añadir/insertar una nueva recompensa/evento ---
    public function guardarRecompensaEvento() {
        // Verificar si los datos del formulario POST existen
        if (isset($_POST['titulo']) && isset($_POST['descripcion'])) {
            $titulo = trim($_POST['titulo']); // Usar trim para limpiar espacios en blanco
            $descripcion = trim($_POST['descripcion']);

            if (!empty($titulo) && !empty($descripcion)) {
                $success = $this->recompensaModel->insertarRecompensaEvento($titulo, $descripcion);

                // Mensajes de sesión para el usuario
                session_start(); // Asegúrate de iniciar la sesión si no lo haces globalmente
                if ($success) {
                    $_SESSION['mensaje'] = "Recompensa/Evento guardado exitosamente.";
                } else {
                    $_SESSION['error'] = "Error al guardar la recompensa/evento.";
                }
            } else {
                session_start();
                $_SESSION['error'] = "El título y la descripción no pueden estar vacíos.";
            }
        } else {
            session_start();
            $_SESSION['error'] = "Datos de formulario incompletos.";
        }

        // Redirigir siempre después de una operación de POST (Post-Redirect-Get Pattern)
        header('Location: index.php?action=gestionRecompensas');
        exit();
    }

    // --- Acción para procesar el formulario de actualización de una recompensa/evento ---
     public function actualizarRecompensas() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asegúrate de que los campos obligatorios estén presentes
            // Se eliminó $_POST['activo'] de esta verificación inicial porque es opcional
            if (isset($_POST['id_rec'], $_POST['titulo'], $_POST['descripcion'])) {
                $id_rec = (int)$_POST['id_rec'];
                $titulo = trim($_POST['titulo']);
                $descripcion = trim($_POST['descripcion']);

                // Manejar la casilla de verificación 'activo' por separado
                // Si la casilla está marcada, $_POST['activo'] será '1'.
                // Si la casilla está desmarcada, $_POST['activo'] no estará definida.
                $activo = isset($_POST['activo']) ? 1 : 0; // Asigna 1 (verdadero) si está marcada, 0 (falso) si no.

                // También podrías usar un booleano si tu columna de base de datos es booleana:
                // $activo = isset($_POST['activo']) ? true : false;


                $success = $this->recompensaModel->updateRecompensaEvento($id_rec, $titulo, $descripcion, $activo);

                session_start();
                if ($success) {
                    $_SESSION['mensaje'] = "Recompensa/Evento actualizado exitosamente.";
                } else {
                    $_SESSION['error'] = "Error al actualizar la recompensa/evento.";
                }
            } else {
                session_start();
                $_SESSION['error'] = "Datos de actualización incompletos. Asegúrate de rellenar el título y la descripción."; // Mensaje de error más específico
            }
        } else {
            // ... (manejo existente de GET para mostrar el formulario de edición) ...
            if (isset($_GET['id'])) {
                $id_rec = (int)$_GET['id'];
                $recompensa_a_editar = $this->recompensaModel->getRecompensaEventoById($id_rec);
                if (!$recompensa_a_editar) {
                    session_start();
                    $_SESSION['error'] = "Recompensa/Evento no encontrado.";
                    header('Location: index.php?action=gestionRecompensas');
                    exit();
                }
                require_once 'views/RecompensasEventos/form_editar_recompensa.php';
                return;
            } else {
                session_start();
                $_SESSION['error'] = "ID de recompensa/evento no proporcionado para edición.";
                header('Location: index.php?action=gestionRecompensas');
                exit();
            }
        }
        header('Location: index.php?action=gestionRecompensas');
        exit();
    }

    
    // --- Acción para eliminar una recompensa/evento ---
    public function eliminarRecompensas() { // Renombré para mayor claridad
        // Para DELETE, es común recibir el ID por GET
        if (isset($_GET['id'])) {
            $id_rec = (int)$_GET['id'];
            $success = $this->recompensaModel->deleteRecompensaEvento($id_rec);

            session_start();
            if ($success) {
                $_SESSION['mensaje'] = "Recompensa/Evento eliminado exitosamente.";
            } else {
                $_SESSION['error'] = "Error al eliminar la recompensa/evento.";
            }
        } else {
            session_start();
            $_SESSION['error'] = "ID de recompensa/evento no proporcionado para eliminar.";
        }

        header('Location: index.php?action=gestionRecompensas'); // Redirige después de la operación
        exit();
    }

    
    // --- Método para mostrar solo las recompensas activas (para los empleados) ---
    public function mostrarRecompensasActivas() {
        $recompensas_activas = $this->recompensaModel->obtenerTodasRecompensasEventos(true); // true para solo activos
        require_once 'views/RecompensasEventos/recompensas_empleados.php'; // Vista para empleados
    }
}