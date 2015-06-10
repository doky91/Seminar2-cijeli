<?php

session_start();
$tip=$_SESSION['id'];

include('provjerajezika.php');

if($tip!=1){
header('Location: greska.php');
exit;

}




else{}
?>



<html>
<head>
<title>Admin</title> 
<link rel="stylesheet" href="bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="application/javascript">

function logoutck() {
    var odjava = confirm("Odlaziš?");
    if (odjava) {
       window.location.href = 'logout.php';
    }
}
</script>

</head>
<body><br>
	<div class="row">
		<div class="span6 offset2">
<?include('meni.php');?>

		</div>
<div class="span6">
<p><b><? echo $lang['NEW_DEL']?></b></p>

<?php


include('spajanje.php');

$query =  "SELECT id,naslov FROM vijesti";
      
$result = mysqli_query($konekcija, $query);



echo "<table>";

while($row = mysqli_fetch_array($result)) {

 echo "<tr><td>{$row['id']}</td><td>{$row['naslov']} </td></tr>" ;

}

echo "</table>";
?>
<form action="AdminAkcije.php" method="post">
	<input type="hidden" name="akcija" value="vijest"> 
<input type="tekst" name="broj">
<button type="submit" class="btn btn-default"><? echo $lang['BTTN_DEL'] ?> </button>

</form>

<?php

$query =  "SELECT id,naslov FROM temeDonacija";
      
$result = mysqli_query($konekcija, $query) or die('nope');



echo "<table>";

while($row = mysqli_fetch_array($result)) {

 echo "<tr><td>{$row['id']}</td><td>{$row['naslov']} </td></tr>" ;

}

echo "</table>";
?>


<p><b><? echo $lang['ADD_DEL']?></b></p>
<form action="AdminAkcije.php" method="post">
	<input type="hidden" name="akcija" value="tema"> 
<input type="tekst" name="brojic">
<button type="submit" class="btn btn-default"><? echo $lang['BTTN_DEL'] ?> </button>
</form>
</div></div>

</body>

</html>




