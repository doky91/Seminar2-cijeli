<?
include('provjerajezika.php');

/**
 *
 * Više se ne koristi
 * Više se ne koristi
 * Više se ne koristi
 * Više se ne koristi
 * Više se ne koristi
 * Više se ne koristi
 * Više se ne koristi
 */
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="row">
    <div class="span4 offset2">
        <h1><? echo $lang['REG_Y'] ?></h1>
    </div></div>
<article>

    <!-- forma za registraciju korisnika. Ovdje se vrši početna "kontrola" unosa -->
    <div class="span4 offset6">
    <form role="form" action="registracijaKorisnikaUbazu.php" method="POST">
	<div class="form-group">
	<label for="nadimak"><? echo $lang['REG_NAME']?></label>
        <input type="text" name="nadimak" maxlength="50" size="30" required autofocus>
		</div>
		<div class="form-group">
	<label for="lozinka"><? echo $lang['REG_PASSWORD']?></label>
        <input type="password" name="lozinka" maxlength="50" size="30">
		</div>
			<div class="form-group">
	<label for="ime"><? echo $lang['REG_REALNAME']?></label>
        <input type="text" name="ime" maxlength="50" size="30" ></div>
		
			<div class="form-group">
	<label for="grad"><? echo $lang['REG_TOWN']?></label>
        <input type="text" name="grad" maxlength="30" size="30">
		</div>
			<div class="form-group">
	<label for="mail"><? echo $lang['REG_EMAIL']?></label>
        <input type="email" name="mail" maxlength="40" size="30">
		</div>
		
       	<div class="form-group">
	<label for="nadimak"><? echo $lang['REG_PERSONA']?></label> 
		
        <select name="priv_prav">
            <option value="0"><? echo $lang['REG_PERSONAPP']?></option>
            <option value="1"><? echo $lang['REG_PERSONAFI']?></option>
        </select>
         </div>
		 
		 	<div class="form-group">
			<label for="anonimno"> <? echo $lang['REG_ANON']?></label>
        <select name="anonimno">
            <option value="0"><? echo $lang['REG_ANONN']?></option>
            <option value="1"><? echo $lang['REG_ANONY']?></option>
        </select>
        </div>
        <button type="submit"class="btn btn-default"><? echo $lang['REG_Y']?>
		 <button type="button"class="btn btn-default" onclick="Cancel()"><? echo $lang['LOGIN_CNL']?></button>
    </form>
    <script>
        /* skripta koja vraća na početnu stranicu pritiskom na gumb */
        function Cancel(){
            window.location.assign("index.php");
        }
    </script>

    </div>
</article>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>