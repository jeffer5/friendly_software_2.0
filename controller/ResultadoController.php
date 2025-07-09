<?php

require_once 'model/Resultado.php';

class ResultadoController{
    private $resultado;


    public function __construct(){
        $this->resultado = new Resultado;
        
    }


    public function showAllEfi(){

        $todos = $this->resultado->getAllEfi();
        require_once 'views/Resultados/showEfi.php';
    }


    public function conUsu(){

       
         $usuarios = $this->resultado->getAllEfi();
         require_once 'views/Resultados/consultarUsu.php';    
        

    }


    public function conUsu2(){

        $id_usu = $_REQUEST['usuario'];

        $usuarioes = $this->resultado->getAllbyUsu($id_usu); 
        $usuarios = $this->resultado->getAllEfi();
        include 'views/Resultados/consultarUsu.php';

    
    }

    public function conOrd1(){

       
         $orden = $this->resultado->getAllEfi();
         require_once 'views/Resultados/consultarOrd.php';    
        

    }

    public function conByData(){

       
         $orden = $this->resultado->getAllEfi();
         require_once 'views/Resultados/consultarDat.php';    
        

    }

    public function conByData2(){

        $fecha1 = $_REQUEST['fecha1'];
        $fecha2 = $_REQUEST['fecha2'];
       
         $ordenes = $this->resultado->conData($fecha1, $fecha2); 
         $orden = $this->resultado->getAllEfi();
         require_once 'views/Resultados/consultarDat.php';    
        

    }



    public function conOrd(){

        $nro_ord = $_REQUEST['orden'];

        $ordenes = $this->resultado->getAllbyOrd($nro_ord); 
        $orden = $this->resultado->getAllEfi();
        include 'views/Resultados/consultarOrd.php';

    
    }


   public function rankingUser(){
        $fecha1 = null; // Inicializa las variables a null
        $fecha2 = null;

        // Verifica si las fechas han sido enviadas por POST
        if (isset($_POST['fecha1']) && isset($_POST['fecha2'])) {
            $fecha1 = $_POST['fecha1'];
            $fecha2 = $_POST['fecha2'];

            // Solo llama a la función de ranking si las fechas están definidas
            $ranking_operarios = $this->resultado->getRankingByOrdersCompleted($fecha1, $fecha2);
        } else {
            // Si las fechas no se han enviado, el ranking estará vacío inicialmente
            $ranking_operarios = [];
        }

        // Si aún necesitas estas variables para la tabla detallada o algo más:
        // $ordenes = []; // Inicializa a vacío si no hay fechas seleccionadas
        // if ($fecha1 && $fecha2) {
        //     $ordenes = $this->resultado->conData($fecha1, $fecha2);
        // }
        
        require_once 'views/Resultados/ranking.php';
    }
   


  


}


    

    



