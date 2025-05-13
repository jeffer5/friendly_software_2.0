<?php

require_once 'model/Estandar.php';

class EstandarController{
        private $estandar;

    public function __construct(){

        $this->estandar = new Estandar();
    }


    public function todos() {
      
        $usuarios = $this->estandar->getAll();
        require_once 'views/Estandar/Estandares.php'; // Pasar datos a la vista
    }


    public function mos($id) {
        
        $usuario = $this->estandar->getById($id);
        require_once 'views/Estandar/show.php'; // Pasar datos a la vista
    }


     public function crearr(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $data = [
                'pro_pro' => $_POST['pro_pro'],
                'act_pro' => $_POST['act_pro'],
                'can_pro' => $_POST['can_pro'],
                'tie_pro' => $_POST['tie_pro'],
            
            ];
            $this->estandar->create($data); // Llamar al modelo para crear el usuario
            header('Location: index.php?action=todos'); //pagina a donde envia el boton del formulario

        }

        require_once 'views/Estandar/create.php'; // Mostrar formulario para crear
    }



    public function modify($id) {
        $usuario = $this->estandar->getById($id);
        include 'views/Estandar/update.php'; // Muestra el formulario
    }


    public function updateLL() {
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $data = [

                'pro_pro' => $_POST['pro_pro2'],
                'act_pro' => $_POST['act_pro2'],
                'can_pro' => $_POST['can_pro2'],
                'tie_pro' => $_POST['tie_pro2'],
            ];

            $id = $_POST['id_pro'];
        
            $this->estandar->update($id ,$data); // Llamar al modelo para crear el usuario
            header('Location: index.php?action=todos'); //pagina a donde envia el boton del formulario
        
        }

        require_once 'views/Estandar/update.php'; // Mostrar formulario para crear
    }


    
     public function elim($id) {
        $usuario = $this->estandar->delete($id);
        header('Location: index.php?action=todos'); //pagina a donde envia el boton del formulario
        require_once 'views/Estandar/estandares.php'; // Pasar datos a la vista
    }


 public function searching() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];  // Obtener el ID del formulario
        $usuarios = $this->estandar->getById1($id);  // Buscar el usuario por ID

        // Verificar si se encontró el usuario
        if ($usuarios) {
            // Usuario encontrado, pasamos los datos a la vista
            require_once 'views/Estandar/estandares.php';  // O la vista que sea
        } else {
            // No se encontró el usuario con ese ID
            echo "No se encontró el usuario con ID: $id";
            // Aquí podrías redirigir o mostrar un mensaje en la vista
        }
    } else {
        // Si no es un POST, mostrar todos los usuarios
        $usuarios = $this->estandar->getAll();
        require_once 'views/Estandar/estandares.php';
    }
}

}