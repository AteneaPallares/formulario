<!-- formulario para crear nuevo usuario -->
<html>
<head>
<title>Contraseña</title>
</head>
<?php include '_layout/encabezado.php';?>
<head>
<link rel="stylesheet" href="estilos.css">
</head>    
<body>
<center class="centrar">
    <h1>Cambiar Contraseña</h1>
           <br>
        <form method="POST" action="php/validarpassword.php">
             
        <div class=" col-sm-6 col-xs-12"><label>Confirmar Contraseña</label>    
            <input  id="oficialpass" type="password" name="oficialpass" required></div>  
            
                <div class=" col-sm-6 col-xs-12"><label>Nueva Contraseña</label>    
            <input  id="password"type="password" name="password" required></div>
            <div class=" col-sm-6 col-xs-12"><label>Repetir Contraseña</label>    
            <input  id="repassword"type="password" name="repassword" required></div>
            
            <input type="submit" name="submit" value="Guardar cambios"> 
</form>   
</center>
</body>  
</html>      