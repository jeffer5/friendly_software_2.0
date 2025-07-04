<?php

require_once 'model/Orden.php';

class OrdenController{
    private $orden;

    public function __construct(){
        
        $this->orden = new Orden();

    }


    public function getAll(){

        $usuarios = $this->orden->getAll();
        require_once 'views/Orden/ordenes.php'; // Pasar datos a la vista

    }


    public function mostrar($id){

        $usuario = $this->orden->getById($id);
        require_once 'views/Orden/show.php'; // Pasar datos a la vista
    }


    public function crear(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $data = [
                'nro_ord' => $_POST['nro_ord'],
                'nom_cli' => $_POST['nom_cli'],
                'fec_ent' => $_POST['fec_ent'],
                'nom_pro' => $_POST['nom_pro'],
                'can_tot' => $_POST['can_tot'],
                'pro_ord' => $_POST['pro_ord'],
            
            ];
            $this->orden->create($data); // Llamar al modelo para crear el usuario
            header('Location: index.php?action=getAll'); //pagina a donde envia el boton del formulario

        }

        require_once 'views/Orden/create.php'; // Mostrar formulario para crear
    }


     public function modificar($id) {
        $usuario = $this->orden->getById($id);
        include 'views/Orden/update.php'; // Muestra el formulario
    }


    public function updateL() {
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $data = [

                'nro_ord' => $_POST['nro_ord2'],
                'nom_cli' => $_POST['nom_cli2'],
                'fec_ent' => $_POST['fec_ent2'],
                'nom_pro' => $_POST['nom_pro2'],
                'can_tot' => $_POST['can_tot2'],
                'pro_ord' => $_POST['pro_ord2'],
            ];

            $id = $_POST['id_ord'];
        
            $this->orden->update($id ,$data); // Llamar al modelo para crear el usuario
            header('Location: index.php?action=getAll'); //pagina a donde envia el boton del formulario
        
        }

        require_once 'views/Orden/update.php'; // Mostrar formulario para crear
    }


     public function eliminar($id) {
        $usuario = $this->orden->delete($id);
        header('Location: index.php?action=getAll'); //pagina a donde envia el boton del formulario
        require_once 'views/Orden/ordenes.php'; // Pasar datos a la vista
    }




    public function search() {
    // Inicializar $usuarios para que siempre tenga un valor definido
    $usuarios = []; // Por defecto, un array vacío

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $usuarios = $this->orden->getById($id); // getById retorna FALSE si no encuentra, o un array si lo encuentra

        // Si $usuarios es FALSE, lo convertimos a un array vacío para que la vista lo procese.
        if ($usuarios === false) {
            $usuarios = [];
            // Opcional: podrías poner aquí un mensaje de notificación si quieres,
            // pero la vista se encargará de "No se encontraron resultados".
            // echo "No se encontró el usuario con ID: $id";
        }
    } else {
        // Si no es un POST, mostrar todos los usuarios
        $usuarios = $this->orden->getAll(); // getAll debería retornar un array (vacío o con datos)
    }

    // La vista se carga SIEMPRE después de determinar el valor de $usuarios
    require_once 'views/Orden/ordenes.php';
}



}