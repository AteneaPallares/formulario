<!-- formulario para crear nuevo usuario -->
<html>

<?php include '_layout/loginyregistrarse.php';?>
    <h1>Registrarse</h1>
           <br>
        <form method="POST" action="php/validarregistro.php">
            
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