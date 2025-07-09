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
    public function actualizarRecompensas() { // Renombré para mayor claridad
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asegúrate de que todos los campos esperados estén presentes
            if (isset($_POST['id_rec'], $_POST['titulo'], $_POST['descripcion'], $_POST['activo'])) {
                $id_rec = (int)$_POST['id_rec']; // Castear a int
                $titulo = trim($_POST['titulo']);
                $descripcion = trim($_POST['descripcion']);
                // Los checkboxes solo se envían si están marcados. Si no está marcado, $_POST['activo'] no existirá o será 'off'.
                // Convertir a booleano: '1' para true, '0' o no presente para false.
                $activo = (isset($_POST['activo']) && $_POST['activo'] == '1') ? true : false;

                $success = $this->recompensaModel->updateRecompensaEvento($id_rec, $titulo, $descripcion, $activo);

                session_start();
                if ($success) {
                    $_SESSION['mensaje'] = "Recompensa/Evento actualizado exitosamente.";
                } else {
                    $_SESSION['error'] = "Error al actualizar la recompensa/evento.";
                }
            } else {
                session_start();
                $_SESSION['error'] = "Datos de actualización incompletos.";
            }
        } else {
            // Si no es POST, significa que se está pidiendo el formulario de edición
            // Necesitarás un ID para cargar los datos en el formulario
            if (isset($_GET['id'])) {
                $id_rec = (int)$_GET['id'];
                $recompensa_a_editar = $this->recompensaModel->getRecompensaEventoById($id_rec);
                if (!$recompensa_a_editar) {
                    session_start();
                    $_SESSION['error'] = "Recompensa/Evento no encontrado.";
                    header('Location: index.php?action=gestionRecompensas'); // Redirige si no encuentra
                    exit();
                }
                // Carga la vista del formulario de edición. Podría ser una vista dedicada o la misma de gestión
                require_once 'views/RecompensasEventos/form_editar_recompensa.php'; // Necesitas crear esta vista
                return; // Importante para no cargar otra vista
            } else {
                session_start();
                $_SESSION['error'] = "ID de recompensa/evento no proporcionado para edición.";
                header('Location: index.php?action=gestionRecompensas');
                exit();
            }
        }
        header('Location: index.php?action=gestionRecompensas'); // Redirige después de POST o si algo falla
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