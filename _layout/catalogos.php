<head>
<style>
  .w3-input{
    background: #D8D8D8;
   border: 1px solid #393939;
   border-radius: 5px 5px 5px 5px;
   color: black;
   text-align: center;
   font-size: 12px;
   padding: 5px;
  }
  </style>
<script src="//cdn.jsdelivr.net/npm/details-polyfill@1/index.min.js" async></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="datetimepicker-master/jquery.js"></script>
    <script src="script.js"></script>
    <script src="datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
<script type="text/javascript" src="./js/jquery.tablesorter.min.js"></script>
<link rel="stylesheet" href="datetimepicker-master/build/jquery.datetimepicker.min.css">
<link rel="stylesheet" href="./themes/blue/style.css" type="text/css" media="print, projection, screen" />
<head>

<?php
session_start();
include ("php/conectar.php");  
$sql="SELECT NOMBRE,ID FROM tipoimpre";
if(isset($_SESSION['nombre']) && ($_SESSION['nombre']=="admin")){
  $username=$_SESSION['nombre'];
  include 'navbarmain.php';
}
else{
  echo '
  <script>
  location.href = "login.php";
</script>';
}?>