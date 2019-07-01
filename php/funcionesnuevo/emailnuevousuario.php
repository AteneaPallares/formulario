<script>
     function agregarusuario() {

var dato = $(disenador).val();
var nombreproyecto = $(proyecto).val();
var select = document.getElementById("disenador");

var entrar = true;
var i = 0;
if (dato == "AnAdIr123asd45gfdert76") {
    var opt;
    var nombre = prompt("Nombre:", "");
    var correo = prompt("Correo:", "");

    if (nombre == "" || nombre == null) {
        alert("Nombre vacio");
        entrar = false;
    }
    if (correo == "" || correo == null) {
        entrar = false;
        alert("Correo vacio");
    }
    var sel = document.getElementById("disenador");

    for (var i = 0; i < sel.length; i++) {
        var opt = sel[i];
        if (nombre == opt.value) {
            alert("El usuario ya existe");
            entrar = false;
            break;
        }
    }
    if (entrar) {

        select.options[select.options.length - 1] = new Option(nombre, nombre, false, false);
        select.options[select.options.length] = new Option('Añadir', 'AnAdIr123asd45gfdert76', false, false);
        document.getElementById('nombreusuarionuevo').value = nombre;
        document.getElementById('passwordusuarionuevo').value = "password123";
        document.getElementById('correousuarionuevo').value = correo;
        document.getElementById('disenador').value = nombre;
        alert(nombre);
        var parametros = {
            "username": nombre,
            "passworduser": "password123",
            "correouser": correo

        };
        $.ajax({
            data: parametros,
            url: 'php/registrarnuevo.php',
            type: 'post',
            beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
            },
            success: function (response) {
                $("#resultado").html(response);
            }
        });
        var mensaje = "mailto:" + correo + "?subject=Asignar cuenta&body=%0D%0A Sr " + nombre + "%0D%0A %0D%0A El usuario es: " + nombre + " %0D%0A Contraseña: password123 %0D%0A %0D%0A";
        // 'mailto:anaateneados@gmail.com?subject=Interesting information&body=I thought you might find this information interesting: '
        window.location = mensaje + window.location; return false;


    }
    else {
        alert("Registro cancelado");
        document.getElementById('disenador').value = $(currentuser).val();
        document.getElementById('nombreusuarionuevo').value = null;
        document.getElementById('passwordusuarionuevo').value = null;
        document.getElementById('correousuarionuevo').value = null;
    }
}


}
    </script>