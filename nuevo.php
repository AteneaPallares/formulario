<!-- esta opcion guarda los datos de los formularios de crear un nuevo proyecto
, tambien muestra el historial. -->

<html>
<?php
include '_layout/nuevobarra.php';
?>

<head>
    <title>Detalles</title>
</head>

<body onload="cargarimagenes()">
    <?php
include 'php/conectar.php';
include 'php/funcionesnuevo/agregarvalores.php';
?>

    <!-- Código para crear el nuevo registro -->
    <form action="php/registro.php" method="POST" enctype="multipart/form-data" id="completo">
        <div class="container">


            <div class="row">
                <?php include 'php/autorizando.php';?>
                <div class="col-sm-12 col-xs-12 seccion">
                    <div class="col-sm-12 col-xs-12 encabezado">
                        <label class="titulo">DATOS GENERALES</label>
                    </div>

                    <div class=" col-sm-6 col-xs-12 elementos"><label> No.Proyecto </label> <input type="number"
                            name="numero" id="numeroproyecto" onchange="reporte()" value="<?php echo $numero ?>"
                            <?php echo $Hnumero ?> required></div>
                    <div class=" col-sm-6 col-xs-12 elementos ">
                        <label> Proyecto </label>
                        <input onchange="reporte()" type="text" name="proyecto" id="proyecto"
                            value="<?php echo $proyecto ?>" <?php echo $Hproyecto ?> required>
                    </div>
                    <div class=" col-sm-6 col-xs-12 elementos">
                        <label class="designer"> Diseñador</label>
                        <label class="designer"> <?php echo $disenador ?> </label>
                        <select <?php echo $Hmemo;?> name="disenador" onchange="agregarusuario();reporte()" ;
                            id="disenador">
                            <?php
                include 'php/conectar.php';
         $sql="SELECT NOMBRE,PASSWOR FROM usuario ORDER BY NOMBRE";
         
                if ($result=mysqli_query($link,$sql))
                {
                while ($row=mysqli_fetch_row($result))
                    {
                        if($row[0]==$_SESSION['nombre']){
                            $seleccionado="selected";
                        }
                        else{

                            $seleccionado="unselected";
                        }
                       ?> <option value="<?php echo $row[0]?>" <?php echo $seleccionado ?>>
                                <?php echo $row[0]?>
                            </option><?php
                    }
                }
                ?>
                            <option value="AnAdIr123asd45gfdert76">Añadir</option>

                        </select>
                        <input type="hidden" name="nombreusuarionuevo" id="nombreusuarionuevo">
                        <input type="hidden" name="passwordsuarionuevo" id="passwordusuarionuevo">
                        <input type="hidden" name="correosuarionuevo" id="correousuarionuevo">
                        <input type="hidden" name="currentuser" id="currentuser" value="<?php echo $username ?>">
                    </div>

                    <input type="hidden" name="numerodos" value="<?php echo $numero ?>">
                    <input type="hidden" onchange="reporte()" id="fechacreacion1" name="fechad"
                        value="<?php echo $fecha ?>">
                    <div class=" col-sm-6 col-xs-12 elementos">
                        <label>Fecha</label>
                        <input id="datetime" name="fechad" value="<?php echo $fecha ?>" <?php echo $Hfecha ?>>
                    </div>

                </div>

                <div class=" col-sm-12 col-xs-12">
                    <input class="boton guardar" style="width:30%;   text-align: center;" type="submit" name="submitdos"
                        value="Guardar" <?php echo $registrarse ?> />
                </div>


                <div class="col-sm-12 col-xs-12 seccion">
                    <div class=" col-sm-12 col-xs-12 encabezado">
                        <label class="titulo">SERVICIO DE DISEÑO</label>
                    </div>
                    <div class=" col-sm-6 col-xs-12 elementos"><label> No. Memo </label>
                        <input type="number" name="memo" value="<?php echo $memo ?>" <?php echo $Hmemo ?>>
                    </div>
                    <div class=" col-sm-6 col-xs-12 elementos"><label> Recepción por: </label>
                        <select <?php echo $Hmemo ?> name="Orden" id="orden1" onchange="reporte()">
                            <?php
        $sql="SELECT NOMBRE FROM recibir ORDER BY NOMBRE";
                if ($result=mysqli_query($link,$sql))
                {
                while ($row=mysqli_fetch_row($result))
                    {
                    ?> <option value="<?php echo $row[0]?>" <?php echo $seleccionado ?>>
                                <?php echo $row[0]?></option><?php
                    }
                }
                ?>
                        </select>
                    </div>

                    <input type="hidden" name="proyectodos" value="<?php echo $proyecto ?>">
                    <div class=" col-sm-6 col-xs-12 elementos"><label> Info Digital Completo
                        </label><input type="text" name="info" value="<?php echo $info ?>" <?php echo $Hinfo ?>> </div>
                    <div class=" col-sm-6 col-xs-12 elementos"><label> Detalles del servicio
                        </label><textarea onchange="reporte()" type="text" name="detalles" id="detalles"
                            <?php echo $Hdetalles ?>><?php echo $detalles ?></textarea></div>
                    <div class=" col-sm-6 col-xs-12 elementos"><label> Usuario Responsable
                        </label><input onchange="reporte()" type="text" name="usuario" id="usuario"
                            value="<?php echo $responsable ?>" <?php echo $Hresponsable ?>></div>
                    <div class=" col-sm-6 col-xs-12 elementos"><label> Orden de Servicio </label><input
                            onchange="reporte()" type="text" id="orden1" name="ordenservicio"
                            value="<?php echo $ordenservicio?>" <?php echo $Hordenservicio ?>></div>



                    <!-- Inicio imagenes -->

                    <div class=" col-sm-6 col-xs-12 elementos">
                        <input type="hidden" id="imagennueva" name="imagennueva" value="<?php echo $imagenes ?>">
                        <label> Imagenes </label><input type="file" id="cambio" name="img" onchange="inicializar1()"
                            value="<?php echo $imagenes ?>" <?php echo $Himagenes ?>>
                        <input class="boton" type="button" onclick="eliminar('imagennueva','a');" value="Eliminar"
                            <?php echo $eliminar1 ?>>
                        <div id="contenedor" style="overflow:scroll;height:100px;width:100%;">
                        </div>
                    </div>
                    <div class=" col-sm-6 col-xs-12 elementos">
                        <input type="hidden" id="imagennuevados" name="imagennuevados" value="<?php echo $logos ?>">
                        <label> Logos </label><input type="file" id="cambiodos" name="log" onchange="inicializar2()"
                            value="<?php echo $logos ?>" <?php echo $Hlogos ?>>
                        <input class="boton" type="button" onclick="eliminar('imagennuevados','b');" value="Eliminar"
                            <?php echo $eliminar2 ?>>
                        <div id="contenedordos" style="overflow:scroll;height:100px;width:100%;"> </div>
                    </div>

                    <!-- fin imagenes -->

                    <div class=" col-sm-6 col-xs-12 elementos"><label> Telefono </label><input type="text"
                            onchange="reporte()" id="telefono1" name="tel" value="<?php echo $tel ?>"
                            <?php echo $Htel ?>></div>
                    <div class=" col-sm-6 col-xs-12 elementos"><label> Area </label><input onchange="reporte()"
                            type="text" name="area" id="area1" value="<?php echo $area ?>" <?php echo $Harea ?>></div>
                    <div class=" col-sm-6 col-xs-12 elementos"><label> Correo </label> <input type="text"
                            onchange="reporte()" name="correo" id="correo1" value="<?php echo $correo ?>"
                            <?php echo $Hcorreo ?>></div>
                    <div class=" col-sm-6 col-xs-12 elementos"><label> Fecha </label><input onchange="reporte()"
                            id="datetimedos" name="time" value="<?php echo $fechados ?>" <?php echo $Hfechados ?>></div>

                    <div class=" col-sm-6 col-xs-12 elementos"><label> Cantidad impresos </label><input
                            onchange="reporte()" type="number" name="impreso" id="cantidadimpresos1"
                            value="<?php echo $noimpresos ?>" <?php echo $Hnoimpresos ?>></div>


                </div>

                <div class=" col-sm-12 col-xs-12">
                    <input class="boton guardar" style="width:30%;   text-align: center;" type="submit" name="submitdos"
                        value="Guardar" <?php echo $registrarse ?> />
                </div>

                <div class="col-sm-12 col-xs-12 seccion">
                    <div class=" col-sm-12 col-xs-12 encabezado">
                        <label class="titulo">ESTATUS DELSERVICIO</label>
                    </div>
                    <!-- radio -->
                    <div class=" ">

                        <legend>Estado</legend>
                        <div class="status">
                            <div class="row">

                                <div class="col-sm-2 col-xs-2">
                                    <label>Info<img id="radio" src="imagenes/info.png"><input class="centrado"
                                            type="radio" name="estatus" value="1"
                                            <?php if($estatus1=='1') {echo 'checked="checked"';}if($quitar==true){echo 'disabled=$activo';} ?>>
                                    </label>
                                </div>
                                <div class="col-sm-2 col-xs-2">
                                    <label>Propuesta<img id="radio" src="imagenes/propuesta.png"><input type="radio"
                                            name="estatus" value="2"
                                            <?php if($estatus1=='2') {echo 'checked="checked"';} if($quitar==true){echo 'disabled=$activo';}?>>
                                    </label>
                                </div>
                                <div class="col-sm-2 col-xs-2">
                                    <label>Revisión<img id="radio" src="imagenes/revision.png"><input type="radio"
                                            name="estatus" value="3"
                                            <?php if($estatus1=='3') {echo 'checked="checked"';} if($quitar==true){echo 'disabled=$activo';}?>>
                                    </label>
                                </div>
                                <div class="col-sm-2 col-xs-2">
                                    <label>Vobo<img id="radio" src="imagenes/vobo.png"><input type="radio"
                                            name="estatus" value="4"
                                            <?php if($estatus1=='4') {echo 'checked="checked"';} if($quitar==true){echo 'disabled=$activo';}?>>
                                    </label>
                                </div>
                                <div class="col-sm-2 col-xs-2">
                                    <label>Impresión<img id="radio" src="imagenes/impresion.png"><input type="radio"
                                            name="estatus" value="5"
                                            <?php if($estatus1=='5') {echo 'checked="checked"';} if($quitar==true){echo 'disabled=$activo';}?>>\
                                    </label>
                                </div>
                                <div class="col-sm-2 col-xs-2">
                                    <label>Entregado<img id="radio" src="imagenes/entregado.png"><input type="radio"
                                            name="estatus" value="6"
                                            <?php if($estatus1=='6') {echo 'checked="checked"';} if($quitar==true){echo 'disabled=$activo';}?>>
                                    </label>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- fin radio -->
                </div>

                <div class=" col-sm-12 col-xs-12">
                    <input class="boton guardar" style="width:30%;   text-align: center;" type="submit" name="submitdos"
                        value="Guardar" <?php echo $registrarse ?> />
                </div>

                <div class="seccion col-sm-12 col-xs-12">
                    <div class=" col-sm-12 col-xs-12 encabezado">
                        <label class="titulo"> BITÁCORA</label>
                    </div>
                    <div class=" col-sm-12 col-xs-12"><textarea onchange="reporte()"
                            style="width:100%;   text-align: center; height:100px" id="bitacora1" type="text"
                            name="bitacora" <?php echo $Hbitacora ?>><?php echo $bitacora ?></textarea></div>
                </div>
                <div class=" col-sm-12 col-xs-12">
                    <input class="boton guardar" style="width:30%;   text-align: center;" type="submit" name="submitdos"
                        value="Guardar" <?php echo $registrarse ?> />
                </div>

                <div class="col-sm-12 col-xs-12 seccion">
                    <div class=" col-sm-12 col-xs-12 encabezado">
                        <label class="titulo"> IMPRESIONES</label>
                    </div>
                    <div class=" col-sm-6 col-xs-12 elementos"><label> Aplicativo </label>
                        <select class="cselect" name="aplicativoid" id="aplicativoid" <?php echo $Htipopapel ?>>
                            <?php
                 $sql="SELECT NOMBRE FROM aplicativo ORDER BY NOMBRE";
                        if ($result=mysqli_query($link,$sql))
                        {
                        while ($row=mysqli_fetch_row($result))
                            {
                               ?> <option value="<?php echo $row[0]?>" <?php echo $seleccionado ?>>
                                <?php echo $row[0]?>
                            </option><?php
                            }
                        }
                        ?>
                        </select>
                    </div>

                    <br></br>
                    <div class=" col-sm-6 col-xs-12 elementos"><label> Tipo de impresión </label>
                        <select class="cselect" name="tipoimpresion" id="tipoimpresion" <?php echo $Htipoimpre ?>>
                            <?php
                 $sql="SELECT NOMBRE FROM tipoimpre ORDER BY NOMBRE";
                        if ($result=mysqli_query($link,$sql))
                        {
                        while ($row=mysqli_fetch_row($result))
                            {
                               ?> <option value="<?php echo $row[0]?>" <?php echo $seleccionado ?>>
                                <?php echo $row[0]?>
                            </option><?php
                            }
                        }
                        ?>
                        </select></div>
                    <div class=" col-sm-6 col-xs-12 elementos"><label> Cantidad de papel </label><input type="number"
                            name="cantidadpapel" id="cantidadpapel" value="<?php echo $nopapel ?>"
                            <?php echo $Hnopapel ?>></div>

                    <div class=" col-sm-6 col-xs-12 elementos"><label> Tipo de papel </label>
                        <select class="cselect" name="tipopapel" id="tipopapel" <?php echo $Htipopapel ?>>
                            <?php
                 $sql="SELECT NOMBRE FROM tipopapel ORDER BY NOMBRE";
                        if ($result=mysqli_query($link,$sql))
                        {
                        while ($row=mysqli_fetch_row($result))
                            {
                               ?> <option value="<?php echo $row[0]?>" <?php echo $seleccionado ?>>
                                <?php echo $row[0]?>
                            </option><?php
                            }
                        }
                        ?>
                        </select>
                    </div>
                    <div class=" col-sm-6 col-xs-12 elementos"><label> Cantidad impresiones </label><input type="number"
                            name="cantidadimpre" id="cantidadimpresiones" value="<?php echo $noimpredos ?>"
                            <?php echo $Hnoimpredos ?>></div>

                    <input type="hidden" onchange="reporte()" id="tablaimpresiones" name="tablaimpresiones"
                        value="<?php echo $tablaimpre ?>" <?php echo $Htablaimpre ?> onchange="agregarfila()">
                    <div class=" col-sm-12 col-xs-12" style="display:flex;justify-content: center">
                        <input class="boton" type="button" value="Agregar" onclick="agregarfila('true');reporte();"
                            <?php echo $Htablaimpre ?>>
                    </div>
                    <div class=" col-sm-12 col-xs-12">
                        <label id="estatusagregar"></label>
                    </div>
                    <div class=" col-sm-6 col-xs-12">
                        <label>Fecha Inicio-Fin</label>
                    </div>
                    <div class=" col-sm-6 col-xs-12 elementos" align="left">
                        <input id="fechauno" style="width:70%" name="fechauno" value="2019/01/01 21:58"
                            onchange="cargarimagenes()">
                        <input id="fechados" style="width:70%" name="fechados" value="<?php echo date("Y/m/d H:i"); ?>"
                            onchange="cargarimagenes()">
                    </div>
                    <div class="col-sm-12 col-xs-12 tabla">
                        <table id="tablaimpresionescompleta" <?php echo $Htablaimpre ?>>
                            <tr id="tablaimpresiones">
                                <th>Fecha</th>
                                <th>Applicativo</th>
                                <th>Tipo Impresión</th>
                                <th>Tipo de papel</th>
                                <th>No. Papel</th>
                                <th>No.Impresiones</th>
                                <th>Eliminar</th>
                                <th onclick="modificartabla('dato')">Modificar</th>
                            </tr>
                        </table>
                    </div>

                </div>

                <div class=" col-sm-12 col-xs-12">
                    <input class="boton guardar" style="width:30%;   text-align: center;" type="submit" name="submitdos"
                        value="Guardar" <?php echo $registrarse ?> />
                </div>



            </div>
    </form>
    <form action="reporte.php" method="post" target="_blank">
        <input type="hidden" name="Noproyecto" id="Noproyecto" value="">
        <input type="hidden" name="disenador2" id="disenador2" value="">
        <input type="hidden" name="fechacreacion" id="fechacreacion" value="">
        <input type="hidden" name="Noorden" id="Noorden" value="">
        <input type="hidden" name="Nombredelproyecto" id="Nombredelproyecto" value="">
        <input type="hidden" name="Detalles" id="Detalles" value="">
        <input type="hidden" name="Usuarioresponsable" id="Usuarioresponsable" value="">
        <input type="hidden" name="area" id="area" value="">
        <input type="hidden" name="fechaultima" id="fechaultima" value="">
        <input type="hidden" name="telefono" id="telefono" value="">
        <input type="hidden" name="correo" id="correo" value="">
        <input type="hidden" name="ordenservicio" id="ordenservicio" value="">
        <input type="hidden" name="cantidadimpresos" id="cantidadimpresos" value="">
        <input type="hidden" name="tabla" id="tabla" value="">
        <input type="hidden" name="bitacora" id="bitacora" value="">
        <input class="boton guardar" type="submit" name="valor" style="width:100%;" value="Generar Reporte">

    </form>
    <?php
            if(isset($_POST['submitdos'])){
                require("registro.php");
            }
            ?>


    <!-- FUNCIONES DE JAVASCRIPT -->
    <?php include 'php/funcionesnuevo/funcionreporte.php';?>
    <?php include 'php/funcionesnuevo/funciontabla.php';?>
    <?php include 'php/funcionesnuevo/emailnuevousuario.php';?>
    <?php include 'php/funcionesnuevo/funcionimagenes.php';?>
    <script>
        // Este apartado es para hacer los calendarios de tipo datetimepicker
        $('#datetimedos').datetimepicker();
        $('#datetime').datetimepicker();
        $('#fechauno').datetimepicker();
        $('#fechados').datetimepicker();
    </script>

</body>

</html>