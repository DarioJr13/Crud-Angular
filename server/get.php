<?php
/*

    Programado por Dario-Esquina       
    
    Blog:       https://parzibyte.me/blog
    Ayuda:      https://parzibyte.me/blog/contrataciones-ayuda/
    Contacto:   https://parzibyte.me/blog/contacto/
*/ ?>
<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if (empty($_GET["idMascota"])) {
    exit("No hay id de mascota");
}
$idMascota = $_GET["idMascota"];
$bd = include_once "bd.php";
$sentencia = $bd->prepare("select id, nombre, raza, edad from mascotas where id = ?");
$sentencia->execute([$idMascota]);
$mascota = $sentencia->fetchObject();
echo json_encode($mascota);
