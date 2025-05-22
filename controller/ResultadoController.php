<?php

require_once 'model/Resultado.php';

class ResultadoController{
    private $resultado;


    public function __construct(){
        $this->resultado = new Resultado;
        
    }


    public function showOpe(){

        $todos = $this->resultado->getAllEfi();
        require_once 'views/Resultados/principal.php';
    }
    



}