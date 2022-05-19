<?php
require_once('conn.php');
$data = new Database();
if(empty($_SESSION["login"]))
{
   header("Location: http://localhost/jdj/Kamil/konta.php");
}
echo 'Witaj ' . $_SESSION["login"] . "!";
if($data->checkRole($_SESSION['login'])) : ?>
<table class="table table-hover table-dark">
    <thead>
<tr class="tabelka2">
    <th>
        ID
    </th>
    <th>
        ID samochodu
    </th>
    <th>
        Marka
    </th>
    <th>
        Model
    </th>
    <th>
        Vintage
    </th>
    <th>
        Color
    </th>
    <th>
        Transmission
    </th>
    <th>
        Edytuj
    </th>
    <th>
        Usuń
    </th>
  <th>
  <a href="http://localhost/jdj/Kamil/wyloguj.php">
  <button  class="btn btn-info">Wyloguj</button></a>
</th>
    
</tr>

<?php
require_once('polacz.php');
$sql="SELECT * FROM car";
$result=mysqli_query($baza ,$sql);
$ctn=1;
if(mysqli_num_rows($result)>0)
{
 while($row=mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?= $ctn?></td>   
    <td><?= $row['ID']?></td>
    <td><?= $row['mark']?></td>
    <td><?= $row['model']?></td>
    <td><?= $row['vintage']?></td>
    <td><?= $row['color']?></td>
    <td><?= $row['transmission']?></td>
    <td>

    <?php
    if($_SESSION['login'] == 'admin' || $_SESSION['login'] == 'editor' ) : ?>
    <a href="Functions/update.php?ID=<?= $row['ID']?>&mark=<?= $row['mark']?>&model=<?= $row['model']?>&vintage=<?= $row['vintage']?>&color=<?= $row['color']?>&transmission=<?= $row['transmission']?>">
    <button  class="btn btn-info">Edytuj</button></a>
    <?php
endif;
?>
    </td>
    <td>
    <?php if ($_SESSION['login'] == 'admin') : ?>
    <a href="Functions/delete.php?ID=<?= $row['ID']?>">
    <button class="btn btn-danger">Usuń</button></a>
    <?php
endif;
?>
    </td>

</tr>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form method="GET" action="Functions/process.php">
      
		ID:<br>
		<input type="int" name="ID">
		<br>
		Mark:<br>
		<input type="text" name="mark">
		<br>
		Model:<br>
		<input type="text" name="model">
		<br>
		Vintage:<br>
		<input type="text" name="vintage">
        <br>
		Color:<br>
		<input type="text" name="color">
        <br>
    Transmission
    <select class="form-control" name="transmission">
      <option>Manual</option>
      <option>Automatic</option>
    </select>

		<br><br>
		<input type="submit" name="save" value="Dodaj">
	</form>
  </div>

</div>
        
        
<?php
$ctn++;
};
}
else{
?>
<TD colspan="7">
    <?= 'brak danych'?>
</TD>

<?php
}
mysqli_close($baza);
?>
</thead>
</table>
    <?php
    if($_SESSION['login'] == 'admin' || $_SESSION['login'] == 'editor' ) : ?>
    <button id="myBtn" class="btn btn-success btn-lg btn-block" >Dodaj</button>
    <?php
endif;
?>
<?php
endif;
?>