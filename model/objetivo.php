<?php

    class Objetivo{

        public $id             = null;
        public $objetivo       = null;
        public $tempoResultado = null;

        function __construct(){
            
        }

        function select($id = null){
            if(!isset($_SESSION['objetivo'][$id]))
                exit;

            $objetivo = $_SESSION['objetivo'][$id];

            $this->id             = $objetivo['id'];
            $this->objetivo       = $objetivo['objetivo'];
            $this->tempoResultado = $objetivo['tempoResultado'];
        }

        function insert(){
            $objetivo = [];

            $id = 1;
            if(isset($_SESSION['objetivo']))
                $id = count($_SESSION['objetivo']) + 1;

            $objetivo['id']             = $id;
            $objetivo['objetivo']       = $this->objetivo;
            $objetivo['tempoResultado'] = $this->tempoResultado;
            
            $_SESSION['objetivo'][$id] = $objetivo;

            return $id;
        }

    }

?>