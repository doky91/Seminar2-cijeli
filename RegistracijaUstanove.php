<?
include('provjerajezika.php');


?>


<!DOCTYPE html>

<html>
<head> <title><? echo $lang['REG_UST']?></title> 
<link rel="stylesheet" href="bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<br/><br/>
<div class="row">
	<div class="span4 offset2">
		<h1><? echo $lang['REG_Y']?></h1>
	</div></div>

<div class="row">
		<div class="span4 offset6"> 
	<form role="form" method="POST" action="Mail.php">

	<div class="form-group">
		<label><? echo $lang['REG_USTNA']?></label>
		<input type="text" name="ime">	
		</div>

		<div class="form-group">
		<label><? echo $lang['REG_USTNK']?></label>
		<input type="text" name="korisnikime">	
		</div>

<p> <? echo $lang['REG_USTMSG']?></p>

<button type="submit" class="btn btn-default"><? $lang['REG_USTRQ']?></button>

</div>
</div>
</form>

</body>
</html>