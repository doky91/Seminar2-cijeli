<?php 
session_start();
$koji=$_SESSION['id'];
$tema=$_SESSION['tema'];
$korisnik=$_SESSION['username'];

include('provjerajezika.php');

?>
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
            <a href="PostTema.php?lang=en"> ENGLISH</a>
            <a href="PostTema.php?lang=cro"> HRVATSKI</a>
        </div>
    </div>
</header>

<aside>
	<div class="span4"><br>
		<?include ('meni.php');?>
</div>
</aside>
<article>
		<div class="span6 offset2"> 
<?php


include ("spajanje.php");
$ide=$_GET['parametar'];

$query="SELECT * FROM  porukeDonacije WHERE idTeme=$ide";
$result=mysqli_query($konekcija,$query) or die('upit ne radi');

while($row = mysqli_fetch_array($result)) {
 echo"<br>";

echo $lang['USR']." <b>".$row['korisnikIme']."</b>".$lang['SAID']."</br>";
 echo "{$row['tekst']} " ;
 echo"<br>";

}
 echo"<br>";
 
?>
	
<?php $link="UnosPoruke.php?para=".$ide;?>

<form action="<?php echo $link?>" method="POST">
<label><b><? echo $lang['ENTER_MSG'] ?></b></label>
<textarea class="form-control" rows="6" name="poruka"></textarea>

<button type="submit" class="btn btn-default" ><? echo $lang['ENTER_MSG']?> </button>

</form>
</div>
</article>

</body>
</html>