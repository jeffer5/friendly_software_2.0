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
   


  


}


    

    



