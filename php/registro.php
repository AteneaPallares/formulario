 <!-- conecta con la base de datos para insertar los datos del formulario nuevo.php  -->
    <?php
   include 'conectar.php';
 // Crear nuevo usuario
if(isset($_POST['nombreusuarionuevo'])&& isset($_POST['passwordusuarionuevo']) &&isset($_POST['correousuarionuevo'])){
 if(($_POST['nombreusuarionuevo']!=null)&&($_POST['passwordusuarionuevo']!=null)&&($_POST['correousuarionuevo']!=null)){
   

}
}

// Fin crear nuevo usuario 


    
    //Recibir variables
     if(isset($_POST['numero'])){$numero=$_POST['numero'];}else{$numero;if(isset($_POST['numerodos'])){$numero=$_POST['numerodos'];}}
     if(!empty($numero)){
        $FECHA=$_POST['fechad'];
     if(empty($FECHA)){
         date_default_timezone_set('America/Mexico_City');
         $FECHA=date("Y-m-d H:i:s");
     }
     if(isset($_POST['proyecto'])){$PROYECTO=$_POST['proyecto'];}else{$PROYECTO=$_POST['proyectodos'];}
     if(empty($PROYECTO)){$PROYECTO=$_POST['proyectodos'];}
     $MEMO=$_POST['memo'];if(empty($MEMO)){$MEMO=0;}
     if(isset($_POST['Orden'])){$ORDEN=$_POST['Orden'];}else{$ORDEN="";}
     $INFO=$_POST['info'];if(empty($INFO)){$INFO="";}
     $IMAGEN=$_POST['imagennueva'];if(empty($IMAGEN)){$IMAGEN="";}
    $LOGOS=$_POST['imagennuevados'];if(empty($IMAGEN)){$LOGOS="";}
     $DETALLES=$_POST['detalles'];if(empty($DETALLES)){$DETALLES="";}
     $RESPONSABLE=$_POST['usuario'];if(empty($RESPONSABLE)){$RESPONSABLE="";}
     $TEL=$_POST['tel'];if(empty($TEL)){$TEL="";}
     $AREA=$_POST['area'];if(empty($AREA)){$AREA="";}
     $CORREO=$_POST['correo'];if(empty($CORREO)){$CORREO="";}
     $FECHADOS=$_POST['time'];
     if(empty($FECHADOS)){
        date_default_timezone_set('America/Mexico_City');
        $FECHADOS=date("Y-m-d H:i:s");
    }
     $IMPRESO=$_POST['impreso'];if(empty($IMPRESO)){$IMPRESO=0;}
     $BITACORA=$_POST['bitacora'];if(empty($BITACORA)){$BITACORA="";}
     if (isset($_POST['estatus']))$ESTATUS1=$_POST['estatus'];else $ESTATUS1=1;
     $DISENADOR=$_POST['disenador'];if(empty($DISENADOR)){$DISENADOR="";}
     if($DISENADOR=="AnAdIr123asd45gfdert76")
     {
         session_start();
         if(isset($_SESSION['nombre'])){ 
           $username=$_SESSION['nombre'];
           $DISENADOR=$username;
         }
     }
     $ORDENDOS=$_POST['ordenservicio'];if(empty($ORDENDOS)){$ORDENDOS="";}
     $CAPTURA=$_POST['captura'];if(empty($CAPTURA)){$CAPTURA="";}
     $OBSERVACIONES=$_POST['observaciones'];if(empty($OBSERVACIONES)){$OBSERVACIONES="";}
     $AUTORIZA=$_POST['autoriza'];if(empty($AUTORIZA)){$AUTORIZA="";}
     $NOPAPEL=$_POST['cantidadpapel'];if(empty($NOPAPEL)){$NOPAPEL=0;}
     $NOIMPRESIONES=$_POST['cantidadimpre'];if(empty($NOIMPRESIONES)){$NOIMPRESIONES=0;}
     $tablaimpresiones=$_POST['tablaimpresiones'];if(empty($tablaimpresiones)){$tablaimpresiones="";}
 
mysqli_multi_query($link,"INSERT INTO datos(NUMERO,FECHA,MEMO,ORDEN,PROYECTO,INFO,IMAGENES,LOGOS,DETALLES,RESPONSABLE,TEL,AREA,CORREO,FECHADOS,
IMPRESO,BITACORA,ESTATUS1,DISENADOR,ORDENDOS,CAPTURA,OBSERVACIONES,AUTORIZA,NOPAPEL,NOIMPRESIONES,TABLAIMPRESIONES,ACTIVO) 
VALUES('$numero','$FECHA','$MEMO','$ORDEN','$PROYECTO','$INFO','$IMAGEN','$LOGOS','$DETALLES','$RESPONSABLE','$TEL','$AREA','$CORREO','$FECHADOS',
'$IMPRESO','$BITACORA','$ESTATUS1','$DISENADOR','$ORDENDOS','$CAPTURA','$OBSERVACIONES','$AUTORIZA','$NOPAPEL','$NOIMPRESIONES','$tablaimpresiones','1')") or die("<h2>Error Guardando los datos</h2>");

echo'
    <script>
        alert("Registro Exitoso");
        location.href = "../encabezado.php";
    </script>
';
mysqli_close($link);
     }
     else{
        echo'
        <script>
            alert("Error Guardando Datos. Este error se puede deber a que agrego un archivo .rar,.zip o un archivo excedente de 2MB");
            location.href = "../encabezado.php";
        </script>
    ';
     }
    ?>