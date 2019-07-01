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
            $urlimagen="https://www.loboswiki.com/Imagenes/imagen-tierna-de-lobos.jpg";
            date_default_timezone_set('America/Mexico_City');
            $numero=$aux+1;$Hnumero="disabled";
            $fecha=date("Y/m/d H:i");$Hfecha="enabled";
            $memo=0;$Hmemo="enabled";
            $orden=0;$Horden="enabled";
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

           $sql="SELECT NUMERO,FECHA,MEMO,ORDEN,PROYECTO,INFO,IMAGENES,LOGOS,DETALLES,RESPONSABLE,TEL,AREA,CORREO,FECHADOS,IMPRESO,BITACORA,ESTATUS1,DISENADOR,ORDENDOS,CAPTURA,OBSERVACIONES,AUTORIZA,NOPAPEL,NOIMPRESIONES,TABLAIMPRESIONES FROM datos WHERE ID=$IDS ORDER BY ID";
            if ($result=mysqli_query($link,$sql))
            {
            while ($row=mysqli_fetch_row($result))
                {
                    $numero=$row[0];$Hnumero=$correcto;
                    $fecha=$row[1];$Hfecha=$correcto;
                    $memo=$row[2];$Hmemo=$activo;
                    $orden=$row[3];$Horden=$activo;
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

                    $capturaservicio=$row[19];$Hcapturaservicio=$activo;
                    $observaciones=$row[20];$Hobservaciones=$activo;
                    $autoriza=$row[21];$Hautoriza=$activo;
                    $nopapel=$row[22];$Hnopapel=$activo;
                    $noimpredos=$row[23];$Hnoimpredos=$activo;
                    $tablaimpre=$row[24];$Htablaimpre=$activo;

                }
            mysqli_free_result($result);
            }
            mysqli_close($link);}
            ?>