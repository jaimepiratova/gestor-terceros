<?php

include_once 'conexion.php';


function obtenerDepartamentos() {
    $conexion = conectar();

    $sql = 'SELECT * FROM departamento';
    $departamentos = [];

    $resultado = mysqli_query($conexion, $sql);

    while ($fila = mysqli_fetch_row($resultado)) {
        $departamentos[] = $fila;
    }

    return $departamentos;
}


function obtenerTerceros() {
    $conexion = conectar();

    $sql = 'SELECT T.id, D.nombdepa, M.nombmuni, T.tipoidentificacion, T.numeroidentificacion, T.nombre1, T.nombre2, T.apellido1, T.apellido2, TT.nombtipo FROM tercero AS T INNER JOIN departamento AS D ON T.iddepartamento = D.id INNER JOIN municipio AS M ON T.idmunicipio = M.id INNER JOIN tipotercero AS TT ON T.tipotercero = TT.id';
    $terceros = [];

    $resultado = mysqli_query($conexion, $sql);

    while ($fila = mysqli_fetch_row($resultado)) {
        $terceros[] = $fila;
    }

    return $terceros;
}


function obtenerCiudades() {
    $conexion = conectar();

    $sql = 'SELECT * FROM municipio';
    $ciudades = [];

    $resultado = mysqli_query($conexion, $sql);

    while ($fila = mysqli_fetch_row($resultado)) {
        $ciudades[] = $fila;
    }

    return $ciudades;
}


function obtenerTipoTerceros() {
    $conexion = conectar();

    $sql = 'SELECT * FROM tipotercero';
    $tipoTerceros = [];

    $resultado = mysqli_query($conexion, $sql);

    while ($fila = mysqli_fetch_row($resultado)) {
        $tipoTerceros[] = $fila;
    }

    return $tipoTerceros;
}

function crearTercero($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $tipoDocumento, $identificacion, $tipoTercero, $departamento, $municipio) {
    $conexion = conectar();

    $sql = "INSERT INTO tercero VALUES(DEFAULT, '$tipoDocumento', '$identificacion', '$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido', $tipoTercero, $departamento, $municipio)";

    mysqli_query($conexion, $sql);
}

function eliminarTerceroPorId($id) {
    $conexion = conectar();

    $sql = "DELETE FROM tercero WHERE id = $id";

    mysqli_query($conexion, $sql);
}

function buscarTerceroPorId($id) {
    $conexion = conectar();

    $sql = "SELECT T.id, D.nombdepa, M.nombmuni, T.tipoidentificacion, T.numeroidentificacion, T.nombre1, T.nombre2, T.apellido1, T.apellido2, TT.nombtipo,D.id AS depId, M.id AS munId, TT.id AS ttId FROM tercero AS T INNER JOIN departamento AS D ON T.iddepartamento = D.id INNER JOIN municipio AS M ON T.idmunicipio = M.id INNER JOIN tipotercero AS TT ON T.tipotercero = TT.id WHERE T.id = $id";

    $resultado = mysqli_query($conexion, $sql);
    $terceros = [];

    while ($fila = mysqli_fetch_row($resultado)) {
        $terceros[] = $fila;
    }

    return $terceros[0];
}

function actualizarTercero($id, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $tipoDocumento, $identificacion, $tipoTercero, $departamento, $municipio) {
    $conexion = conectar();

    $sql = "UPDATE `tercero` SET `tipoidentificacion`='$tipoDocumento',`numeroidentificacion`='$identificacion',`nombre1`='$primerNombre',`nombre2`='$segundoNombre',`apellido1`='$primerApellido',`apellido2`='$segundoApellido',`tipotercero`=$tipoTercero,`iddepartamento`=$departamento,`idmunicipio`=$municipio WHERE id = $id";

    mysqli_query($conexion, $sql);
}

function buscarMunicipiosPorDepartamentoId($id) {
    $conexion = conectar();

    $sql = "SELECT * FROM municipio WHERE iddepa = $id";

    $resultado = mysqli_query($conexion, $sql);

    $contenido = array();

    while($fila = mysqli_fetch_assoc($resultado)) {
        $contenido[] = $fila;
    }

    return $contenido;
}
