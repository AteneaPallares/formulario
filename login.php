<!-- Formulario para el inicio de sesion -->
<html>

<?php include '_layout/loginyregistrarse.php';?>

        <form class="centrar" method="POST" action="php/validar.php">
            <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <h1>Iniciar Sesión</h1>
                    </div>
                    
                    
                    <div class=" col-sm-12 col-xs-12">
                            <label class="label">Usuario</label>
                    </div>
                    <div class=" col-sm-12 col-xs-12">
                            <input class="input" type="text" name="nombre" required>
                    </div>
                        
                    
                    
                    <div class="col-sm-12 col-xs-12">
                            <label class="label">Contraseña</label>
                    </div>
                    <div class="col-sm-12 col-xs-12 ">
                            <input class="input" type="password" name="password" required>
                    </div>
                        
                    
                    <div class="col-sm-12">
                        <input class="boton " type="submit" name="submit" value="Iniciar Sesión"> 
                    </div>
            </div>
           
            
        </form>  
 
<body>
</html>      