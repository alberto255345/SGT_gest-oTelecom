<?php
include("class/protect.php");
if( file_exists("./db/ip.php") && is_readable("./db/ip.php") && include("./db/ip.php")) {
    include("./db/link.php");
    echo '<link rel="stylesheet" href="/sgt/css/logo.css">';
    include("./db/nav.php");
}else {
  echo "erro include";
}
?>

<div id="separa" style="align-items: center; margin: 0 10%">
  <a href="#" target="_blank">Sistema de Gestão de Telecom - SGT</a>
  <img src="logo-enel-png-6.png" alt="Mountains" width="150" height="70" style="z-index: 1;">
</div>

<script type="application/javascript">
            function destino(item) {
            window.location.href = item;
        }
        </script>
</body>
</html>
