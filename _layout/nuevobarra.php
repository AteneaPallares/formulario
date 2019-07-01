<head>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="datetimepicker-master/build/jquery.datetimepicker.min.css">
    <script src="datetimepicker-master/jquery.js"></script>
    <script src="script.js"></script>
    <script src="datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="estilos.css">
    <script src="funciones.js"></script>
    <title> Nuevo Registro </title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['nombre'])){ 
  $username=$_SESSION['nombre'];
  include 'navbarmain.php';
}
else{
  echo '
  <script>
  location.href = "login.php";
</script>';
}?>
</body>