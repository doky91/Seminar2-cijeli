<?php

session_start();
$tip=$_SESSION['id'];
echo $tip;
include('provjerajezika.php');

?>


<!DOCTYPE html>
<html>
<head> <title><? echo $lang['ADD_NAM']?></title> 
<link rel="stylesheet" href="bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<br/><br/>
<div class="row">
	<div class="span4">
		<?include('meni.php');?>
		<div class="span4 offset6"> 
		<form role="form" method="POST" action="UnosTemeUBazu.php">

<div class="form-group">
		<label><? echo $lang['ADD_NAME']?> </label>
		<input type="text" name="naslov">	
		</div>




<button type="submit" class="btn btn-default"><? echo $lang['ADD_CREATE']?></button>
</div>
</div>
</form>
</body>
</html>