<?php

    class Usuario{

        public $id    = null;
        public $nome  = null;
        public $email = null;
        public $senha = null;

        function __construct(){
            
        }

        function select($id = null, $nome = null, $email = null){
            $usuario = $_SESSION['usuario'];

            if($usuario['email'] == $email){
                $this->id    = $usuario['id'];
                $this->nome  = $usuario['nome'];
                $this->email = $usuario['email'];
                $this->senha = $usuario['senha'];
                return true;
            }else
                return false;
            
        }

        function insert(){
            $usuario = [];

            $usuario['id']    = $this->id;
            $usuario['nome']  = $this->nome;
            $usuario['email'] = $this->email;
            $usuario['senha'] = $this->senha;
            
            $_SESSION['usuario'] = $usuario;
        }

        function login($email, $senha){
            $emailExiste = $this->select('', '', $email);

            if(!$emailExiste)
                return "Email não está cadastrado";
            else{
                if($this->senha !== $senha)
                    return "Senha não corresponde";
                else
                    return "ok";
            }
        }
    }

?>