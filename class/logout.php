<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
unset($_SESSION['usuario_log']);
unset($_SESSION['nome_1']);
session_destroy();
?>
<script>location.href='../login';</script>
<?php exit('Redirecionando...'); ?>
