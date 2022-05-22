<?php
     if(!isset($_SESSION['usuario']))
          session_start();

     require_once '../model/usuario.php';

     $operacao = '';
     if(isset($_POST['operacao']))
          $operacao = $_POST['operacao'];
     
     $usuario = new Usuario();

     if(trim($operacao) == 'login'){
          $email = $_POST['email'];
          $senha = $_POST['senha'];

          if(!isset($_SESSION['usuario'])){
               echo "Usuário não está cadastrado";
               exit;
          }

          $resultado = $usuario->login(trim($email), trim($senha));

          if(!$resultado)
               $resultado = "Erro ao tentar fazer login";

           echo $resultado;
     }else{          
          $usuario->nome  = 1;
          $usuario->nome  = trim($_POST['nome']);
          $usuario->email = trim($_POST['email']);
          $usuario->senha = trim($_POST['senha']);

          $usuario->insert();

          echo "Cadastro Sucesso!";
     }

?>