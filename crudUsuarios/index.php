<?php include 'template/header.php' ?>

<?php
include_once "./model/connection.php";
$sentencia = $bd->query("SELECT * FROM usuario");  /* SQL Consulta para Seleccionar todos los usuarios de la tabla */
// Variable usuario sera utilizada a lo largo del proyecto para referirse a cada registro en la base de datos tipo 'usuario'
$usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <!-- Inicio de Alerta para validacion cuando falten datos -->
                <!-- Alerta para informar al usuario que hacen falta datos en el formulario -->
                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error:</strong> Debe rellenar toda la informacion del usuario.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }

                ?>

                <!-- Mensaje del resultado de la operacion de crear nuevo usuario -->
                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Usuario Registrado</strong> satisfactoriamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>
                <!-- Mensaje de alerta cuando no exista el codigo del usuario para editar o eliminar-->
                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> vuelve a intentar.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>
                <!-- Mensaje de resultado de la operacion al editar un usuario existente -->
                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Usuario editado</strong> satisfactoriamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>
                <!-- Mensaje de resultado de la operacion el eliminar un usuario exostente -->
                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Usuario eliminado</strong> satisfactoriamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>

                <!-- Fin de Alerta para validacion cuando falten datos -->
                <div class="card">
                    <div class="card-header text-center">
                        Listado de usuarios
                    </div>
                    <div class="p-4">
                        <div class="table-responsive align-middle">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">#</th> -->
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Identificacion</th>
                                        <th scope="col">Ciudad de Origen</th>
                                        <th scope="col" colspan="2">Opciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Se llena la tabla html con hijos <td> como usuarios existan en la bd -->
                                    <?php
                                    foreach ($usuario as $dato) {
                                    ?>
                                        <tr class="">
                                            <td><?php echo $dato->nombre; ?></td>
                                            <td><?php echo $dato->identificacion; ?></td>
                                            <td><?php echo $dato->ciudad; ?></td>
                                            <td><a href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square text-success"></i></a></td>
                                            <td><a onclick="return confirm('Estas seguro de eliminar usuario?')" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash text-danger"></i></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
<?php include 'template/footer.php' ?>