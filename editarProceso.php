<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=Error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $edad = $_POST['txtEdad'];
    $signo = $_POST['txtSigno'];

    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?, edad=?, signo=? where codigo =?;");
    $resultado = $sentencia->execute([$nombre,$edad,$signo,$codigo]);

    if($resultado === true){
        header('Location: index.php?mensaje=Actualizado');
    }else{
        header('Location: index.php?mensaje=Error');
    }
?>