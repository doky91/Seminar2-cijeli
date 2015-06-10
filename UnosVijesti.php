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
<link rel="stylesheet" href="bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<br/><br/>
<div class="row">
		<div class="span4">
		<?include('meni.php');?>
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

</div>
</div>
</form>

</body>
</html>