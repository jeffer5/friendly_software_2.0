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

        $orden = $this->operario->getorden($usu_usu);
        $promedios = $this->operario->getprom();
        
        require_once 'views/Operario/registro.php';
    }


    public function addefi($id){
        session_start();
        $indicadors = $this->operario->getindi2($id);
        
            foreach($indicadors as $item){
            if ($item['nom_pro'] == $item['pro_pro'] && $item['pro_ord'] == $item['act_pro']) {

                $estandarMinuto = $item['can_pro'] / $item['tie_pro'];
                $realMinuto = $item['can_rea'] / $item['tie_gas'];

                $estandarMinuto = round($estandarMinuto, 2);
                $realMinuto = round($realMinuto, 2);

                $tot_efi = ($realMinuto / $estandarMinuto) * 100;
                $tot_efi = round($tot_efi, 2); 
   
                if($tot_efi <=100 ){

                    $id_ind_fk = $item['id_ind'];

                    // Verificamos si ya existe antes de insertar
                    if (!$this->operario->existeEficiencia($id_ind_fk)) {
                        $this->operario->insertefi([
                            'id_ind_fk' => $id_ind_fk,
                            'tot_efi' => $tot_efi
                        ]);
                        $registro_exitoso = true;
                    }
                }

            } 
            
        }

        if ($registro_exitoso) {
        $_SESSION['mensaje'] = '¡Eficiencia registrada!';
        header('Location: index.php?action=getindi');
        } else {
            $_SESSION['mensa'] = 'No se registró ninguna eficiencia';
            header('Location: index.php?action=getindi');
        }

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
        // Condition not met: the new quantity would exceed the total allowed
        //echo "<script>alert('ERROR: La cantidad a registrar (".$can_rea.") junto con las cantidades ya registradas (".$suma.") exceden la cantidad total permitida (".$can_tot.").'); window.history.back();</script>";
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
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];  // Obtener el ID del formulario
        $indicadores = $this->operario->showindi($id);  // Buscar el usuario por ID

        // Verificar si se encontró el usuario
        if ($indicadores) {
            // Usuario encontrado, pasamos los datos a la vista
            require_once 'views/Operario/verindicador.php';  // O la vista que sea
        } else {
            // No se encontró el usuario con ese ID
            echo "No se encontró el usuario con ID: $id";
            // Aquí podrías redirigir o mostrar un mensaje en la vista
        }
    } else {
        // Si no es un POST, mostrar todos los usuarios
        $indicadores = $this->operario->getindi();
        require_once 'views/Operario/verindicador.php';
    }
}




}