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
<link rel="stylesheet" href="css/bootstrap.css"  type="text/css">
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
<header>
		<div class="span4"> 
	<h1> <? echo $lang['MAIN_TITLE']?></h1>

            <div class="span8" id="logout-jezik">

                <?php echo $lang['MAIN_ISLOGGED'];echo $korisnik;?>
                <button onclick=logoutck() class="btn btn-default"> Odjava </button>
                <!--
                <div id="languages">
                    <a href="ponuda.php?lang=en"> ENGLISH</a>
                    <a href="ponuda.php?lang=cro"> HRVATSKI</a>
                </div>
                -->
</div>
</header>
<aside>
    <div class="span6">
        <?include('meni.php');?>
    </div>
</aside>

<article>


		<div id="por" class="span6 offset2">
<?php

$ide=$_GET['parametar'];

include ("spajanje.php");

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
</article>
</body>
</html>
