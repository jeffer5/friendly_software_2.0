<?php
require_once 'model/Supervisor.php';


class SupervisorController {
    private $supervisor;

    public function __construct() {
        // Crear una instancia del modelo Usuario
        $this->supervisor = new Supervisor(); //Esto nos permite usar los métodos de Usuario dentro de este controlador.
    }

    // Mostrar todos los usuarios
    public function index() {
      
        $usuarios = $this->supervisor->getAll();
        require_once 'views/usuarios/index.php'; // Pasar datos a la vista
    }

    // Mostrar un solo usuario
    public function show($id) {
        
        $usuario = $this->supervisor->getById($id);
        require_once 'views/usuarios/show.php'; // Pasar datos a la vista
    }

    // Crear un nuevo usuario
    public function create() {
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fotoNombre = null;
        
            if (isset($_FILES['fot_usu']) && $_FILES['fot_usu']['error'] == 0) {
                $fotoNombre = time() . '_' . $_FILES['fot_usu']['name']; // nombre único
                move_uploaded_file($_FILES['fot_usu']['tmp_name'], 'uploads/' . $fotoNombre);
            }
        
            $data = [
                'nom_usu' => $_POST['nom_usu'],
                'ape_usu' => $_POST['ape_usu'],
                'tdo_usu' => $_POST['tdo_usu'],
                'ndo_usu' => $_POST['ndo_usu'],
                'tel_usu' => $_POST['tel_usu'],
                'usu_usu' => $_POST['usu_usu'],
                'pass_usu' => $_POST['pass_usu'],
                'rol_usu' => $_POST['rol_usu'],
                'fot_usu' => $fotoNombre
            ];
        
            $this->supervisor->create($data); // Llamar al modelo para crear el usuario
            header('Location: index.php?action=index'); //pagina a donde envia el boton del formulario
        
        }

        require_once 'views/usuarios/create.php'; // Mostrar formulario para crear
    }



    // Crear un nuevo supervisor
    public function registrar() {
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fotoNombre = null;
        
            if (isset($_FILES['fot_usu']) && $_FILES['fot_usu']['error'] == 0) {
                $fotoNombre = time() . '_' . $_FILES['fot_usu']['name']; // nombre único
                move_uploaded_file($_FILES['fot_usu']['tmp_name'], 'uploads/' . $fotoNombre);
            }
        
            $data = [
                'nom_usu' => $_POST['nom_usu'],
                'ape_usu' => $_POST['ape_usu'],
                'tdo_usu' => $_POST['tdo_usu'],
                'ndo_usu' => $_POST['ndo_usu'],
                'tel_usu' => $_POST['tel_usu'],
                'usu_usu' => $_POST['usu_usu'],
                'pass_usu' => $_POST['pass_usu'],
                'rol_usu' => $_POST['rol_usu'],
                'fot_usu' => $fotoNombre
            ];
        
            $this->supervisor->create($data); // Llamar al modelo para crear el usuario

            session_start();
            $_SESSION['mensaje'] = '¡Registro exitoso!';
            header('Location: views/home.php');
            exit;

            header('Location: index.php?action=home');
        
        }

        require_once 'views/Registro/registrar.php'; // Mostrar formulario para crear
    }
    
    public function editar($id) {
        $usuario = $this->supervisor->getById($id);
        include 'views/Usuarios/update.php'; // Muestra el formulario
    }



    // Crear un nuevo usuario
    public function update() {
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fotoNombre = null;

            if (isset($_FILES['fot_usu']) && $_FILES['fot_usu']['error'] == 0) {
                $fotoNombre = time() . '_' . $_FILES['fot_usu']['name']; // nombre único
                move_uploaded_file($_FILES['fot_usu']['tmp_name'], 'uploads/' . $fotoNombre);
            }
            
            $data = [

                'nom_usu' => $_POST['nom_usu2'],
                'ape_usu' => $_POST['ape_usu2'],
                'tdo_usu' => $_POST['tdo_usu2'],
                'ndo_usu' => $_POST['ndo_usu2'],
                'tel_usu' => $_POST['tel_usu2'],
                'usu_usu' => $_POST['usu_usu2'],
                'rol_usu' => $_POST['rol_usu2'],
                'fot_usu' => $fotoNombre
            ];

            $id = $_POST['id_usu'];
        
            $this->supervisor->update($id ,$data); // Llamar al modelo para crear el usuario
            header('Location: index.php?action=index'); //pagina a donde envia el boton del formulario
        
        }

        require_once 'views/usuarios/update.php'; // Mostrar formulario para crear
    }
    
    
     public function delete($id) {
        $usuario = $this->supervisor->delete($id);
        header('Location: index.php?action=index'); //pagina a donde envia el boton del formulario
        require_once 'views/usuarios/index.php'; // Pasar datos a la vista
    }


    public function buscar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];  // Obtener el ID del formulario
        $usuarios = $this->supervisor->getById1($id);  // Buscar el usuario por ID

        // Verificar si se encontró el usuario
        if ($usuarios) {
            // Usuario encontrado, pasamos los datos a la vista
            require_once 'views/usuarios/index.php';  // O la vista que sea
        } else {
            // No se encontró el usuario con ese ID
            echo "No se encontró el usuario con ID: $id";
            // Aquí podrías redirigir o mostrar un mensaje en la vista
        }
    } else {
        // Si no es un POST, mostrar todos los usuarios
        $usuarios = $this->supervisor->getAll();
        require_once 'views/usuarios/index.php';
    }
}



}   