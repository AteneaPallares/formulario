<script>
      function cargarimagenes() {
            arreglo = [$("#imagennueva").val(), $("#imagennuevados").val()];
            idimagen1 = "#imagennueva";
            contenedor1 = "#contenedor";
            idimagen2 = "#imagennuevados";
            contenedor2 = "#contenedordos";
            inicio(idimagen1, contenedor1, "a");
            inicio(idimagen2, contenedor2, "b");
            eliminarfila("");
            agregarfila("false");
            reporte();
            if($("#rb1").is(':checked')){
                document.getElementById('6').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('2').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('1').style.backgroundColor='rgb(151, 146, 146)';
                document.getElementById('4').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('5').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('3').style.backgroundColor='rgb(216, 208, 208)';
            }else if($("#rb2").is(':checked')){
                document.getElementById('6').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('1').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('2').style.backgroundColor='rgb(151, 146, 146)';
                document.getElementById('4').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('5').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('3').style.backgroundColor='rgb(216, 208, 208)';
            }else if($("#rb3").is(':checked')){
                document.getElementById('6').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('2').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('3').style.backgroundColor='rgb(151, 146, 146)';
                document.getElementById('4').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('5').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('1').style.backgroundColor='rgb(216, 208, 208)';
            }else if($("#rb4").is(':checked')){
                document.getElementById('6').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('2').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('4').style.backgroundColor='rgb(151, 146, 146)';
                document.getElementById('1').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('5').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('3').style.backgroundColor='rgb(216, 208, 208)';
            }else if($("#rb5").is(':checked')){
                document.getElementById('6').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('2').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('5').style.backgroundColor='rgb(151, 146, 146)';
                document.getElementById('4').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('1').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('3').style.backgroundColor='rgb(216, 208, 208)';
            }else if($("#rb6").is(':checked')){
                document.getElementById('1').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('2').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('6').style.backgroundColor='rgb(151, 146, 146)';
                document.getElementById('4').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('5').style.backgroundColor='rgb(216, 208, 208)';
                document.getElementById('3').style.backgroundColor='rgb(216, 208, 208)';
            }
            
        }
        // Esta función se encarga de eliminar todos los elementos de los div contenedores de imagenes
        function limpiar() {
            var d = document.getElementById("contenedor");
            while (d.hasChildNodes())
                d.removeChild(d.firstChild);
            var c = document.getElementById("contenedordos");
            while (c.hasChildNodes())
                c.removeChild(c.firstChild);
        }
        // Esta función se activa cuando se oprime el botón eliminar. Se encarga de cambiar la cadena que contiene
        // las direcciones de las imagenes y manda actualizar los div
        function eliminar(id, check) {
            nuevacadena = $("#" + id + "").val();
            x = 0;
            separador = "?", // un espacio en blanco
                arregloDeSubCadenas2 = nuevacadena.split(separador);
            arregloDeSubCadenas2.pop();
            arregloDeSubCadenas2.forEach(function (valor, indice, array) {
                var d = document.getElementById('' + check + x + '').checked;
                if (d) {
                    aux = $("#" + check + x + "").val();
                    patron = aux + "?",
                        nuevoValor = "",
                        nuevacadena = nuevacadena.replace(patron, nuevoValor);

                }
                x++;
            });
            document.getElementById('' + id + '').value = nuevacadena;
            limpiar();
            cargarimagenes();
        }
        // En esta funcion se asignan las imagenes, los checkbox, y añade los elementos a los div de las imagenes
        function inicio(idimagen, idcontenedor, check) {
            i = 0;
            var URLactual = window.location;
            var urldos = String(URLactual);
            patron = '/nuevo.php',
                nuevoValor = "",
                nuevaCadena = urldos.replace(patron, nuevoValor);
            var cadena = $(idimagen).val();
            separador = "?", // un espacio en blanco
                arregloDeSubCadenas = cadena.split(separador);
            arregloDeSubCadenas.pop();
            arregloDeSubCadenas.forEach(function (valor, indice, array) {
                ruta = nuevaCadena + "/" + valor;
                var principio = (valor.length) - 5;
                var fin = valor.length;
                word = valor.substring(principio, fin);
                iniciop = (valor.length) - 4;
                pdf = valor.substring(iniciop, fin);
                if (word == ".docx") {
                    $(idcontenedor).append('<label><a href="' + ruta + '" target="_blank"><img src="imagenes/word.jpg" height="70px"><input class="imagencheck" type="checkbox" id="' + check + i + '"  value="' + valor + '"></a></label>');
                }
                else if (pdf == ".pdf") {
                    $(idcontenedor).append('<label><a href="' + ruta + '" target="_blank"><img src="imagenes/pdf.jpg" height="70px"><input class="imagencheck" type="checkbox" id="' + check + i + '"  value="' + valor + '"></a></label>');
                }
                else {
                    $(idcontenedor).append('<label><a href="' + ruta + '" target="_blank"><img src="' + valor + '" height="70px"><input class="imagencheck" type="checkbox" id="' + check + i + '"  value="' + valor + '"></a></label>');
                }

                i++;
            });
        }

        // Esta función se llama al insertar una nueva imagen en Imagenes
        function inicializar1() {
            insertarimagenes('cambio', "#cambio", "#contenedor", 0, 'imagennueva');
        }
        // Esta función se llama al insertar una nueva imagen en Logos
        function inicializar2() {
            insertarimagenes('cambiodos', "#cambiodos", "#contenedordos", 1, 'imagennuevados');
        }
        //  Esta funcion se encarga de modificar la cadena de las direcciones de las imagenes con ajax, llamando
        //  a actualizar.php para copiar los archivos a la carpeta archivosbd
        function insertarimagenes(cambio, cambioid, contenedor, iterador, imagennuevatex) {
            var URLactual = window.location;
            var urldos = String(URLactual);
            patron = '/nuevo.php',
                nuevoValor = "",
                nuevaCadena = urldos.replace(patron, nuevoValor);
            var inputFileImage = document.getElementById(cambio);
            var urlimagen = $(cambioid).val();
            urlimagen = urlimagen.split('\\');
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('archivo', file);
            var url = "php/actualizar.php";
            $.ajax({
                url: url,
                type: 'POST',
                contentType: false,
                data: data,
                processData: false,
                cache: false,
                success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    valor = "archivosbd/imagenes/" + urlimagen[urlimagen.length - 1];
                    ruta = nuevaCadena + "/archivosbd/imagenes/" + urlimagen[urlimagen.length - 1];
                    arreglo[iterador] += valor;
                    arreglo[iterador] += "?";
                    document.getElementById(imagennuevatex).value = arreglo[iterador];
                    limpiar();
                    cargarimagenes();
                }

            }).done(function (data) {
                if (data.ok) {

                } else {
                    alert(data.msg)

                }
            })
        }
    </script>