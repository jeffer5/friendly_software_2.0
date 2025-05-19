<?php
require_once 'model/UsuarioModel.php';

class LoginController{
    private $Login;

    public function __construct() {
        // Crear una instancia del modelo Usuario
        $this->Login = new UsuarioModel(); //Esto nos permite usar los métodos de Usuario dentro de este controlador.
    }



    public function login()
{
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usu_usu = $_POST['usu_usu'] ?? '';
        $pass_usu = $_POST['pass_usu'] ?? '';

        // Validar que los campos no estén vacíos
        if (empty($usu_usu) || empty($pass_usu)) {
            $error = 'Por favor, ingrese usuario y contraseña.';
            require 'views/login.php';
            return;
        }

        // Instanciar el modelo y buscar el usuario
        $usuarioModel = new UsuarioModel(); // Asegúrate de que la clase Usuario esté correctamente incluida
        $user = $usuarioModel->findUsu($usu_usu, $pass_usu);

        if ($user) {
            // Usuario autenticado, iniciar sesión
            $_SESSION['user'] = $user; //trae por medio del sesio a ['user'] el cual contiene los datos de mi consulta en UsuarioModel

           switch ($user['rol_usu']) { //compara $user con el rol correspondiente en la tabla
            case 'supervisor':
                header('Location: index.php?action=supervisor_dashboard');
                break;
            case 'operario':
                header('Location: index.php?action=operario_dashboard');
                break;
            default:
                header('Location: index.php?action=home');
                break;
        }
        exit();



           
        } else {
            // Credenciales inválidas
            $error = 'Usuario o contraseña incorrectos.';
            require 'views/login.php';
            return;
        }
    }

    // Mostrar el formulario de login si no se ha enviado el formulario
    require 'views/login.php';
}
       



}