<?php include 'template/header.php' ?>

<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include_once 'model/connection.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("select * from usuario where codigo = ?;");
$sentencia->execute([$codigo]);
$usuario = $sentencia->fetch(PDO::FETCH_OBJ);
?>

<!-- Maquetacion de la vista editar, todo el proceso sucede en 'editarProceso.php' -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    Editar datos para Usuario seleccionado
                </div>
                <form action="editarProceso.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required value="<?php echo $usuario->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Identificacion:</label>
                        <input type="number" class="form-control" name="txtIdentificacion" autofocus required value="<?php echo $usuario->identificacion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ciudad de Origen:</label>
                        <input type="text" class="form-control" name="txtCiudadOrigen" autofocus required value="<?php echo $usuario->ciudad; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $usuario->codigo; ?>">
                        <input type="submit" class="btn btn-primary mb-2" value="Guardar cambios">
                        <a class="btn btn-secondary" href=" index.php">Descartar Cambios y volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>