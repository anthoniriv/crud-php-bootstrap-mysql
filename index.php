<?php include 'template/header.php'; ?>

<?php
    include_once 'model/conexion.php';
    $sentencia = $bd -> query("select * from persona");
    $personas = $sentencia -> fetchAll(PDO::FETCH_OBJ);
    // print_r($personas)

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- ALERTAS -->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'faltanDatos'){
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Rellene todos los campos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Felicidades!</strong> El usuario fue registrado correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'Actualizado'){
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Felicidades!</strong> El usuario fue actualizado correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'Eliminado'){
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El usuario fue eliminado correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'Error'){
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ups!</strong> Intenta nuevamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }
            ?>
            <!-- FIN ALERTAS -->
            <div class="card">
                <div class="card-header">
                    Lista de Personas
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Signo</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($personas as $dato){
                            ?>
                            <tr>
                                <td scope="row"><?php echo $dato->codigo;?></td>
                                <td><?php echo $dato->nombre;?></td>
                                <td><?php echo $dato->edad;?></td>
                                <td><?php echo $dato->signo;?></td>
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('¿Está seguro de eliminar?')" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Ingresar Datos : 
            </div>
            <form class="p-4" method="POST" action="registrar.php">
                <div class="mb-3">
                    <label class="form-lable">Nombre: </label>
                    <input type="text" class="form-control" name="txtNombre" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-lable">Edad: </label>
                    <input type="number" class="form-control" name="txtEdad" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-lable">Signo: </label>
                    <input type="text" class="form-control" name="txtSigno" autofocus required>
                </div>
                <div class="d-grid">
                    <input type="hidden" name="oculto" value="1">
                    <input type="submit" class="btn btn-primary" value="Registrar">
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>