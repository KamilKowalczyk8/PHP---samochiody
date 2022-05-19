<html>
 <head>
  <meta charset="utf-8">
  <title>Dodaj nowy obiekt</title>
 </head>
 <body>
  <h1>Dodawanie do bazy</h1>
  <form method="get" action="insert.php">
   <table border="0">
      <tr><td>ID</td><td><input type="number" name="ID" maxlen="11" size="20"></td></tr>
      <tr><td>mark</td><td><input name="mark"></td></tr>
      <tr><td>model</td><td><input name="model"></td></tr>
      <tr><td>vintage</td><td><input  name="vintage"></td></tr>
      <tr><td>color</td><td><input name="color"></td></tr>
	  <tr><td>transmission</td><td><input name="transmission"></td></tr>
      <tr><td colspan="2"><input type="submit" value="wstaw"></td></tr>
   </table>
  </form>
 </body>
</html>