<html>
<head>
<meta charset="utf-8">
</head>
 
<body>
<form action="silnia.php" method="GET">
            	Podaj liczbę:	
                <input type="text" name="silnia"> 
            	<input type="submit" value="Wyślij" />
    </form>
</body>
</html>


<?php
$liczba = $_GET['silnia'];
 
function liczsil($n) {
	if($n >= 2)
	return $n * liczsil($n-1);
	else return 1;
	
}
 
 
 
echo liczsil($liczba);

?>