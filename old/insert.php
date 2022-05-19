<?php
include "polacz.php";
 $ID = wczytaj("ID");
 $model = wczytaj("model");
 $mark = wczytaj("mark");
 $vintage = wczytaj("vintage");
 $color = wczytaj("color");
 $transmission = wczytaj("transmission");


$sql = $baza->prepare("INSERT INTO car VALUES (?, ?, ?, ?, ?, ?);");
if ($sql)
{
        $sql->bind_param("isssss", $ID, $model, $mark, $vintage, $color, $transmission);
        $sql->execute();
        echo $baza->error;
        $sql->close();
}
else
    die( 'Błąd: '. $baza->error);
$baza->close();
header("Location: https://localhost")

	
?>