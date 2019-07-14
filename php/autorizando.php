
        
                   
                    <?php
                    if($username=="gestor"){
                            echo ' <input type="hidden"  id="tablaimpresiones" name="tablaimpresiones" value="<?php echo $tablaimpre ?>" >
                            <input type="hidden"  name="cantidadimpre" id="cantidadimpresiones" value="<?php echo $noimpredos ?>">
                            <input type="hidden" name="cantidadpapel" id="cantidadpapel" value="<?php echo $nopapel ?>">
                            
                            <input type="hidden"  name="bitacora" value="'.$bitacora.'">
                           ';

                    }
                    elseif($username!="admin"){
                            ?>
                        <input type="hidden" name="numero" id="numeroproyecto"  value="<?php echo $numero ?>">
                        <input type="hidden" name="Orden"   value="Orden">
                        <input  type="hidden" name="time" value="<?php echo $fechados ?>">
                        <input  type="hidden" id="orden1" name="ordenservicio" value="<?php echo $ordenservicio ?>" >\
                        <input type="hidden" name="disenador" id="disenador" value="<?php echo $disenador ?>">
                        <input type="hidden" name="detalles" id="disenador" value="<?php echo $detalles ?>">
                                <input type="hidden" name="proyecto" id="proyecto" value="<?php echo $proyecto ?>">
                                <input type="hidden" name="numerodos" value="<?php echo $numero ?>">
                                <input type="hidden"  id="fechacreacion1" name="fechad"value="<?php echo $fecha ?>">
                                <input type="hidden" name="memo" value="<?php echo $memo ?>" >
                                <input type="hidden" name="proyectodos" value="<?php echo $proyecto ?>">
                                <input type="hidden" name="info" value="<?php echo $info ?>" >
                                <input  type="hidden" name="usuario" id="usuario" value="<?php echo $responsable ?>" >
                                <input type="hidden" id="telefono1" name="tel" value="<?php echo $tel ?>" >
                                <input type="hidden" name="area" id="area1" value="<?php echo $area ?>" >
                                 <input type="hidden" name="correo" id="correo1" value="<?php echo $correo ?>">
                                <input type="hidden" name="impreso" id="cantidadimpresos1" value="<?php echo $noimpresos ?>">
                                <input  type="hidden"  name="estatus" value="1">
                                <input type="hidden" name="estatus" value="2">
                                <input type="hidden" name="estatus" value="3">
                                <input type="hidden" name="estatus"  value="4">
                                <input type="hidden"  name="estatus" value="5">
                                <input type="hidden" name="estatus" value="6">';


                    <?php
                    }
                    ?>
                    