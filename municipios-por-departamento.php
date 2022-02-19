<?php

include 'funciones.php';

$id = intval($_GET['id']);

$resultado = buscarMunicipiosPorDepartamentoId($id);

echo json_encode($resultado);
