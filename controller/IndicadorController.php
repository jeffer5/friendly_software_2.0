<?php

require_once 'model/indicador.php';

class IndicadorController{
    private $indicador;

    public function __construct() {
        // Crear una instancia del modelo Usuario
        $this->indicador = new Indicador(); //Esto nos permite usar los métodos de Usuario dentro de este controlador.
    }


    public function mostrarIndicadores() {
      
        $indicadores = $this->indicador->getAllIndicadores();
        require_once 'views/Indicador/indicador.php'; // Pasar datos a la vista
    }


     public function buscarIndicadorId(){
        $indicadores = []; // Inicializamos como un array vacío
        $mensaje_error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $indicador_encontrado = $this->indicador->getIndicadorById($id);

            if ($indicador_encontrado) {
                // Si se encontró UN indicador, lo añadimos a un array para que la vista lo itere.
                $indicadores = [$indicador_encontrado];
            } else {
                $mensaje_error = "No se encontraron indicadores para el ID: $id";
            }
        } else {
            // Si no es una búsqueda específica, o si el ID está vacío, mostramos todos
            $indicadores = $this->indicador->getAllIndicadores();
        }

        require_once 'views/Indicador/indicador.php';
    }

    
    public function borrarIndicador($id) {
        $indicador = $this->indicador->delete($id);
        header('Location: index.php?action=mostrarIndicadores'); //pagina a donde envia el boton del formulario
        require_once 'views/Indicador/indicador.php'; // Pasar datos a la vista
    }

    
     public function updateIndicador() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recoger los datos del formulario (¡asegúrate de que los nombres de los inputs coincidan!)
            $id_ind = $_POST['id_ind'] ?? null;
            $can_rea = $_POST['can_rea'] ?? null;
            $tie_gas = $_POST['tie_gas'] ?? null;
            $fec_ind = $_POST['fec_ind'] ?? null;

            // Validar que los datos importantes no estén vacíos
            if ($id_ind !== null && $can_rea !== null && $tie_gas !== null && $fec_ind !== null) {
                $data = [
                    'can_rea' => $can_rea,
                    'tie_gas' => $tie_gas,
                    'fec_ind' => $fec_ind
                ];

                $resultado = $this->indicador->update($id_ind, $data);

                if ($resultado) {
                    // Si la actualización fue exitosa, redirigir a la vista principal
                    // Puedes añadir un mensaje de éxito con sesiones si quieres
                    header('Location: index.php?action=mostrarIndicadores');
                    exit();
                } else {
                    // Manejar error de actualización
                    echo "<script>alert('Error al actualizar el indicador. Por favor, intente de nuevo.'); window.location.href='index.php?action=mostrarIndicadores';</script>";
                }
            } else {
                // Datos incompletos
                echo "<script>alert('Datos incompletos para la actualización. Por favor, complete todos los campos.'); window.location.href='index.php?action=mostrarIndicadores';</script>";
            }
        } else {
            // Si no es una solicitud POST, redirigir o mostrar un error
            header('Location: index.php?action=mostrarIndicadores');
            exit();
        }
    }
    


}