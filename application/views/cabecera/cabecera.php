<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php 

if (!isset($_SESSION['User'])){

  // echo "alert('La sessión ha expirado.')";
  // echo "window.location.replace(http://wwww.google.com)";


}

?>

<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema Administrativo Exámen</title>

<?php 
  include ("recursos/recursos-cabeza.php");
?>


</head>
<body class="hold-transition sidebar-mini">

