<?php

require_once 'model/Operario.php';

class OperarioController{
    private $operario;


    public function __construct(){
        $this->operario = new Operario();
        
    }

    
    public function getByidOpe(){

       $user = $_SESSION['user'];
       $usu_usu =($user['usu_usu']);

        $detalles = $this->operario->getByid($usu_usu);
        require_once 'views/Operario/ordenasig.php';
    }



    public function getorden(){

       $user = $_SESSION['user'];
       $usu_usu =($user['usu_usu']);

        $orden = $this->operario->getByid($usu_usu);
        $promedios = $this->operario->getprom();
        
        require_once 'views/Operario/registro.php';
    }


    public function addefi($id) {
    session_start();
    $indicadors = $this->operario->getindi2($id);

    // Banderas para controlar los mensajes
    $registro_exitoso = false; // Se activa si al menos un registro fue exitoso
    $eficiencia_ya_cargada = false; // Se activa si al menos una eficiencia ya estaba cargada
    $eficiencia_demasiado_alta = false; // Se activa si al menos una eficiencia es > 100%
    $id_indicador_registrado = null; // Para guardar el ID si hay un registro exitoso

    foreach ($indicadors as $item) {
        if ($item['nom_pro'] == $item['pro_pro'] && $item['pro_ord'] == $item['act_pro']) {

            // Prevenir división por cero
            if ($item['tie_pro'] == 0 || $item['tie_gas'] == 0) {
                // Puedes agregar un mensaje de error específico para esto si quieres,
                // o simplemente saltar este elemento como lo hacemos aquí.
                continue; // Pasa al siguiente elemento en el bucle
            }

            $estandarMinuto = $item['can_pro'] / $item['tie_pro'];
            $realMinuto = $item['can_rea'] / $item['tie_gas'];

            $estandarMinuto = round($estandarMinuto, 2);
            $realMinuto = round($realMinuto, 2);

            // Prevenir división por cero si estandarMinuto es 0
            if ($estandarMinuto == 0) {
                continue; // Pasa al siguiente elemento
            }

            $tot_efi = ($realMinuto / $estandarMinuto) * 100;
            $tot_efi = round($tot_efi, 2);

            $id_ind_fk = $item['id_ind'];

            if ($tot_efi <= 100) {
                // Verificamos si ya existe antes de insertar
                if (!$this->operario->existeEficiencia($id_ind_fk)) {
                    $this->operario->insertefi([
                        'id_ind_fk' => $id_ind_fk,
                        'tot_efi' => $tot_efi
                    ]);
                    $registro_exitoso = true; // Marcamos que hubo un registro exitoso
                    $id_indicador_registrado = $id_ind_fk; // Guardamos el ID del último registrado (o el que sea necesario para el color)
                } else {
                    $eficiencia_ya_cargada = true; // Marcamos que una eficiencia ya estaba cargada
                }
            } else {
                $eficiencia_demasiado_alta = true; // Marcamos que una eficiencia fue > 100%
            }
        }
    }

  
    ## Estableciendo los mensajes y redirigiendo

    if ($registro_exitoso) {
        $_SESSION['mensaje'] = '¡Eficiencia registrada exitosamente!';
        $_SESSION['id_indicador_cambiar_color'] = $id_indicador_registrado;
    } elseif ($eficiencia_ya_cargada && !$registro_exitoso) {
        // Si no se registró nada nuevo, pero encontramos una eficiencia ya cargada
        $_SESSION['mensa'] = 'eficiencia ya cargada.';
    } elseif ($eficiencia_demasiado_alta && !$registro_exitoso && !$eficiencia_ya_cargada) {
        // Si no se registró nada nuevo y no había nada ya cargado, pero alguna fue muy alta
        $_SESSION['mensa'] = 'No se realizó el registro porque la eficiencia supera el 100%.';
    } else {
        // Este caso capturará situaciones donde no hubo indicadores válidos,
        // o ninguna de las condiciones anteriores se cumplió.
        $_SESSION['mensa'] = 'No se encontraron indicadores válidos para registrar o no se realizó ninguna acción.';
    }

    header('Location: index.php?action=getindi');
    exit(); // ¡Importante! Siempre salir después de una redirección
}
    




     public function insertindi() {
        session_start();
    $nro_ord = $_POST['nro_ord'];
    $pro_ord = $_POST['pro_ord'];
    $can_tot = $_POST['can_tot'];
    $can_rea = $_POST['can_rea']; // This is the quantity the user is currently trying to register

    // Get previously recorded quantities for this order and process
    $verify = $this->operario->verifyCan($nro_ord, $pro_ord);
    $suma = 0;

    foreach ($verify as $item) {
        $suma += $item['can_rea'];
    }


    // Calculate what the total would be if the current submission is added
    $total = $suma + $can_rea;

    // Check if the total (existing + new) would exceed the allowed total
    if ($total <= $can_tot) {
        // Condition met: it's safe to insert

        // Ensure it's a POST request for security and proper handling
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'can_rea' => $can_rea, // Use the current submission's quantity
                'tie_gas' => $_POST['tie_gas'],
                'fec_ind' => $_POST['fec_ind'],
                'id_det_fk' => $_POST['id_det_fk'],
                'id_pro_fk' => $_POST['id_pro_fk'],
            ];

            // Perform the insertion
            $this->operario->insertindi($data);

            // Redirect after successful insertion
            header('Location: index.php?action=getindi');
            exit; // Crucial: terminate script after redirect
        }
    } else {
       
        $_SESSION['error'] = 'ERROR: La cantidad a registrar ('.$can_rea.') junto con las cantidades ya registradas ('.$suma.') exceden la cantidad total permitida ('.$can_tot.'), no se pudo registrar el indicador';
        header('Location: index.php?action=getindi');
        exit;
    }

    require_once 'views/Operario/registro.php';
    }
    
    

    public function getindi(){

        $indicadores = $this->operario->getindi();
        
        require_once 'views/Operario/verindicador.php';
    }



    public function showindi($id){

        $indicador = $this->operario->showindi($id);


        require_once 'views/Operario/show.php'; // Pasar datos a la vista
    }



    public function buscarindi() {
    // Inicializamos $indicadores como un array vacío. Esto garantiza que la vista
    // siempre tendrá una variable definida para trabajar, incluso si no hay resultados.
    $indicadores = [];
    // Inicializamos una variable para almacenar cualquier mensaje de error.
    $mensaje_error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        // Llamamos al método del modelo para buscar los indicadores.
        // Asumimos que showindi devuelve un array si encuentra, o NULL/FALSE si no.
        $indicadores_encontrados = $this->operario->showindi($id);

        // Verificamos si se encontraron indicadores para el ID proporcionado.
        if ($indicadores_encontrados) {
            // Si se encontraron, los asignamos.
            // Si showindi puede devolver múltiples indicadores para un ID,
            // asegúrate de que $indicadores_encontrados ya sea un array de arrays.
            // Si devuelve un solo array asociativo, y tu vista usa foreach,
            // deberías envolverlo en un array: $indicadores = [$indicadores_encontrados];
            $indicadores = $indicadores_encontrados;
        } else {
            // Si no se encontraron indicadores, preparamos el mensaje de error.
            $mensaje_error = "No se encontraron indicadores para el ID: $id";
            // $indicadores permanece como un array vacío, lo que hará que la vista
            // muestre "No se encontraron resultados" si no hay otros indicadores.
        }
    } else {
        // Si no es una solicitud POST (ej. carga inicial), obtenemos todos los indicadores.
        // Asumimos que getindi() devuelve un array (vacío o con datos).
        $indicadores = $this->operario->getindi();
    }

    // La vista siempre se carga al final. Esto asegura que la página se renderice
    // consistentemente con los datos y mensajes preparados.
    require_once 'views/Operario/verindicador.php';
}






}