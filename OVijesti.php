<?php

session_start();
include('provjerajezika.php');
if(isset($_SESSION['username']))
  $korisnik=$_SESSION['username'];

else{ header("Location:Logiranje.php");
exit;
}
?>

<!DOCTYPE html>
<html>
<head> <title><? echo $lang['NEWS_ABT']?> </title> 
<link rel="stylesheet" href="bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<br/><br/>
<div class="row">
		<div class="span4"> 
		<h1> <? echo $lang['MAIN_TITLE']?> </h1>

</div>

</div>

		<div class="span6 offset6"> 
<?php


include ("spajanje.php");
$id=$_GET['parametar'];

$query="SELECT * FROM  vijesti WHERE id=$id";
$result=mysqli_query($konekcija,$query) or die('upit ne radi');



while($row = mysqli_fetch_array($result)) {


 echo "<h1>{$row['naslov']}</h1> " ;
 echo"<br>";
  echo "<i>{$row['vrijeme']}</i> " ;
   echo"<br>";   echo"<br>";   echo"<br>";
   echo "{$row['sadrzaj']} " ;
 
}

?>
		

</div>



</body>
</html>