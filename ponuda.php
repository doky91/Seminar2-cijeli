<?php 
session_start();
$_SESSION['tema']=$_GET['parametar'];
if(isset($_SESSION['username']))
  $korisnik=$_SESSION['username'];

else{ header("Location:Logiranje.php");
exit;
}
include('provjerajezika.php');
?>

<!DOCTYPE html>
<html>
<head> <title><? echo $lang['ADDS'];?></title> 
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

<body>
<br/><br/>
<div class="row">
		<div class="span4"> 
	<h1> <? echo $lang['MAIN_TITLE']?></h1>

<div class="span6">
	<?include('meni.php');?>
	</div>
	<?php echo $lang['MAIN_ISLOGGED'];echo $korisnik;?>

<button onclick=logoutck() class="btn btn-default"> Odjava </button> 
</div>


		<div class="span6 offset2"> 

		<div id="por"> 
<?php

$ide=$_GET['parametar'];

include ("spajanje.php");


echo "<br>";echo "<br>";echo "<br>";

$query="SELECT * FROM temeDonacija WHERE idVrsta=$ide ORDER BY vrijeme DESC";
$result=mysqli_query($konekcija,$query) or die('upit ne radi');



while($row = mysqli_fetch_array($result)) {

$novi="PostTema.php?parametar=".$row['id'];

 echo " <a href='$novi'>{$row['naslov']}</a> " ;
 echo"<br>";
 echo "<hr>";


}

?>
		

</div>

</div>

</body>
</html>
