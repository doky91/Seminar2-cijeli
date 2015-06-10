<?
session_start();
include('provjerajezika.php');


?>
<html>
<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css"  type="text/css"/>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<div class="row"> <br><br><br><br>
	<div class="span8 offset6">
<?php echo $lang['ERR_MSG'] ?><a href="index.php"> <?php echo $lang['ERR_HERE'] ?></a>

</div></div>
</html>