<?php
session_start();

if(isSet($_GET['lang']))
{
$lang = $_GET['lang'];
 

$_SESSION['lang'] = $lang;
}

else
{
$lang = 'cro';
}
 

 switch ($lang) {
  case 'en':
  $lang_file = 'lang.en.php';
  break;
 
  case 'cro':
  $lang_file = 'lang.cro.php';
  break;
    default:
  $lang_file = 'lang.crp.php';
}
include_once 'languages/'.$lang_file;



if(isset($_SESSION['username']))
  $korisnik=$_SESSION['username'];
else{ header("Location:Logiranje.php");
exit;
}
?>
<!DOCTYPE html>
<html>
<head> 
<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
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
		</div>
		<div class="span8" id="logout-jezik">
<?php echo $lang['MAIN_ISLOGGED'];echo $korisnik;?>
<button onclick=logoutck() class="btn btn-default"> Odjava </button>  
        <div id="languages">
<a href="index.php?lang=en"> ENGLISH</a>
<a href="index.php?lang=cro"> HRVATSKI</a>
</div>
</div>
</header>
<aside>
	<div class="span4">
		<?include ('meni.php');?>
</div>
</aside>
<article>
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
</article>
</body>
</html>