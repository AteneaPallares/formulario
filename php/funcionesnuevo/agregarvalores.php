<?php
            
            $sql="SELECT ID,NUMERO FROM datos  ORDER BY NUMERO ASC";
            $aux=0;
            
            if ($result=mysqli_query($link,$sql))
            {
                while ($row=mysqli_fetch_row($result))
                    {
                        $aux=$row[1];
                    }
            }
            $hboton="";
            $urlimagen="https://www.loboswiki.com/Imagenes/imagen-tierna-de-lobos.jpg";
            date_default_timezone_set('America/Mexico_City');
            $numero=$aux+1;$Hnumero="disabled";
            $fecha=date("Y/m/d H:i");$Hfecha="enabled";
            $memo=0;$Hmemo="enabled";
            $orden="";$Horden="enabled";
            $proyecto="";$Hproyecto="enabled";
            $info="";$Hinfo="enabled";$Hinfo="enabled";
            $imagenes="";$Himagenes="enabled";
            $logos="";$Hlogos="enabled";
            $detalles="";$Hdetalles="enabled";
            $responsable="";$Hresponsable="enabled";
            $tel="";$Htel="enabled";
            $area="";$Harea="enabled";
            $correo="";$Hcorreo="enabled";
            $fechados=date("Y/m/d H:i");$Hfechados="enabled";
            $noimpresos="";$Hnoimpresos="enabled";
            $bitacora="";$Hbitacora="enabled";
            $estatus1=0;
            $disenador="";$Hdisenador="enabled";
            $ordenservicio="";$Hordenservicio="enabled";
            $capturaservicio="";$Hcapturaservicio="enabled";
            $observaciones="";$Hobservaciones="enabled";
            $autoriza="";$Hautoriza="enabled";
            $tipoimpre="";$Htipoimpre="enabled";
            $nopapel=0;$Hnopapel="enabled";
            $tipopapel="";$Htipopapel="enabled";
            $noimpredos=0; $Hnoimpredos="enabled";
            $tablaimpre=""; $Htablaimpre="enabled";
            $registrarse="enabled";
            $borrar="enabled";
            $quitar=false;
            $eliminar1="enabled";
            $eliminar2="enabled";
            $correcto="enabled";
            $activo="enabled";
            
           
            if((!empty($_POST['IDmenu'])) && (isset($_POST['IDmenu']))){
                $registrarse=$activo;
                $eliminar1=$activo;
                $eliminar2=$activo;
                $borrar=$activo;
                if(isset($_POST['submitmenu'])){
                    $activo="enabled";
                    $correcto="disabled";
                    $quitar=false;
                    $IDS=$_POST['IDmenu'];
                }
                else{$activo="disabled";
                    $quitar=true;
                    $eliminar1="disabled";
                    $eliminar2="disabled";
                    $registrarse="disabled";
                    $borrar="disabled";
                    $correcto="disabled";
                    $IDS=$_POST['id'];}
               if(isset($_POST['ultimovalor'])&& (!empty($_POST['ultimovalor']))){
                   $ultimovalor=$_POST['ultimovalor'];
                   $sql="SELECT ID,NUMERO FROM datos WHERE NUMERO=$ultimovalor ORDER BY ID DESC";

                   if ($result=mysqli_query($link,$sql))
                   {
                   while ($row=mysqli_fetch_row($result))
                       {
                           $IDS=$row[0];
                           break;
                       }
                    }
          
            
               }

           $sql="SELECT NUMERO,FECHA,MEMO,ORDEN,PROYECTO,INFO,IMAGENES,LOGOS,DETALLES,RESPONSABLE,TEL,AREA,CORREO,FECHADOS,IMPRESO,BITACORA,ESTATUS1,DISENADOR,ORDENDOS,NOPAPEL,NOIMPRESIONES,TABLAIMPRESIONES FROM datos WHERE ID=$IDS ORDER BY ID";
            if ($result=mysqli_query($link,$sql))
            {
            while ($row=mysqli_fetch_row($result))
                {
                    $numero=$row[0];$Hnumero=$correcto;
                    $fecha=$row[1];$Hfecha=$correcto;
                    $memo=$row[2];$Hmemo=$activo;
                    $orden=$row[3];$Horden=$activo;
                    $sum=$row[3];
                    $proyecto=$row[4];$Hproyecto=$correcto;
                    $info=$row[5];$Hinfo=$activo;
                    $imagenes=$row[6];$Himagenes=$activo;
                    $logos=$row[7];$Hlogos=$activo;
                    $detalles=$row[8];$Hdetalles=$activo;

                    $responsable=$row[9];$Hresponsable=$activo;
                    $tel=$row[10];$Htel=$activo;
                    $area=$row[11];$Harea=$activo;
                    $correo=$row[12];$Hcorreo=$activo;
                    if($quitar!=false){$fechados=$row[13];}else{$fechados=date("Y/m/d H:i");} $Hfechados=$activo;
                    $noimpresos=$row[14];$Hnoimpresos=$activo;
                    $bitacora=$row[15];$Hbitacora=$activo;
                    $estatus1=$row[16];
                    $disenador=$row[17];$Hdisenador=$activo;
                    $ordenservicio=$row[18];$Hordenservicio=$activo;
                    $nopapel=$row[19];$Hnopapel=$activo;
                    $noimpredos=$row[20];$Hnoimpredos=$activo;
                    $tablaimpre=$row[21];$Htablaimpre=$activo;
                }
            mysqli_free_result($result);
            }
            mysqli_close($link);}
            
            if($username=="gestor"){
                $hboton="hidden";
                $desactivar="enabled";
                $Hnumero="disabled";
                $Hmemo="enabled";
                $Horden="enabled";
                $Hinfo="enabled";
                $Himagenes="enabled";
                $Hlogos="enabled";
                $Hdetalles="enabled";
                $Hresponsable="enabled";
                $Htel="enabled";
                $Harea="enabled";
                $Hcorreo="enabled";
                $Hfechados="enabled";
                $Hnoimpresos="enabled";
                $Hdisenador="disabled";
                $Hordenservicio="enabled";
                $Hcapturaservicio="disabled";
                $Hobservaciones="disabled";
                $Hautoriza="disabled";
                $Htipoimpre="disabled";
                $Hnopapel="disabled";
                $Htipopapel="disabled";
                $Hnoimpredos="disabled";
                $Htablaimpre="disabled";
                $registrarse="enabled";
                $borrar="enabled";
                $quitar=false;
                $eliminar1="enabled";
                $eliminar2="enabled";
                $correcto="disabled";
                $activo="enabled";
                $Hbitacora="disabled";
        
    }
    elseif($username!="admin"){
        $Htablaimpre="enabled";
            $Hnumero="disabled";
            $Hfecha="disabled";
            $Hmemo="disabled";
            $Horden="disabled";
            $Hproyecto="disabled";
            $Hinfo="disabled";$Hinfo="disabled";
            $Himagenes="disabled";
            $Hlogos="disabled";
            $Hdetalles="disabled";
            $Hresponsable="disabled";
            $Htel="disabled";
            $Harea="disabled";
            $Hcorreo="disabled";
            $Hfechados="disabled";
            $Hnoimpresos="disabled";
            $Hbitacora="enabled";
            $Hdisenador="disabled";
            $Hordenservicio="disabled";
            $Hcapturaservicio="disabled";
            $Hobservaciones="disabled";
            $Hautoriza="disabled";
            $Htipoimpre="enabled";
            $Hnopapel="enabled";
            $Htipopapel="enabled";
            $Hnoimpredos="enabled";
            $registrarse="enabled";
            $borrar="enabled";
            $quitar=false;
            $eliminar1="disabled";
            $eliminar2="disabled";
            $correcto="disabled";
            $activo="enabled";
    }
    if(isset($_POST['histo']))
            {
                $Htablaimpre="disabled";
            $Hnumero="disabled";
            $Hfecha="disabled";
            $Hmemo="disabled";
            $Horden="disabled";
            $Hproyecto="disabled";
            $Hinfo="disabled";$Hinfo="disabled";
            $Himagenes="disabled";
            $Hlogos="disabled";
            $Hdetalles="disabled";
            $Hresponsable="disabled";
            $Htel="disabled";
            $Harea="disabled";
            $Hcorreo="disabled";
            $Hfechados="disabled";
            $Hnoimpresos="disabled";
            $Hbitacora="enabled";
            $Hdisenador="disabled";
            $Hordenservicio="disabled";
            $Hcapturaservicio="disabled";
            $Hobservaciones="disabled";
            $Hautoriza="disabled";
            $Htipoimpre="disabled";
            $Hnopapel="disabled";
            $Htipopapel="disabled";
            $Hnoimpredos="disabled";
            $registrarse="disabled";
            $borrar="disabled";
            $quitar=false;
            $eliminar1="disabled";
            $eliminar2="disabled";
            $correcto="disabled";
            $activo="disabled";
            }
            ?>