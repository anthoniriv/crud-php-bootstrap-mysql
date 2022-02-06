<?php
$contrasena= "";
$usuario = "root";
$servidor = "crud";

try{
    $bd= new PDO(
        'mysql:host=localhost;
        dbname='.$servidor,
        $usuario,
        $contrasena,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
    );
} catch (PDOException $e){
    echo "Problema con la conexion: ".$e->getMessage();
}
?>