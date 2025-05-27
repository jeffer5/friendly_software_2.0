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


    public function conOrd(){

        $nro_ord = $_REQUEST['orden'];

        $ordenes = $this->resultado->getAllbyOrd($nro_ord); 
        $orden = $this->resultado->getAllEfi();
        include 'views/Resultados/consultarOrd.php';

    
    }
   


  


}


    

    



