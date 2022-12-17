<?php
$consulta = $conn->prepare("SELECT * FROM ROL");
$consulta->execute();
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Roles
    </div>
    <div class="card-body table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $presentacion) : ?>
                    <tr>
                        <th scope="row"><?php echo $presentacion['IdRol'] ?></th>
                        <td><?php echo $presentacion['DescripcionRol'] ?></td>
                        <td>
                            <a href="javascript:cargarPagina('formEditarRol.php?id=<?php echo $presentacion['IdRol'] ?>')" class="btn btn-warning">Editar</a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rolConfirmacion<?php echo $presentacion['IdRol'] ?>">Eliminar</button>
                        </td>
                    </tr>
                    <div class="modal fade" id="rolConfirmacion<?php echo $presentacion['IdRol'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center" id="mensaje">
                                    <p>¿Está seguro que desea eliminar el rol <?php echo $presentacion['DescripcionRol']; ?>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="cargarPagina('functions/eliminarRol.php?id=<?php echo $presentacion['IdRol'] ?>')">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>            
            </tbody>
        </table>
    </div>
</div>