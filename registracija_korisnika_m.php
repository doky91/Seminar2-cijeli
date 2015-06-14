<?php
session_start();
include('provjerajezika.php');
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registracija</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <!--<script src="js/jqery_registracija_korisnika.js"></script> -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<header>
    <div class="span4">
<h1><? echo $lang['REG_Y'] ?></h1>
    </div>
    <div class="span8" id="logout-jezik">
        <?php echo $lang['MAIN_ISLOGGED'];echo $korisnik;?>
        <button onclick=logoutck() class="btn btn-default"> Odjava </button>
        <div id="languages">
            <a href="registracija_korisnika_m.php?lang=en"> ENGLISH</a>
            <a href="registracija_korisnika_m.php?lang=cro"> HRVATSKI</a>
        </div>
    </div>
</header>
<aside>

</aside>
<article>
    <!-- forma za registraciju korisnika. Ovdje se vrši početna "kontrola" unosa -->
    <!-- potrebno je još placeholdere namjestiti te na hover slova-->
    <div class="span4 offset6">
    <form action="registracijaKorisnikaUbazu.php" method="POST">
        <div id="nadimak_div" class="form-group has-warning has-feedback">
            <label class="control-label" for="nadimak_unos" ><? echo $lang['REG_NAME']?></label>
            <input type="text" id="nadimak_unos" class="form-control" name="nadimak" maxlength="20" size="30" required autofocus  pattern="[0-9A-Za-z]*" placeholder="Nadimak" data-toggle="tooltip" data-placement="bottom" title="Smije sadržavati samo brojeve i slova (Bez hrvatskih znakova) te minimalno 5 znakova." aria-describedby="unos_nadimakStatus">
            <span id="nadimak_span" class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
            <span id="unos_nadimakStatus" class="sr-only">(success)</span>
        </div>

        <div id="lozinka_div" class="form-group has-warning has-feedback">
            <label class="control-label" for="lozinka_unos"><? echo $lang['REG_PASSWORD']?></label>
            <input type="password" id="lozinka_unos" class="form-control" name="lozinka" maxlength="50" size="30" required placeholder="Lozinka" data-toggle="tooltip" data-placement="bottom" title="Mora sadržavati minimalno 5 znakova" aria-describedby="unos_lozinkaStatus">
            <span id="lozinka_span" class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
            <span id="unos_lozinkaStatus" class="sr-only">(success)</span>
        </div>

        <!--
        <div class="form-group">
            <label>Ime:     </label> <input type="text" class="form-control" name="ime" maxlength="50" size="30" required placeholder="Pravo ime">
        </div>
        <div class="form-group">
            <label>Prezime: </label> <input type="text" class="form-control" name="prezime" maxlength="50" size="30" required placeholder="Pravo prezime">
        </div>
        <div class="form-group">
            <label>Adresa:  </label> <input type="text" class="form-control" name="adresa" maxlength="70" size="30" required placeholder="Adresa">
        </div>
        -->
        <div class="form-group has-feedback">
            <label class="control-label" for="unos_grad"><? echo $lang['REG_TOWN']?></label>
            <input type="text" id="unos_grad" class="form-control" name="grad" maxlength="30" size="30" data-toggle="tooltip" data-placement="bottom" title="Ime vašeg grada" required placeholder="Grad">
        </div>

        <!--
        <div class="form-group">
            <label>Telefon: </label> <input type="text" class="form-control" name="telefon"  size="30" pattern="[0-9]*" required placeholder="Kontakt broj">
        </div>
        -->
        <div class="form-group has-feedback">
            <label class="control-label" for="email_unos"><? echo $lang['REG_EMAIL']?></label>
            <div class="input-group">
                <span class="input-group-addon">@</span>
            <input type="email" id="email_unos" class="form-control" name="mail" maxlength="40" size="30" required placeholder="E-mail" aria-describedby="unos_emailStatus">
                </div>
            <span class="form-control-feedback" aria-hidden="true"></span>
            <span id="unos_emailStatus" class="sr-only">(success)</span>
        </div>

          <label><? echo $lang['REG_PERSONA']?></label>
        <select name="priv_prav" class="form-control">
            <option value="0"><? echo $lang['REG_PERSONAPP']?></option>
            <option value="1"><? echo $lang['REG_PERSONAFI']?></option>
        </select>

         <br/>
        <label><? echo $lang['REG_ANON']?></label>
        <select name="anonimno" class="form-control">
            <option value="0"><? echo $lang['REG_ANONN']?></option>
            <option value="1"><? echo $lang['REG_ANONY']?></option>
        </select>
        <br/>
        <button type="submit" id="gumbic" class="btn btn-default" ><? echo $lang['REG_Y']?>
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

<script>
/**jquery skripta */

// nadimak
    $( document ).ready(function() {
        $("#nadimak_unos").keyup(function() {
            var brojac=$("#nadimak_unos").val().length;
            if (brojac > 4) {
                $("#nadimak_div").addClass("has-success").removeClass("has-warning has-error");
                $("#nadimak_span").addClass("glyphicon-ok").removeClass("glyphicon-asterisk glyphicon-remove");
            }
            if(brojac==0){
                $("#nadimak_div").addClass("has-warning").removeClass("has-success has-error");
                $("#nadimak_span").addClass("glyphicon-asterisk").removeClass("glyphicon-ok glyphicon-remove");
            }
            if(brojac<=4 && brojac>0){
                $("#nadimak_div").addClass("has-error").removeClass("has-success has-warning");
                $("#nadimak_span").addClass("glyphicon-remove").removeClass("glyphicon-ok glyphicon-asterisk");
            }
        })
    });
//lozinka
    $( document ).ready(function() {
        $("#lozinka_unos").keyup(function() {
            var brojac_loz=$("#lozinka_unos").val().length;
            if (brojac_loz > 4) {
                $("#lozinka_div").addClass("has-success").removeClass("has-warning has-error");
                $("#lozinka_span").addClass("glyphicon-ok").removeClass("glyphicon-asterisk glyphicon-remove");
            }
            if(brojac_loz==0){
                $("#lozinka_div").addClass("has-warning").removeClass("has-success has-error");
                $("#lozinka_span").addClass("glyphicon-asterisk").removeClass("glyphicon-ok glyphicon-remove");
            }
            if(brojac_loz<=4 && brojac_loz>0){
                $("#lozinka_div").addClass("has-error").removeClass("has-success has-warning");
                $("#lozinka_span").addClass("glyphicon-remove").removeClass("glyphicon-ok glyphicon-asterisk");
            }
        })
    });
//e-mail
    $( document ).ready(function() {
        $("#lozinka_unos").keyup(function() {

        })
    });
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>