<?php

session_start();
$tip=$_SESSION['id'];
$korisnik=$_SESSION['username'];

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
            <a href="AdminBrisanje.php?lang=en"> ENGLISH</a>
            <a href="AdminBrisanje.php?lang=cro"> HRVATSKI</a>
        </div>
    </div>
</header>
<aside>
		<div class="span6 offset2">
<?include('meni.php');?>
		</div>
</aside>
<article>
<div class="span6">
<p><b><? echo $lang['NEW_DEL']?></b></p>

<?php

include('spajanje.php');

$query =  "SELECT id,naslov FROM vijesti";
      
$result = mysqli_query($konekcija, $query);

echo "<table class=\"table table-bordered\">";

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

echo "<table class=\"table table-bordered\">";

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
</div>
</article>
</body>

</html>




