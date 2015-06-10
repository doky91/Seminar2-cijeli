<?php
$akcija=$_POST['akcija'];

	echo $akcija;
include('spajanje.php');

if($akcija==="vijest"){
	
$query = "DELETE FROM vijesti WHERE id LIKE ?";

$stmt = $konekcija->prepare($query);
$broj=$_POST['broj'];
$stmt->bind_param('i', $broj);

$stmt->execute(); 
$stmt->close();


}

else if($akcija==="tema"){


$query = "DELETE FROM temeDonacija WHERE id LIKE ?";

$stmt = $konekcija->prepare($query);
$brojic=$_POST['brojic'];
$stmt->bind_param('i', $brojic);

$stmt->execute(); 
$stmt->close();

/*briše sve poruke iz te teme*/
$quer= "DELETE FROM porukeDonacije WHERE idTeme LIKE ?";

$st = $konekcija->prepare($quer);

$st->bind_param('i', $brojic);

$st->execute(); 
$st->close();




}


	else{}

header('Location: AdminBrisanje.php');

?>