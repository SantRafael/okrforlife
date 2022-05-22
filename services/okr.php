<?php
     if(!isset($_SESSION['usuario']))
          session_start();

     require_once '../model/objetivo.php';
     require_once '../model/resultadoChave.php';

     $operacao = '';
     if(isset($_POST['operacao']))
          $operacao = $_POST['operacao'];

	function getHtml($file){
          $html = file_get_contents($file);
  
          return $html; 
      }     

      function montaHtml($objetivo, $resultadosChave){       

          $htmlFinal = '';
          foreach($resultadosChave as $resultadoChave){
               $html = getHtml("../resources/stickNote.html");          

               $classTempoResultado = 'noteTrimestre'; 
               $objetivo->select($resultadoChave['objetivoId']);

               if(trim($objetivo->tempoResultado) == 'Ano')
                    $classTempoResultado = 'noteAno';

               
               $html = str_replace('#tempoResultado', $classTempoResultado,            $html);
               $html = str_replace('#id',             $resultadoChave['objetivoId'],   $html);
               $html = str_replace('#tipoObjetivo',   $resultadoChave['tipoObjetivo'], $html);
               $html = str_replace('#valorInicial',   $resultadoChave['valorInicial'], $html);
               $html = str_replace('#valorFinal',     $resultadoChave['valorFinal'],   $html);
               $html = str_replace('#metrica',        $resultadoChave['metrica'],      $html);
               
               $htmlFinal .= $html;
          }

          return $htmlFinal;
      }

     if(trim($operacao) == 'criar'){;

          $objetivo = new Objetivo();

          $objetivo->objetivo       = $_POST['objetivo'];
          $objetivo->tempoResultado = $_POST['tempoResultado'];

          $objetivoId = $objetivo->insert();

          if($objetivoId > 0){
               $resultadoChave = new ResultadoChave();

               $resultadoChave->objetivoId    = $objetivoId;
               $resultadoChave->tipoObjetivo  = $_POST['tipoObjetivo'];
               $resultadoChave->valorInicial  = $_POST['valorInicial'];
               $resultadoChave->valorFinal    = $_POST['valorFinal'];
               $resultadoChave->metrica       = $_POST['metrica'];

               $resultadoChaveId = $resultadoChave->insert();
          }

          echo montaHtml($objetivo, $resultadoChave->select());

     }elseif(trim($operacao) == 'selecionar'){
          $resultadoChave = new ResultadoChave();
          $resultadosChave = $resultadoChave->select();

          $objetivo = new Objetivo();

          echo montaHtml($objetivo, $resultadosChave);
     }

?>