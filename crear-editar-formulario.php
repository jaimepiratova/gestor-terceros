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

        $departamentos = obtenerDepartamentos();
        $ciudades = obtenerCiudades();
        $tipoTerceros = obtenerTipoTerceros();
    ?>

    <div class="container">
        <h1>Crear/Editar Tercero</h1>
        <form class="form-horizontal" action="crear-tercero.php" method="POST">
            <fieldset>

                <!-- Form Name -->
                <legend>Tercero</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="primerNombre">Primer nombre</label>
                    <div class="col-md-5">
                        <input id="primerNombre" name="primerNombre" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="segundoNombre">Segundo nombre</label>
                    <div class="col-md-5">
                        <input id="segundoNombre" name="segundoNombre" type="text" placeholder="" class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="primerApellido">Primer apellido</label>
                    <div class="col-md-5">
                        <input id="primerApellido" name="primerApellido" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="segundoApellido">Segundo apellido</label>
                    <div class="col-md-5">
                        <input id="segundoApellido" name="segundoApellido" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="tipoDocumento">Tipo documento</label>
                    <div class="col-md-5">
                        <select id="tipoDocumento" name="tipoDocumento" class="form-control">
                            <option value="CC">CC</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                        </select>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="identificacion">Número identificación</label>
                    <div class="col-md-5">
                        <input id="identificacion" name="identificacion" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="tipoTercero">Tipo tercero</label>
                    <div class="col-md-5">
                        <select id="tipoTercero" name="tipoTercero" class="form-control">
                        <?php
                            foreach($tipoTerceros as $e) {
                                ?>
                                    <option value="<?php echo $e[0]; ?>"><?php echo $e[1]; ?></option>
                                <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="departamento">Departamento</label>
                    <div class="col-md-5">
                        <select id="departamento" name="departamento" class="form-control">
                            <?php
                                foreach($departamentos as $e) {
                                    ?>
                                        <option value="<?php echo $e[0]; ?>"><?php echo $e[1]; ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="municipio">Municipio</label>
                    <div class="col-md-5">
                        <select id="municipio" name="municipio" class="form-control">
                        <?php
                            foreach($ciudades as $e) {
                                ?>
                                    <option value="<?php echo $e[0]; ?>"><?php echo $e[1]; ?></option>
                                <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for=""></label>
                    <div class="col-md-4">
                        <button id="" name="" class="btn btn-success">Guardar</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            let $idDepartamento = $('#departamento').val();

            $.ajax('municipios-por-departamento.php?id=' + $idDepartamento).done((data) => {
                    data = JSON.parse(data);
                    $('#municipio')
                    .find('option')
                    .remove();

                    data.forEach((v) => {
                        $('#municipio').append(`<option id="${v['id']}">${v['nombmuni']}</option>`);
                    });
                });

            $('#departamento').on('change', function() {
                $id = this.value;

                $.ajax('municipios-por-departamento.php?id=' + $id).done((data) => {
                    data = JSON.parse(data);
                    $('#municipio')
                    .find('option')
                    .remove();

                    data.forEach((v) => {
                        $('#municipio').append(`<option id="${v['id']}">${v['nombmuni']}</option>`);
                    });
                });
            })
        });
    </script>
</body>

</html>