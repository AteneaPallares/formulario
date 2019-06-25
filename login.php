<!-- Formulario para el inicio de sesion -->
<html>

<?php include '_layout/navbar.php';?>
    <form method="POST" action="php/validar.php">
            <br>
           <h1>Iniciar Sesión</h1>
           <br>
        <div class=" col-sm-6 col-xs-12"><label>Usuario</label>

            <input style="width:50%;" type="text" name="nombre" required></div>
                <div class=" col-sm-6 col-xs-12"><label>Contraseña</label>    
            <input style="width:50%;" type="password" name="password" required></div>
            <input type="submit" name="submit" value="Iniciar Sesión"> 
</form>    
    <body>
</html>      