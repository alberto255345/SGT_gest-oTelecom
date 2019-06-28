<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sgt/css/style.css";
?>
<html>
<head>
  <!-- HTML 4 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- HTML5 -->
<meta charset="utf-8"/>
<title>Sistema de Gestão de Telecom</title>
<link rel="shortcut icon" type="image/x-icon" href="Oxygen-Icons.org-Oxygen-Actions-document-open-remote.ico" />

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="/sgt/css/style.css?v=<?php echo filemtime($path); ?>">
<link rel="stylesheet" href="/sgt/css/jquery.dataTables.css?v=<?php echo filemtime($path); ?>">
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> -->
<script type="text/javascript" src="/sgt/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/sgt/js/index.js"></script>
<script type="text/javascript" src="/sgt/js/notify.js"></script>
<!-- Amsify Plugin -->
<link rel="stylesheet" href="/sgt/css/amsify.suggestags.css">
<script src="/sgt/js/jquery.amsify.suggestags.js"></script>

<!-- jsPanel CSS -->
<link href="https://cdn.jsdelivr.net/npm/jspanel4@4.5.0/dist/jspanel.css" rel="stylesheet">
<!-- jsPanel JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/jspanel4@4.5.0/dist/jspanel.js"></script>

<!-- optional jsPanel extensions -->
<script src="https://cdn.jsdelivr.net/npm/jspanel4@4.5.0/dist/extensions/modal/jspanel.modal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspanel4@4.5.0/dist/extensions/tooltip/jspanel.tooltip.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspanel4@4.5.0/dist/extensions/hint/jspanel.hint.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspanel4@4.5.0/dist/extensions/layout/jspanel.layout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspanel4@4.5.0/dist/extensions/contextmenu/jspanel.contextmenu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspanel4@4.5.0/dist/extensions/dock/jspanel.dock.js"></script>
