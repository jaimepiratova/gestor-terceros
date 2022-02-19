<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Terceros</title>
</head>

<body>

    <?php
        include 'funciones.php';

        $terceros = obtenerTerceros();
    ?>

    <div class="container">
        <h1>Terceros</h1>
        <a class="btn btn-primary" href="crear-editar-formulario.php" role="button">Crear tercero</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Departamento</th>
                    <th scope="col">Municipio</th>
                    <th scope="col">Tipo ID</th>
                    <th scope="col">Número ID</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Tipo Tercero</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($terceros as $e) { ?>
                        <tr>
                            <td><?php echo $e[1]; ?></td>
                            <td><?php echo $e[2]; ?></td>
                            <td><?php echo $e[3]; ?></td>
                            <td><?php echo $e[4]; ?></td>
                            <td><?php echo $e[5] . ' ' . $e[7]; ?></td>
                            <td><?php echo $e[9]; ?></td>
                            <td><a class="btn btn-warning" href="editar-formulario.php?id=<?php echo $e[0]; ?>" role="button">Editar</a> | <a class="btn btn-danger" href="eliminar.php?id=<?php echo $e[0]; ?>" role="button">Eliminar</a></td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
</body>

</html>