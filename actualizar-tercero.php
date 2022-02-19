<?php

include 'funciones.php';

$id = intval($_GET['id']);
$primerNombre = $_POST['primerNombre'];
$segundoNombre = $_POST['segundoNombre'];
$primerApellido = $_POST['primerApellido'];
$segundoApellido = $_POST['segundoApellido'];
$tipoDocumento = $_POST['tipoDocumento'];
$identificacion = $_POST['identificacion'];
$tipoTercero = intval($_POST['tipoTercero']);
$departamento = intval($_POST['departamento']);
$municipio = intval($_POST['municipio']);

actualizarTercero($id, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $tipoDocumento, $identificacion, $tipoTercero, $departamento, $municipio);

$script = "<script>
window.location = 'index.php';</script>";
echo $script;
