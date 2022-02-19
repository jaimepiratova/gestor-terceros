<?php

include 'funciones.php';

$id = intval($_GET['id']);

eliminarTerceroPorId($id);

$script = "<script>
window.location = 'index.php';</script>";
echo $script;
