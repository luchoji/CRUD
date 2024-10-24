<div class="form-container">
    <div class="card">
        <div class="card-header text-center">
            <h2>Formulario de Registro</h2>
        </div>
        <div class="card-body">
            <form action="insertar.php" method="POST">
                <div class="form-group mb-3">
                    <label for="nombre_completo">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                </div>
                <div class="form-group mb-3">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
                <div class="form-group mb-3">
                    <label for="observacion">Observación</label>
                    <textarea class="form-control" id="observacion" name="observacion" rows="3" required></textarea>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
