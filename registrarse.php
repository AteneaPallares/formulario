<!-- formulario para crear nuevo usuario -->
<html>

    <head>
    <script src="//cdn.jsdelivr.net/npm/details-polyfill@1/index.min.js" async></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="datetimepicker-master/build/jquery.datetimepicker.min.css">
    <script src="datetimepicker-master/jquery.js"></script>
    <script src="script.js"></script>
    <script src="datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <script src="funciones.js"></script>
        <title>Registrarse</title></head>
    <body>
    <nav class="navbar navbar-expand-lg  " style="background-image: url(Imagenes/nav.jpg);">
        <a class="navbar-brand" href="encabezado.php" style="color:black;">Registro</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="login.php" style="color:#FF0040;">Iniciar Sesión <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <h1>Registrarse</h1>
           <br>
        <form method="POST" action="validarregistro.php">
            
        <div class=" col-sm-6 col-xs-12"><label>Usuario</label>    
            <input style="width:50%;" type="text" name="nombre" required></div>
                <div class=" col-sm-6 col-xs-12"><label>Contraseña</label>    
            <input style="width:50%;" id="password"type="password" name="password" required></div>
            <div class=" col-sm-6 col-xs-12"><label>Confirmar Contraseña</label>    
            <input style="width:50%;" id="repassword"type="password" name="repassword" required></div>
            <div class=" col-sm-6 col-xs-12"><label>Correo</label>    
            <input style="width:50%;" id="repassword"type="email" name="correo" required></div>
            <input type="submit" name="submit" value="Registrarse"> 
</form>    
    <body>  
</html>      