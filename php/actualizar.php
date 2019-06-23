<?php
// Se guardan las imagenes que son ingresadas en imagenes y logos
$return = Array('ok'=>TRUE);
$upload_folder="archivosbd/imagenes";
$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tamano_archivo = $_FILES['archivo']['size'];
$tmp_archivo = $_FILES['archivo']['tmp_name'];
$archivador = $upload_folder . "/". $nombre_archivo;
if (!move_uploaded_file($tmp_archivo, $archivador)) {
	$return = Array('ok' => FALSE, 'msg' => "Ocurrio un error al subir el archivo. ".$nombre_archivo." No pudo guardarse.", 'status' => 'error');
}	
header('Content-Type: application/json');
echo json_encode($return);

?>