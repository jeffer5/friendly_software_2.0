
<?php

require_once 'model/OrdenAsig.php';

class OrdenasigController{
        private $ordenasig;



    public function __construct(){

        $this->ordenasig = new OrdenAsig();
    }


    
    public function indexAsi() {
      
        $usuarios = $this->ordenasig->showOpe();
        $ordenes =  $this->ordenasig->showOrd();
        $detalles = $this->ordenasig->getAll();
       
        require_once 'views/Orden/asignar.php'; // Pasar datos a la vista
    }


    /*public function asignar(){
        require_once 'views/Orden/asignar.php'; // Pasar datos a la vista
    }*/


    public function asignarO(){

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        $data = [
            'id_usu_fk' => $_POST['usuario'],
            'id_ord_fk' => $_POST['nro_orden'],

        ];
         $this->ordenasig->asignarO($data);
         header('Location: index.php?action=indexAsi');
     }

        require_once 'views/Orden/asignar.php'; // Pasar datos a la vista
    }



    
    public function buscaru() {
    // Initialize $detalles to an empty array to ensure the view always has an iterable variable.
    // Also, initialize a message variable.
    $detalles = [];
    $mensaje_error = ''; // New variable to hold any error message

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $detalles_encontrados = $this->ordenasig->getById1($id); // This returns NULL if not found, or an array.

        // Check if a specific detail was found by ID
        if ($detalles_encontrados) {
            $detalles = $detalles_encontrados; // Assign the found detail
        } else {
            // If not found, set an error message
            $mensaje_error = "No se encontró el usuario con ID: $id";
            // $detalles remains an empty array, so the view's !empty($detalles) will trigger the "no results" message.
        }
    } else {
        // If not a POST request (initial load or no ID provided)
        $detalles = $this->ordenasig->getAll(); // This should return an array (empty or with data)
    }

    // Always load these for the view, regardless of whether an ID was searched.
    $usuarios = $this->ordenasig->showOpe();
    $ordenes = $this->ordenasig->showOrd();

    // The view is always loaded at the end to render the page based on the prepared variables.
    require_once 'views/Orden/asignar.php';
}





     public function eliminarOrdenAsignada($id) {
        $detalles = $this->ordenasig->delete($id);
        header('Location: index.php?action=indexAsi'); //pagina a donde envia el boton del formulario
        require_once 'views/Orden/ordenes.php'; // Pasar datos a la vista
    }




}
