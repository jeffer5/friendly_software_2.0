<?php
require_once 'controller/SupervisorController.php';
require_once 'controller/LoginController.php';
require_once 'controller/OrdenController.php';
require_once 'controller/EstandarController.php';
require_once 'controller/OrdenasigController.php';
require_once 'controller/OperarioController.php';


$action = isset($_GET['action']) ? $_GET['action'] : 'home';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$controller = new SupervisorController();
$loginController = new LoginController();
$ordenController = new OrdenController();
$estandarController = new EstandarController();
$ordenasigController = new OrdenasigController();
$operarioController = new OperarioController();



//acciones login
switch ($action) {
    case 'home':
        require 'views/home.php'; // Página de bienvenida
        break;
    case 'orden':
         session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
        require 'views/orden/principal.php';
        break;
    case 'login':
        $loginController->login();
        break;
    case 'logout':
        session_start();
        session_destroy();
        header('Location: index.php?action=home');
        exit;
        break;
    case 'unauthorized':
        require 'views/unauthorized.php';
        break;
    case 'supervisor_dashboard':
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
        require 'views/Usuarios/principal.php';
        break;
    case 'operario_dashboard':
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
        require 'views/Operario/principal.php';
        break;
    //acciones supervisor
    case 'index':
        $controller->index(); // Mostrar lista de usuarios
        break;
    case 'create':
        $controller->create(); // Formulario para crear operario
        break;
    case 'registrar':
        $controller->registrar(); // Formulario para crear supervisor
        break;
   
    case 'show':
        if ($id !== null) {
            $controller->show($id); // Ver usuario específico
        } else {
            echo "ID no proporcionado.";
        }
        break;
     case 'buscar':
        $controller->buscar(); // Formulario para actualizar
        break;
    case 'delete':
        if ($id !== null) {
            $controller->delete($id); // Eliminar usuario especifico
        } else {
            echo "ID no proporcionado.";
        }
        break;
    case 'editar':
        if ($id !== null) {
            $controller->editar($id); // cargar datos a actualizar
        } else {
            echo "ID no proporcionado.";
        }
        break;
    case 'update':
        $controller->update(); // Formulario para actualizar
        break;
    default:
        echo "Acción no válida.";
        break;
    //acciones orden
    case 'getAll':
        $ordenController->getAll(); // Mostrar lista de usuarios
        break;
    case 'mostrar':
        $ordenController->mostrar($id); // Mostrar lista de usuarios
        break;
    case 'crear':
        $ordenController->crear(); // Formulario para crear operario
        break; 
    case 'modificar':
        if ($id !== null) {
            $ordenController->modificar($id); // cargar datos a actualizar
        } else {
            echo "ID no proporcionado.";
        }   
        break; 
    case 'updateL':
        $ordenController->updateL(); // Formulario para actualizar
        break;
    case 'eliminar':
        if ($id !== null) {  
            $ordenController->eliminar($id); // Eliminar usuario especifico
        } else {
            echo "ID no proporcionado.";
        }
        break;
    case 'search':
        $ordenController->search(); // Formulario para actualizar
        break;
     //acciones estandar
    case 'todos':
        $estandarController->todos(); // Mostrar lista de usuarios
        break;
    case 'mos':
        $estandarController->mos($id); // Mostrar lista de usuarios
        break;
    case 'crearr':
        $estandarController->crearr(); // Formulario para crear operario
        break; 
    case 'modify':
        if ($id !== null) {
            $estandarController->modify($id); // cargar datos a actualizar
        } else {
            echo "ID no proporcionado.";
        }   
        break; 
    case 'updateLL':
        $estandarController->updateLL(); // Formulario para actualizar
        break;
    case 'elim':
        if ($id !== null) {  
           $estandarController->elim($id); // Eliminar usuario especifico
        } else {
            echo "ID no proporcionado.";
        }
        break;
    case 'searching':
        $estandarController->searching(); // Formulario para actualizar
        break;
    //acciones estandar
    /*case 'asignar':
        $ordenasigController->asignar(); 
        break;*/
    case 'asignarO':
        $ordenasigController->asignarO(); 
        break;
    case 'indexAsi':
          /*session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }*/
        $ordenasigController->indexAsi(); 
        break;    
    case 'buscaru':
        $ordenasigController->buscaru(); // Formulario para actualizar
        break;
    //acciones operario
    case 'getByidOpe':
          session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $operarioController->getByidOpe(); 
        break; 
    case 'getorden':
          session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $operarioController->getorden(); 
        break;
    case 'insertindi':
        $operarioController->insertindi(); // Formulario para actualizar
        break;
    case 'getindi':
        $operarioController->getindi(); // Formulario para actualizar
        break;
    case 'showindi':
        if ($id !== null) {
            $operarioController->showindi($id); // Ver usuario específico
        } else {
            echo "ID no proporcionado.";
        }
        break;
    case 'buscarindi':
        $operarioController->buscarindi(); // Formulario para actualizar
        break;


}

