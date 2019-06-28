<?php
if(!isset($_SESSION))
    session_start();

if(!function_exists("protect")){

  function protect(){

    if(!isset($_SESSION['usuario_log'])){

      header('Location: /sgt/login/');
      //echo "<script>location.href='" . $path . "';</script>";
      exit('Login inválido: Redirecionando...');

    }

  }

}

protect();
?>
