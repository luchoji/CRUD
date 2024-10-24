<!-- Incluye CSS de DataTables y Responsive DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

<div class="container mt-5">
    <h3 class="text-center">Datos Registrados</h3>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="miTabla" class="table table-bordered table-striped display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Completo</th>
                            <th>Dirección</th>
                            <th>Observación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'conexion.php';

                    $sql = "SELECT id, nombre_completo, direccion, observacion FROM tabla";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["nombre_completo"] . "</td>
                                    <td>" . $row["direccion"] . "</td>
                                    <td>" . $row["observacion"] . "</td>
                                    <td>
                                        <a href='editar.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Editar</a>
                                        <a href='eliminar.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('¿Estás seguro de que deseas eliminar este registro?');\">Eliminar</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>No hay datos registrados</td></tr>";
                    }

                    $conn->close();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Incluye jQuery y JS de DataTables y Responsive DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function() {
        $('#miTabla').DataTable({
            responsive: true, // Hacer que la tabla sea completamente responsive
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
            }
        });
    });
</script>
