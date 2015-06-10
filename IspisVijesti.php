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
<head> <title><? echo $lang['ALL_NEWS']?></title> 
<link rel="stylesheet" href="bootstrap/css/bootstrap.css"  type="text/css"/>

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
		<div class="span2"> 
		<h1><? echo $lang['NEWS_ALL'] ?></h1>
</div>

<div class="span8"> 
<?php echo $lang['MAIN_ISLOGGED'];echo $korisnik;?>
<button onclick=logoutck() class="btn btn-default"> Odjava </button>  

</div>
</div>
<br><br>
<div class="row">
	<div class="span6">
		<?include('meni.php');?>
</div>
<div id="por">
		<div class="span6 offset2"> 
<?php


include ("spajanje.php");


$query="SELECT id,naslov,vrijeme FROM  vijesti ORDER BY vrijeme DESC";
$result=mysqli_query($konekcija,$query) or die('upit ne radi');



while($row = mysqli_fetch_array($result)) {
$novi="OVijesti.php?parametar=".$row['id'];
;
 echo " <a href='$novi'>{$row['naslov']}</a> " ;
 echo"<br>";
  echo"<hr>";
}

?>
		
</div>
</div>
</div>


</body>
</html>
