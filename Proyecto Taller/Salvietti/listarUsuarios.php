<?php
include("functions/conexion.php");
$conn = Conexion::conectar();

$consulta = $conn->prepare("SELECT * FROM USUARIO INNER JOIN ROL on USUARIO.IdRol = ROL.IdRol");
$consulta->execute();
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Listado de Usuarios
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $usuario) : ?>
                    <tr>
                        <th scope="row"><?php echo $usuario['IdUsuario'] ?></th>
                        <td><?php echo $usuario['Documento'] ?></td>
                        <td><?php echo $usuario['NombreCompleto'] ?></td>
                        <td><?php echo $usuario['Correo'] ?></td>
                        <td><?php echo $usuario['Contraseña'] ?></td>
                        <td><?php echo $usuario['DescripcionRol'] ?></td>
                        <td>
                            <a href="javascript:cargarPagina('formEditarUsuario.php?id=<?php echo $usuario['IdUsuario'] ?>')" class="btn btn-warning">Editar</a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalConfirmacion<?php echo $usuario['IdUsuario'] ?>">Eliminar</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalConfirmacion<?php echo $usuario['IdUsuario'] ?> ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center" id="mensaje">
                                    <p>¿Está seguro que desea eliminar el usuario <?php echo $usuario['NombreCompleto']; ?>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="cargarPagina('functions/eliminarUsuario.php?id=<?php echo $usuario['IdUsuario'] ?> ?>')">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>