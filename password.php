<!-- formulario para crear nuevo usuario -->
<html>

<?php include '_layout/catalogos.php';?>

    <h1>Cambiar Contraseña</h1>
           <br>
        <form method="POST" action="php/validarpassword.php">
             
        <div class=" col-sm-6 col-xs-12"><label>Confirmar Contraseña</label>    
            <input style="width:50%;" id="oficialpass" type="password" name="oficialpass" required></div>  
            
                <div class=" col-sm-6 col-xs-12"><label>Nueva Contraseña</label>    
            <input style="width:50%;" id="password"type="password" name="password" required></div>
            <div class=" col-sm-6 col-xs-12"><label>Repetir Contraseña</label>    
            <input style="width:50%;" id="repassword"type="password" name="repassword" required></div>
            
            <input type="submit" name="submit" value="Guardar cambios"> 
</form>   
    <body>  
</html>      