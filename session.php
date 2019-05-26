<!-- cierra la sesion -->


<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
</head>
<body>

        <script>
            location.href = "login.php";
        </script>
    
</body>
</html>