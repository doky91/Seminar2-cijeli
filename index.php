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
<head> 
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
		</div>
		<div class="span8"> 

<?php echo $lang['MAIN_ISLOGGED'];echo $korisnik;?>
<button onclick=logoutck() class="btn btn-default"> Odjava </button>  
        <div id="languages">
<a href="index.php?lang=en"> ENGLISH</a>
<a href="index.php?lang=cro"> HRVATSKI</a>
</div>
  <br>



</div>

</div>

<div class="row">
	<div class="span4"><br>
		<?include ('meni.php');?>
</div>
<br><br><br>
		<div class="span6 offset2 "> 
			<div class="ponuda">

	<?	$link="ponuda.php"."?parametar=3"; 
echo "<a href='$link'>".$lang['OFFERSTO']."</a> " ;

?>	
<br/><br/><br/>
<?	$link2="ponuda.php"."?parametar=2"; 
echo "<a href='$link2'>".$lang['NEEDS']."</a> " ;

?>
</div>
</div>
</div>


</div>
</body>
</html>