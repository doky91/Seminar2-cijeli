<?php

session_start();
$tip=$_SESSION['id'];

$korisnik=$_SESSION['username'];
 
 $poruka=$_POST['poruka'];

  $kojatema=$_GET['para'];

include('spajanje.php');


$stmt = mysqli_prepare($konekcija, "INSERT INTO porukeDonacije (idTeme,idVrste,tekst,korisnikIme) VALUES 
	(?, ?,?,?)");

$bind = mysqli_stmt_bind_param($stmt, "ssss",$kojatema, $tip,$poruka,$korisnik);

$exec = mysqli_stmt_execute($stmt) or die('nece');

header("Location:index.php");