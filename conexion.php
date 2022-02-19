<?php

function conectar() {
    $conexion = mysqli_connect('localhost', 'root', '', 'pruebadesa_jaime') or die('No se pudo realizar la conexión a la base de datos');

    return $conexion;
}

function desconectar($conexion) {
    mysqli_close($conexion);
}
