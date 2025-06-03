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


     public function insertindi(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $data = [
                'can_rea' => $_POST['can_rea'],
                'tie_gas' => $_POST['tie_gas'],
                'fec_ind' => $_POST['fec_ind'],
                'id_det_fk' => $_POST['id_det_fk'],
                'id_pro_fk' => $_POST['id_pro_fk'],
            
            ];
            $this->operario->insertindi($data); // Llamar al modelo para crear el usuario
           
            header('Location: index.php?action=getindi'); //pagina a donde envia el boton del formulario*/

        }

        
        require_once 'views/Operario/registro.php'; // Mostrar formulario para crear
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