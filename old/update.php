<?php
include "polacz.php";
 $ID = wczytaj("ID");
 $mark = wczytaj("mark");
 $model = wczytaj("model");
 $color = wczytaj("color");
 $vintage = wczytaj("vintage");
 $transmission = wczytaj("transmission");


$sql = $baza->prepare("UPDATE car SET ID=?, mark=?, model=?, color=?, vintage=?, transmission=? LIMIT 1");
if ($sql)
{
        $sql->bind_param("isssss", $ID, $mark, $model, $vintage, $color, $transmission);
        $sql->execute();
        $sql->close();
}
else
    die( 'Błąd: '. $baza->error);
$baza->close();
header("Location: https://localhost")

?>