<?php

require_once 'vendor/autoload.php'; 


require_once 'controller/SupervisorController.php';
require_once 'controller/LoginController.php';
require_once 'controller/OrdenController.php';
require_once 'controller/EstandarController.php';
require_once 'controller/OrdenasigController.php';
require_once 'controller/OperarioController.php';
require_once 'controller/ResultadoController.php';
require_once 'controller/RecompensaController.php';
require_once 'controller/IndicadorController.php';




$action = isset($_GET['action']) ? $_GET['action'] : 'home';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$controller = new SupervisorController();
$loginController = new LoginController();
$ordenController = new OrdenController();
$estandarController = new EstandarController();
$ordenasigController = new OrdenasigController();
$operarioController = new OperarioController();
$resultadoController = new ResultadoController();
$recompensaController = new RecompensaController();
$indicadorController = new IndicadorController();




//acciones login
switch ($action) {
    case 'home':
        require 'views/home.php'; // Página de bienvenida
        break;
    case 'cerrarSesion':
        session_start();
        session_destroy();

        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
        header("Pragma: no-cache"); // HTTP 1.0.
        header("Expires: 0"); // Proxies.

        require 'views/cerrar_sesion.php'; // Página de bienvenida
        break;
    case 'nosotros':
        require 'views/nosotros.php'; // Página de bienvenida
        break;
    case 'creadores':
        require 'views/creadores.php'; // Página de bienvenida
        break;
    case 'orden':
        require 'views/orden/principal.php';
        break;
    case 'login':
        $loginController->login();
        break;
    case 'logout':
        session_start();
        session_destroy();

        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
        header("Pragma: no-cache"); // HTTP 1.0.
        header("Expires: 0"); // Proxies.
        header('Location: index.php?action=cerrarSesion');
        
        exit;
        break;
    case 'unauthorized':
        require 'views/unauthorized.php';
        break;
    case 'supervisor_dashboard':
        session_start();

        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
        header("Pragma: no-cache"); // HTTP 1.0.
        header("Expires: 0"); // Proxies.

        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=home");
            exit;
        }
        require 'views/Usuarios/principal.php';
        break;
    case 'operario_dashboard':
        session_start();

        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
        header("Pragma: no-cache"); // HTTP 1.0.
        header("Expires: 0"); // Proxies.

        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=home");
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
    case 'eliminarOrdenAsignada':
        if ($id !== null) {  
            $ordenasigController->eliminarOrdenAsignada($id); // Eliminar usuario especifico
        } else {
            echo "ID no proporcionado.";
        }
        break;




    //acciones operario
    case 'getByidOpe':
          session_start();

        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
        header("Pragma: no-cache"); // HTTP 1.0.
        header("Expires: 0"); // Proxies.

        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=home");
            exit;
        }
        $operarioController->getByidOpe(); 
        break; 
    case 'getorden':
        session_start();

        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
        header("Pragma: no-cache"); // HTTP 1.0.
        header("Expires: 0"); // Proxies.

         if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=home");
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
    case 'addefi':
        $operarioController->addefi($id); // Formulario para actualizar
        break;
    case 'corregir':
        if ($id !== null) {
            $operarioController->corregir($id); // cargar datos a actualizar
        } else {
            echo "ID no proporcionado.";
        }
        break;
   case 'updateindi':
        if ($id !== null) {
            $ordenController->updateindi($id); // cargar datos a actualizar
        } else {
            echo "ID no proporcionado.";
        }   
        break; 

        
    //acciones resultado
    case 'principal':
         session_start();

        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
        header("Pragma: no-cache"); // HTTP 1.0.
        header("Expires: 0"); // Proxies.

        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=home");
            exit;
        }
        require 'views/Resultados/principal.php';
        break;
    case 'showAllEfi':
        $resultadoController->showAllEfi();
        break;
    case 'conUsu':
        $resultadoController->conUsu();
        break;
    case 'conUsu2':
        $resultadoController->conUsu2();
        break;
     case 'conOrd1':
        $resultadoController->conOrd1();
        break;
    case 'conOrd':
        $resultadoController->conOrd();
        break;
    case 'conByData':
        $resultadoController->conByData();
        break;
    case 'conByData2':
        $resultadoController->conByData2();
        break;
    case 'ranking':
        $resultadoController->rankingUser();
        break;

    // recompensa
    case 'gestionRecompensas': // Acción para mostrar el formulario y la tabla de gestión
        $recompensaController->mostrarFormularioYLista();
        break;
    case 'guardarRecompensaEvento': // Acción para procesar la creación (formulario POST)
        $recompensaController->guardarRecompensaEvento();
        break;
    case 'editarRecompensa': // Acción para cargar el formulario de edición (con ID por GET)
        if ($id !== null) {
            $recompensaController->actualizarRecompensas(); // Este método manejará GET para el formulario
        } else {
            // Manejar error si no hay ID
            session_start();
            $_SESSION['error'] = "ID de recompensa/evento no proporcionado para edición.";
            header('Location: index.php?action=gestionRecompensas');
            exit();
        }
        break;
    case 'actualizarRecompensaEvento': // Acción para procesar la actualización (formulario POST)
        $recompensaController->actualizarRecompensas(); // Este método manejará POST para la actualización
        break;
    case 'eliminarRecompensa': // Acción para eliminar (con ID por GET)
        if ($id !== null) {
            $recompensaController->eliminarRecompensas();
        } else {
            // Manejar error si no hay ID
            session_start();
            $_SESSION['error'] = "ID de recompensa/evento no proporcionado para eliminar.";
            header('Location: index.php?action=gestionRecompensas');
            exit();
        }
        break;
    case 'verRecompensasEmpleados': // Nueva acción para la vista de empleados (solo activos)
        $recompensaController->mostrarRecompensasActivas();
        break;
 
 // forgot password

     case 'showForgotPasswordForm':
        $loginController->showForgotPasswordForm();
        break;
    case 'sendResetLink': // Este es el POST del formulario de forgot_password.php
        $loginController->sendResetLink();
        break;
    case 'showResetForm': // Este es el GET cuando el usuario hace clic en el enlace del correo
        $loginController->showResetForm();
        break;
    case 'updatePassword': // Este es el POST del formulario de reset_password.php
        $loginController->updatePassword();
        break;
    
    //indicador controller
    case 'mostrarIndicadores':
        $indicadorController->mostrarIndicadores();
        break;
    case 'buscarIndicadorId':
        $indicadorController->buscarIndicadorId();
        break;
     case 'borrarIndicador':
        // Aquí obtén el ID de $_GET directamente
        if (isset($_GET['id'])) {   
            $indicadorController->borrarIndicador($_GET['id']); // Eliminar usuario especifico
        } else {
            echo "ID no proporcionado.";
        }
        break;
    
    case 'updateIndicador': // ¡NUEVO! Manejar actualización de Indicador
        $indicadorController->updateIndicador(); // Este método ya no necesita el ID por GET
        break;


}

