<?PHP
error_reporting(E_ERROR | E_PARSE);
include('../class/conexao.php');

if(!isset($_SESSION))
    session_start();


if(isset($_POST['valida'])){

$erro = array();

if(!empty($_POST['newpassword'])){
$senhasegura = $mysqli->escape_string(password_hash($_POST['newpassword'], PASSWORD_DEFAULT));
if(!empty($_POST['newemail'])){
$email = $mysqli->escape_string($_POST['newemail']);
if(!empty($_POST['nome'])){
$nome = $mysqli->escape_string($_POST['nome']);
if(!empty($_POST['setor'])){
$setor = $mysqli->escape_string($_POST['setor']);
if(!empty($_POST['telefone'])){
$telefone = $mysqli->escape_string($_POST['telefone']);

$sqlteste = "SELECT email, cod as valor
FROM user
WHERE email = '$email'";
$que = $mysqli->query($sqlteste) or die($mysqli->error);
$dado = $que->fetch_assoc();

if($que->num_rows == 0){

  $bytes = random_bytes(5);
  $hex = $mysqli->escape_string(bin2hex($bytes));

  $sqlteste2 = "SELECT max(ID) as valor FROM user";
  $que3 = $mysqli->query($sqlteste2) or die($mysqli->error);
  $dado3 = $que3->fetch_assoc();
  $cod = $mysqli->escape_string( (string)((int)$dado3['valor'] + 1) . $hex );


$sql = "INSERT INTO `inventario`.`user` (`nome`, `senha`, `cod`, `telefone`, `setor`, `email`, `tipo`, `hash`) VALUES ('$nome', '$senhasegura', '$cod', '$telefone', '$setor', '$email', 'NewUser', '$hex');";
$que2 = $mysqli->query($sql) or die($mysqli->error);
//$dado2 = $que2->fetch_assoc();

if(count($erro) == 0){
    $_SESSION["novousuario"] = true;
    unset($erro);
    echo "<script>location.href='http://10.70.8.168/sgt/login/';</script>";
    exit();
}

}else {
  $erro[] = "Já existe um usuário usando o email <strong>" . $email . "</strong>.";
}
}else{
  $erro[] = "Informe um <strong>telefone</strong> valido.";
}
}else{
  $erro[] = "Informe um <strong>setor</strong> valido.";
}
}else{
  $erro[] = "Informe um <strong>nome</strong> valido.";
}
}else{
  $erro[] = "Informe um <strong>email</strong> valido.";
}
}else{
  $erro[] = "Informe uma <strong>senha</strong> valida.";
}
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

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
                        <h3 class="panel-title">Novo Usuário</h3>
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
                                    <input class="form-control" placeholder="Nome Completo" name="nome" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Setor" name="setor" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control telefone" placeholder="Telefone" name="telefone" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="newemail" type="email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="Senha" name="newpassword" type="password" value="">
                                </div>

                                <input type="hidden" name="valida" value="1">

                                <button type="submit" name="login" value="true" class="btn btn-primary btn-block">Concluir</button>

                                <button type="button" onclick="window.location.href = 'index.php';" class="btn btn-light btn-block">Voltar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script type="text/javascript">
$(document).ready(function() {

    $("input.telefone")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {
            var target, phone, element;
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;
            phone = target.value.replace(/\D/g, '');
            element = $(target);
            element.unmask();
            if(phone.length > 10) {
                element.mask("(99) 99999-999?9");
            } else {
                element.mask("(99) 9999-9999?9");
            }
        });

});
</script>
</html>
