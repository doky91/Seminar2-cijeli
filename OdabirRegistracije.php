<?php
session_start();
include('provjerajezika.php');

?>
<!DOCTYPE html>
<html>
<head> <title><? echo$lang['REG_TITLE'];?></title> 
<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<br/><br/>
<header>
		<div class="span4"> 
		<h1> <? echo $lang['MAIN_TITLE']?></h1>

</div>

		<div class="span6 offset6" id="logout-jezik">
			        <div id="languages">
<a href="OdabirRegistracije.php?lang=en"> ENGLISH</a>
<a href="OdabirRegistracije.php?lang=cro"> HRVATSKI</a>
</div>
</header>
<aside></aside>
<article>
<p> <? echo $lang['AREYOU']?> </p>

<?	$link="registracija_korisnika_m.php";
echo "<a href='$link'>".$lang['DONOR']."</a> " ;

?>

<br />
		<p> <? echo $lang['ORAREYOU']?></p>

<?	$link2="RegistracijaUstanove.php"; 
echo "<a href='$link2'>".$lang['HOMEOF']."</a> " ;
?>

</article>



</body>
</html>