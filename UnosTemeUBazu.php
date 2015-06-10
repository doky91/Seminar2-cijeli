<?php

session_start();
$tip=$_SESSION['id'];

$korisnik=$_SESSION['korisnik'];
 
 $naslov=$_POST['naslov'];

include('spajanje.php');

 $sadrzaj=$_POST['sadrzaj'];

if(strcmp($tip,"2")){

$stmt = mysqli_prepare($konekcija, "INSERT INTO temeDonacija (idVrsta, naslov) VALUES (?, ?)");

$bind = mysqli_stmt_bind_param($stmt, "ss", $tip, $naslov);

$exec = mysqli_stmt_execute($stmt);



}




else if(strcmp($tip,"3")){


$stmt = mysqli_prepare($konekcija, "INSERT INTO temeDonacija (idVrsta, naslov) VALUES (?, ?)");

$bind = mysqli_stmt_bind_param($stmt, "ss", $tip, $naslov);

$exec = mysqli_stmt_execute($stmt);


}
else{}

header('Location: index.php');
?>