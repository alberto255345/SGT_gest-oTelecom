<?PHP
include('../class/conexao.php');

if(!isset($_SESSION))
    session_start();

$erro = array();

if(isset($_GET['hash'])){
if(!empty($_GET['hash'])){

$hash = $mysqli->escape_string($_GET['hash']);



$sqlteste = "SELECT senha FROM user
WHERE hash = '$hash'";
$que = $mysqli->query($sqlteste) or die($mysqli->error);
$dado = $que->fetch_assoc();

if(isset($_POST['novaid'])){

if($que->num_rows != 0){

if($_POST['newpassword'] == $_POST['newpassword2']){
  $cod = $mysqli->escape_string($_GET['hash']);
  $bytes = random_bytes(5);
  $hex = $mysqli->escape_string(bin2hex($bytes));
  $senhasegura = $mysqli->escape_string(password_hash($_POST['newpassword'], PASSWORD_DEFAULT));

  $sqlteste2 = "UPDATE `inventario`.`user` SET `senha`='$senhasegura', `hash`='$hex' WHERE  `hash`='$cod';";
 
  $que3 = $mysqli->query($sqlteste2) or die($mysqli->error);

  if(count($erro) == 0){
    $_SESSION["novasenha"] = true;
    unset($erro);
    echo "<script>location.href='http://10.70.8.168/sgt/login/';</script>";
    exit();
}

}else{
  $erro[] = "Senha não corresponde a verificação";
}



}else{
    $erro[] = "Código não é valido";
}

}

}else{
    $erro[] = "Código Vazio";
}

}else{
    $erro[] = "Código inválido";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema de Gestão de Telecom</title>
    <link rel="shortcut icon" type="image/x-icon" href="../Oxygen-Icons.org-Oxygen-Actions-document-open-remote.ico" />

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body style="background: none;">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" style="background-color: #907dda; font-family: Verdana, Geneva, sans-serif; position: relative; flex-grow: 1; flex-shrink: 0; font-size: 14px; text-align: center; text-transform: uppercase; line-height: 60px; letter-spacing: 1px; color: #e7e6f1;">
                        <h3 class="panel-title">Nova Senha</h3>
                    </div>
                    <div class="panel-body" style="background-image: linear-gradient(#F3F4F8, white);">
                      <?php
                      if(isset($erro))
                          if(count($erro) > 0){ ?>
                              <div class="alert alert-danger">
                                  <?php foreach($erro as $msg) echo "$msg <br>"; ?>
                              </div>
                          <?php
                          }
                          ?>
                        <form method="post" action="" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="Senha" name="newpassword" type="password" value="" <?PHP if(isset($erro)){ if(count($erro) > 0){echo 'disabled';}else{echo '';} }else{ echo 'disabled';} ?>>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" required placeholder="Repita a Senha" name="newpassword2" type="password" value="" <?PHP if(isset($erro)){ if(count($erro) > 0){echo 'disabled';}else{echo '';} }else{ echo 'disabled';} ?>>
                                </div>

                                <input type="hidden" name="valida" value="1">

                                <button type="submit" name="novaid" value="true" class="btn btn-primary btn-block" <?PHP if(isset($erro)){ if(count($erro) > 0){echo 'disabled';}else{echo '';} }else{ echo 'disabled';} ?> >Concluir</button>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>