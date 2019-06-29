<link rel="stylesheet" href="CSS/styleNavBar.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light " style="background-color: red;">
  <a class="navbar-brand" href="encabezado.php">Registro</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="encabezado.php" ">Inicio <span
            class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nuevo.php" ">Agregar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="password.php" ">Configuración</a>
      </li>
      
      
      <?php 
        
        if($username=="admin"){
          echo '
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Catálogos</a>
            <div class="dropdown-menu">
              <a href="catalogo1.php" class="dropdown-item">Tipo de Impresión</a>
              <a href="catalogo2.php" class="dropdown-item">Tipo de Papel</a>
              <a href="catalogo3.php" class="dropdown-item">Recibir</a>
            </div>
          </li>';
          echo '
            <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Administrar</a>
            <div class="dropdown-menu">
              <a href="recuperar.php" class="dropdown-item">Recuperar</a>
            </div>
          </li>';
        }
        ?>
      
      
      
     
      

    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li>
          <a class="nav-link text-primary" >Usuario: <?php echo $_SESSION['nombre']?></a>
        </li>
        
        <li class="nav-item ">
          <a class="nav-link text-danger" href="php/session.php" ">Cerrar sesión</a>
        </li>
      </ul>
  </div>
</nav>