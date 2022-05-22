<?php

    class ResultadoChave{

        public $id            = null;
        public $objetivoId    = null;
        public $tipoObjetivo  = null;
        public $valorInicial  = null;
        public $valorFinal    = null;
        public $metrica       = null;

        function __construct(){
            
        }

        function select(){
            if(!isset($_SESSION['resultadoChave']))
                exit;

            $resultadoChave = $_SESSION['resultadoChave'];
            return $resultadoChave;
        }

        function insert(){

            $resultadoChave = [];

            $id = 1;
            if(isset($_SESSION['resultadoChave']))
                $id = count($_SESSION['resultadoChave']) + 1;

            $resultadoChave['id']           = $id;
            $resultadoChave['objetivoId']   = $this->objetivoId;
            $resultadoChave['tipoObjetivo'] = $this->tipoObjetivo;
            $resultadoChave['valorInicial'] = $this->valorInicial;
            $resultadoChave['valorFinal']   = $this->valorFinal;
            $resultadoChave['metrica']      = $this->metrica;
        
            $_SESSION['resultadoChave'][$id] = $resultadoChave; 

            return $id;           
            
        }
    }

?>