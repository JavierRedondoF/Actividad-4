<?php include 'template/header.php' ?>
<!-- Maquetacion de la vista crear, todo el proceso sucede en 'registrar.php' -->

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    Editar datos para Usuario seleccionado
                </div>
                <form action="registrar.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Identificacion:</label>
                        <input type="number" class="form-control" name="txtIdentificacion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ciudad de Origen:</label>
                        <input type="text" class="form-control" name="txtCiudadOrigen" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary mb-2" value="Crear usuario">
                        <a class="btn btn-secondary" href=" index.php">Descartar y volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'template/footer.php' ?>