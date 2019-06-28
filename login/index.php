<?php
error_reporting(E_ERROR | E_PARSE);
if(!isset($_SESSION))
    session_start();

if(isset($_SESSION['usuario_log'])){
            echo "<script>location.href='http://10.70.8.168/sgt/';</script>";
            exit();
            unset($_SESSION['email']);
    }

//Login de Usários
if(isset($_POST[login])){

  include('../class/conexao.php');

  $erro = array();

  // Captação de dados
    $senha = $_POST[password];
    $_SESSION['email'] = $mysqli->escape_string($_POST['email']);
    // $_SESSION['email'] = $_POST[login];

    // Validação de dados
    if(!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL))
        $erro[] = "Preencha seu <strong>e-mail</strong> corretamente.";

    if(strlen($senha) < 6 || strlen($senha) > 16)
        $erro[] = "Preencha sua <strong>senha</strong> corretamente. Necessário de no minimo 6 caracteres";

    if(count($erro) == 0){

        $sql = "SELECT senha as senha, cod as valor, ativo, nome
        FROM user
        WHERE email = '$_SESSION[email]'";
        $que = $mysqli->query($sql) or die($mysqli->error);
        $dado = $que->fetch_assoc();

        if($que->num_rows == 0){
            $erro[] = "Nenhum usuário possui o <strong>e-mail</strong> informado.";

        }elseif(password_verify($senha,$dado[senha])){
          if($dado[ativo] == 1){
            $_SESSION['usuario_log'] = $dado[valor];
            $pieces = explode(" ", $dado[nome]);
            $_SESSION['nome_1'] = $pieces[0];

            $sqllogin = "Select * from last_login where cod_user = '" . $dado[valor] . "';";
            $quelogin = $mysqli->query($sqllogin) or die($mysqli->error);
            $dadologin = $quelogin->fetch_assoc();

            if($quelogin->num_rows == 0){
                $queinto = "INSERT INTO `inventario`.`last_login` (`cod_user`) VALUES ('" . $dado[valor] . "');";
            }else{
                $queinto = "UPDATE `inventario`.`last_login` SET parametro = parametro + 1 WHERE  `cod_user`='" . $dado[valor] . "';";
            }

            $quefinal = $mysqli->query($queinto) or die($mysqli->error);

          }else {
            $erro[] = "Usuário não ativo, entre em contato com o Admin.";
          }

        }else
            $erro[] = "<strong>Senha</strong> incorreta.";

        if(count($erro) == 0){
            echo "<script>location.href='http://10.70.8.168/sgt/';</script>";
            exit();
            unset($_SESSION['email']);
        }

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
                        <h3 class="panel-title">SGT</h3>
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
                            <?php
                            if(isset($_SESSION["novousuario"])){
                              echo '<div class="alert alert-success"> Usuário cadastrado com sucesso!</div>';
                              unset($_SESSION["novousuario"]);
                            }
                            if(isset($_SESSION["novasenha"])){
                              echo '<div class="alert alert-success"> Senha alterada com sucesso!</div>';
                              unset($_SESSION["novasenha"]);
                            }
                                ?>
                        <form method="post" action="" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>" class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="Senha" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Lembrar-me
                                    </label>
                                </div>

                                <button type="submit" name="login" value="true" class="btn btn-primary btn-block">Login</button>

                                <button type="button" onclick="window.location.href = 'registrar.php';" class="btn btn-primary btn-block">Registrar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
