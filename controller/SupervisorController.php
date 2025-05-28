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
    // Verificar si el formulario fue enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener el nombre de usuario y el número de documento del formulario
        $usu_usu = $_POST['usu_usu'];
        $ndo_usu = $_POST['ndo_usu'];


        // Verificar si el usuario ya existe en la base de datos
        $existingUser = $this->supervisor->existeUsuario($usu_usu, $ndo_usu);


        if ($existingUser) {
            // Si el usuario ya existe, mostrar un mensaje de error y redirigir
            session_start();
            $_SESSION['mensaje'] = 'El nombre de usuario o el número de documento ya están registrados. Por favor, elija otros.';
            header('Location: index.php?action=index'); // Redirigir al formulario de registro
            exit; // Detener la ejecución
        }

        // Si el usuario no existe, proceder con el registro
        $fotoNombre = null;

        // Verificar si se ha subido una foto
        if (isset($_FILES['fot_usu']) && $_FILES['fot_usu']['error'] == 0) {
            $fotoNombre = time() . '_' . $_FILES['fot_usu']['name']; // Generar nombre único para la foto
            move_uploaded_file($_FILES['fot_usu']['tmp_name'], 'uploads/' . $fotoNombre); // Guardar la foto en el servidor
        }

        // Preparar los datos del nuevo usuario
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

        // Llamar al modelo para crear el usuario
        $this->supervisor->create($data);

        // Redirigir al usuario a la página de inicio o a una página de éxito
        header('Location: index.php?action=index'); // Cambiar la ruta si es necesario
        exit; // Detener la ejecución para evitar que siga ejecutando el resto del código
    }

    // Mostrar el formulario de registro
    require_once 'views/usuarios/create.php';
    }




    // Crear un nuevo supervisor
    public function registrar() {
        
       
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the username from the form
        $usu_usu = $_POST['usu_usu'];
        $ndo_usu = $_POST['ndo_usu'];

        // Check if the username already exists in the database
        $existingUser = $this->supervisor->existeUsuario($usu_usu, $ndo_usu);
        
        if ($existingUser) {
            // If the user exists, show an error message and prevent registration
            session_start();
            $_SESSION['mensaje'] = 'El nombre de usuario ya está registrado, por favor elija otro.';
            header('Location: index.php?action=home'); // Redirect back to the registration page
            exit;
        }

        // If no existing user, proceed with file upload
        $fotoNombre = null;
        if (isset($_FILES['fot_usu']) && $_FILES['fot_usu']['error'] == 0) {
            $fotoNombre = time() . '_' . $_FILES['fot_usu']['name']; // nombre único
            move_uploaded_file($_FILES['fot_usu']['tmp_name'], 'uploads/' . $fotoNombre);
        }

        // Prepare the data for the new user
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

        // Call the model to create the user
        $this->supervisor->create($data);

        // Set session message for successful registration
        session_start();
        $_SESSION['mensaje'] = '¡Registro exitoso!';
        header('Location: index.php?action=home'); // Redirect to home page
        exit;
    }

    // Display the registration form
    require_once 'views/Registro/registrar.php';
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