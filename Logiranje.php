<?php
session_start();
/*lozinke za sva korisnička imena su 123 */
if(isSet($_GET['lang']))
{
$lang = $_GET['lang'];
 
//$_SESSION['lang'] = $lang;
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
  $lang_file = 'lang.cro.php';
}
include_once 'languages/'.$lang_file;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
<header>
    <div class="span4">
        <h1> <? echo $lang['MAIN_TITLE']?></h1>
    </div>
    <div class="span8" id="logout-jezik">

        <div id="languages">
            <a href="Logiranje.php?lang=en"> ENGLISH</a>
            <a href="Logiranje.php?lang=cro"> HRVATSKI</a>
        </div>
    </div>
</header>
<aside></aside>
<article>
        <form role="form" method="POST" action="login.php">

            <div class="form-group has-feedback">
                <label class="control-label"> <?php echo $lang['LOGIN_NAME']; ?> </label>
                <input type="text" name="nadimak" required autofocus class="form-control">
            </div>

            <div class="form-group has-feedback">
                <label class="control-label"> <?php echo $lang['LOGIN_PASSWORD']; ?></label>
                <input type="password" name="lozinka" required class="form-control">
            </div>

           <button type="submit" class="btn btn-default">
<?php echo $lang['LOGIN_BTTN']; ?></button>
            <button type="button" class="btn btn-default" onclick="Cancel()"><?php echo $lang['LOGIN_CNL']; ?>
    </button>
        </form>
<script>
    /* skripta koja vraća na početnu stranicu pritiskom na gumb */
    function Cancel(){
        window.location.assign("Logiranje.php");
    }
</script>

<p><?php echo $lang['LOGIN_MSG']; ?> </p><a href="OdabirRegistracije.php"><?php echo $lang['LOGIN_MSGHERE'] ?></a>
</article>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>