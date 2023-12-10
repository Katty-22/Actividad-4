<?php
include('view/head.php');
include('model/usuarioModel.php');

$usuario  =  new usuarioModel();

$pacientes = $usuario->index();


?>

<div class="container-sm">
<h2>Pacientes</h2>
<table class="table">
  <thead>
    <tr>
     
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Telefono</th>
      <th scope="col">Sexo</th>
      <th scope="col">cita</th>
      <th scope="col">Acciones</th>

    </tr>
  </thead>
  <tbody>
        <?php if($pacientes): ?>
        <?php foreach($pacientes as $pacientes): ?>
        <tr>
            <th><?= $pacientes[1] ?></th>
            <th><?= $pacientes[3] ?></th>
            <th><?= $pacientes[4] ?></th>
            <th><?= $pacientes[2] ?></th>
            <th><?= $pacientes[5] ?></th>

            <th>
                <a href="view/edit.php?id=<?= $pacientes[0]?>" class="btn btn-success">Modificar</a>
                <!-- Button trigger modal -->
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#id<?=$pacientes[0]?>">Eliminar</a>
                <!-- Modal -->
                <div class="modal fade" id="id<?=$pacientes[0]?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el registro?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Una vez eliminado no se podra recuperar el registro
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                <a href="delete.php?id=<?= $pacientes[0]?>" class="btn btn-danger">Eliminar</a>
                                <button type="button" >Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </th>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="3" class="text-center">No hay registros actualmente</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>  
</div>
