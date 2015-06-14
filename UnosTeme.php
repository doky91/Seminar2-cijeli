<?php
session_start();
$tip=$_SESSION['id'];
include('provjerajezika.php');
?>

<!DOCTYPE html>
<html>
<head> <title><? echo $lang['ADD_NAM']?></title> 
<link rel="stylesheet" href="css/bootstrap.css"  type="text/css">
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
            <a href="UnosTeme.php?lang=en"> ENGLISH</a>
            <a href="UnosTeme.php?lang=cro"> HRVATSKI</a>
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
		<form role="form" method="POST" action="UnosTemeUBazu.php">

<div class="form-group">
		<label><? echo $lang['ADD_NAME']?> </label>
		<input type="text" name="naslov" required>
		</div>

<button type="submit" class="btn btn-default"><? echo $lang['ADD_CREATE']?></button>

</form>
</div>
</article>
</body>
</html>