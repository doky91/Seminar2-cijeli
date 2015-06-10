<?php

$tip=$_SESSION['id'];

?>



<?
if($tip==1)/*admin*/{
?>
<ul class="nav nav-pills nav-stacked">
<li> <a href ="IspisVijesti.php"><? echo $lang['MENU_ALL'] ?></a></li>
<li> <a href ="UnosVijesti.php"><? echo $lang['MENU_NEWV']?></a></li>
<li> <a href ="AdminBrisanje.php"><? echo $lang['MENU_ADM']?></a></li>
</ul>
<?
}
else if($tip==2)/*ustanova*/{
?>
 
<ul class="nav nav-pills nav-stacked">
<li> <a href ="IspisVijesti.php"><? echo $lang['MENU_ALL'] ?></a></li>
<li> <a href ="UnosTeme.php"><? echo $lang['MENU_NEWA']?></a></li>
<li> <a href ="UnosVijesti.php"><? echo $lang['MENU_NEWV']?></a></li>
</ul>



<?
}
/*potencijalni donator*/
else if($tip==3){
?>
	<ul class="nav nav-pills nav-stacked">
<li> <a href ="IspisVijesti.php"><? echo $lang['MENU_ALL'] ?></a></li>
<li> <a href ="UnosTeme.php"><? echo $lang['MENU_NEWA']?></a></li>
</ul>
<?
}
else{}
?>

