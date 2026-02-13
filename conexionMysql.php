<?php
    $host="localhost";
    $user="root";
    $pass="1234";
    $db="db_users";

    $dbsys="mysql:host=$host;dbname=$db";

    try {
        $conex = new PDO($dbsys, $user, $pass);
        $conex -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexion: OK";
    } catch (PDOException $exception) {
        echo "Fallo en la conexion: ".$exception -> getMessage();
    }
?>