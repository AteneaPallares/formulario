<!-- Formulario para el inicio de sesion -->
<html>

<?php include '_layout/loginyregistrarse.php';?>
<link rel="stylesheet" href="CSS/styleLogin.css">

        <form class="centrar" method="POST" action="php/validar.php">
            
            
                <h1>Iniciar Sesión</h1>
                <div class=" col-sm-6 col-xs-12 campos">
                    <label class="label">Usuario</label>
                    <input class="input" type="text" name="nombre" required>
                </div>
                <div class=" col-sm-6 col-xs-12 campos">
                    <label class="label">Contraseña</label>    
                    <input class="input" type="password" name="password" required>
                </div>
                <input class="boton " type="submit" name="submit" value="Iniciar Sesión"> 
            
            
        </form>  
 
</body>
</html>      