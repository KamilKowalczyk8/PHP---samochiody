<?php
include "polacz.php";
$ID = wczytaj("ID");
if ( $sql = $baza->prepare( "SELECT * FROM car WHERE ID = ?;"))
{
  $sql->bind_param("i" ,$ID);
  $sql->execute();
  $sql->bind_result($ID, $mark, $model, $vintage, $color, $transmission);
  if (!$sql->fetch())  die("Blad!!! Brak rekordu do edycji w bazie!!! Liczba rekodow:".$sql->num_rows);


 /////////////////////// HTML w PHP
 echo '
 <html>
  <head>
   <meta charset="utf-8">
   <title>Edycja obiektu</title>
  </head>
  <body>
   <h1>Edycja rekordu z bazy</h1>
   <form method="get" action="update.php">
    <table border="0">
      <tr><td>ID</td><td><input name="ID" value="'.$ID.'" disabled>
              <input type="hidden" name="ID" value="'.$ID.'">  </td></tr>
      <tr><td>mark</td><td><input name="mark" value="'.$mark.'" maxlen="20" size="20"></td></tr>
      <tr><td>model</td><td><input name="model" value="'.$model.'" maxlen="20" size="20"></td></tr>
      <tr><td>vintage</td><td><input name="vintage" value="'.$vintage.'"></td></tr>
      <tr><td>color</td><td><input   min="1" max="1000000" name="color" value="'.$color.'"></td></tr>
	  <tr><td>transmission</td><td><input   min="1" max="1000000" name="transmission" value="'.$transmission.'"></td></tr>
      <tr><td colspan="2"><input type="submit" value="zapisz zmiany"></td></tr>
    </table>
   </form>
  </body>
 </html>
 ';
 $sql->close();
 }
$baza->close();
?>