
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
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];  // Obtener el ID del formulario
        $detalles = $this->ordenasig->getById1($id);  // Buscar el usuario por ID
        $usuarios = $this->ordenasig->showOpe();
        $ordenes =  $this->ordenasig->showOrd();

        // Verificar si se encontró el usuario
        if ($detalles) {
            // Usuario encontrado, pasamos los datos a la vista
            require_once 'views/Orden/asignar.php';  // O la vista que sea
        } else {
            // No se encontró el usuario con ese ID
            echo "No se encontró el usuario con ID: $id";

            require_once 'views/Orden/asignar.php';
            // Aquí podrías redirigir o mostrar un mensaje en la vista
        }
    } else {
        // Si no es un POST, mostrar todos los usuarios
        $detalles = $this->ordenasig->getAll();
        $usuarios = $this->ordenasig->showOpe();
        $ordenes =  $this->ordenasig->showOrd();
        require_once 'views/Orden/asignar.php';
    }
}





     public function eliminarOrdenAsignada($id) {
        $detalles = $this->ordenasig->delete($id);
        header('Location: index.php?action=indexAsi'); //pagina a donde envia el boton del formulario
        require_once 'views/Orden/ordenes.php'; // Pasar datos a la vista
    }




}
