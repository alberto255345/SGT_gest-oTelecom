<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sgt/class/conexao.php";

$path2 = $_SERVER['DOCUMENT_ROOT'];
$path2 .= "/sgt/class/protect.php";

include($path);
include($path2);

if(!isset($_SESSION))
    session_start();

$sqlteste2 = "SELECT avatar FROM user where cod = '" . $_SESSION['usuario_log'] . "';";
$que3 = $mysqli->query($sqlteste2) or die($mysqli->error);
$dado3 = $que3->fetch_assoc();
?>
</head>
<body>

  <nav class="navbar">
  	<ul class="nav">
  		<li onclick="destino('/')">
  			Home
  		</li>
      <li onclick="destino('#')">
  			Atendimento
  			<ul class="dropdown">
  				<li onclick="destino('/sgt/atendimento/')">Cadastrar</li>
  				<li onclick="destino('/sgt/atendimento/lista/')">Lista de Atendimento</li>
  			</ul>
  		</li>
  		<li>
  			Inventário
  			<ul class="dropdown">
  				<li onclick="destino('/sgt/inventario/')">Estoque Telecom</li>
  				<li onclick="destino('/sgt/GPRS/')">GPRS</li>
  				<li>Menu 3</li>
  			</ul>
  		</li>
  		<li>
  			Relatórios
  			<ul class="dropdown">
  				<li onclick="destino('/sgt/inventario/falta/')" style="font-size: 9px;">Equipamento Manutenção Pendente</li>
  				<li>Menu 1</li>
  				<li>Menu 2</li>
  			</ul>
  		</li>
  		<li>
  			<span id="avatarid"><img src="/sgt/img/<?PHP echo $dado3['avatar'];?>" alt="Avatar" class="avatar"> <?PHP echo $_SESSION['nome_1'];?><span>
  			<ul class="dropdown">
  				<li onclick="destino('/sgt/conf/')" style="font-size: 9px;">Configurações</li>
  				<li onclick="destino('/sgt/class/logout.php')" style="font-size: 9px;">logout</li>
  			</ul>
  		</li>
  	</ul>
  </nav>
