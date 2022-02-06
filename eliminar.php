<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=Error');
    }

    include 'model/conexion.php';

    $codigo = $_GET['codigo'];

    $sentencia= $bd->prepare("DELETE FROM persona where codigo = ?;");
    $resultado= $sentencia->execute([$codigo]);

    if($resultado === TRUE){
        header('Location: index.php?mensaje=Eliminado');
    } else{
        header('Location: index.php?mensaje=Error');
    }
?>