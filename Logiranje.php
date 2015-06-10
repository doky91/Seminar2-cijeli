<?php

/*lozinke za sva korisnička imena su 123 */
session_start();
if($_SESSION['username']!==null){
header('Location: index.php');

}else{}
include('provjerajezika.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>



<br/>
<br/>
<div>


    <div class="span8 offset6">
        <div id="languages">
<a href="Logiranje.php?lang=en"> ENGLISH</a>
<a href="Logiranje.php?lang=cro"> HRVATSKI</a>
</div>
  <br>
        <form role="form" method="POST" action="login.php">

            <div class="form-group">
                <label> <?php echo $lang['LOGIN_NAME']; ?> </label>
                <input type="text" name="nadimak">
            </div>

            <div class="form-group">
                <label> <?php echo $lang['LOGIN_PASSWORD']; ?></label>
                <input type="password" name="lozinka">
            </div>




           <button type="submit" class="btn btn-default">
<?php echo $lang['LOGIN_BTTN']; ?></button>
            <button type="submit" class="btn btn-default" onclick="Cancel()"><?php echo $lang['LOGIN_CNL']; ?>
    </button>
    </div>
</div>
</form>
<script>
    /* skripta koja vraća na početnu stranicu pritiskom na gumb */
    function Cancel(){
        window.location.assign("Login.html");
    }
</script>

<p><?php echo $lang['LOGIN_MSG']; ?> </p><a href="OdabirRegistracije.php"><?php echo $lang['LOGIN_MSGHERE'] ?></a>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>