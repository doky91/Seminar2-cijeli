<?php
session_start();

$br=$_SESSION['id'];

include('provjerajezika.php');
if($br>=3){

header('Location: greska.php');
exit;
}

?>

<!DOCTYPE html>
<html>
<head> <title><?echo $lang['NEWS_ADD'] ?></title> 
<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="style.css">
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
            <a href="UnosVijesti.php?lang=en"> ENGLISH</a>
            <a href="UnosVijesti.php?lang=cro"> HRVATSKI</a>
        </div>
    </div>
</header>
<aside>
		<div class="span4">
		<?include('meni.php');?>
            </div>
</aside>
<article>
		<div class="span4 offset6"> 
		<form role="form" method="POST" action="UnosVijestiUBazu.php">

<div class="form-group">
		<label> <? echo $lang['NEWS_TITLE'] ?> </label>
		<input type="text" name="naslov">	
		</div>

<div class="form-group">
  		<label for="sadrzaj"><? echo $lang['NEWS_CONTENT'] ?> </label>
  		<textarea class="form-control" rows="6" id="sadrzaj" name="sadrzaj"></textarea>
</div>

<button type="submit" class="btn btn-default"><? echo $lang['NEWS_ADD'] ?> </button>

</form>
</div>
</article>
</body>
</html>