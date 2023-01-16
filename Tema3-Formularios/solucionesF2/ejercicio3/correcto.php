<?php
include ('./libs/bGeneral.php');
cabecera (""); //el archivo actual

//Recogemos los datos pasados por GET
$nombre=recoge("nombre");
$provincias=recoge("provincia");
$aficiones=recoge("aficiones");
echo $nombre;
echo"<br>";
echo $provincias;
echo"<br>";
//Volvemos a convertir en array los datos serielizados en ejercicio3.php
foreach (unserialize($aficiones) as $aficion)
echo $aficion."<br>";
pie();
