<?
include('provjerajezika.php');
?>
<!DOCTYPE html>

<html>
<head> <title><? echo $lang['REG_UST']?></title> 
<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<header>
	<div class="span4 offset2">
		<h1><? echo $lang['REG_Y']?></h1>
	</div>
    <div class="span8" id="logout-jezik">

        <?php echo $lang['MAIN_ISLOGGED'];echo $korisnik;?>
        <button onclick=logoutck() class="btn btn-default"> Odjava </button>
        <div id="languages">
            <a href="RegistracijaUstanove.php?lang=en"> ENGLISH</a>
            <a href="RegistracijaUstanove.php?lang=cro"> HRVATSKI</a>
        </div>
    </div>
</header>
<article>
		<div class="span4 offset6"> 
	<form role="form" method="POST" action="Mail.php">

	<div class="form-group">
		<label><? echo $lang['REG_USTNA']?></label>
		<input type="text" name="ime" class="form-control" required autofocus>
		</div>

		<div class="form-group">
		<label><? echo $lang['REG_USTNK']?></label>
		<input type="text" name="korisnikime" class="form-control" required>
		</div>

<p> <? echo $lang['REG_USTMSG']?></p>

<button type="submit" class="btn btn-default"><?echo $lang['REG_USTRQ']?></button>
<button type="button" class="btn btn-default" onclick="Cancel()"><? echo $lang['LOGIN_CNL']?></button>
</form>
            <script>
                /* skripta koja vraća na početnu stranicu pritiskom na gumb */
                function Cancel(){
                    window.location.assign("index.php");
                }
            </script>
</div>
</article>

</body>
</html>