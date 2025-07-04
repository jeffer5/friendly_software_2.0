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
    // Inicializamos $usuarios como un array vacío. Esto asegura que la vista siempre
    // tendrá una variable definida para trabajar, incluso si no se encuentran resultados.
    $usuarios = [];
    // Inicializamos una variable para almacenar cualquier mensaje de error que queramos mostrar en la vista.
    $mensaje_error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        // Llamamos al método del modelo para buscar por ID.
        // Asumimos que getById1 devuelve un array si encuentra un registro, o NULL/FALSE si no lo encuentra.
        $usuario_encontrado = $this->estandar->getById1($id);

        // Verificamos si se encontró un usuario específico por ID.
        if ($usuario_encontrado) {
            // Si se encontró, lo asignamos a $usuarios. Lo envolvemos en un array para que
            // tu vista pueda usar un bucle `foreach` de manera consistente, incluso para un solo resultado.
            $usuarios = [$usuario_encontrado];
        } else {
            // Si no se encontró el usuario, preparamos el mensaje de error.
            $mensaje_error = "No se encontró el usuario con ID: $id";
            // $usuarios permanece como un array vacío, lo que hará que la vista muestre "No se encontraron resultados".
        }
    } else {
        // Si no es una solicitud POST (ej. carga inicial de la página), obtenemos todos los usuarios.
        // Asumimos que getAll() devuelve un array (vacío o con datos).
        $usuarios = $this->estandar->getAll();
    }

    // La vista siempre se carga al final del controlador. Esto garantiza que la página
    // se renderice consistentemente con los datos y mensajes preparados.
    require_once 'views/Estandar/estandares.php';
}

}