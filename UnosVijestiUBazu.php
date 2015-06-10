<?
session_start();
$naslov=$_POST['naslov'];
$sadrzaj=$_POST['sadrzaj'];
echo $naslov;
echo $sadrzaj;

include('spajanje.php');

$stmt = mysqli_prepare($konekcija, "INSERT INTO vijesti (naslov, sadrzaj) VALUES (?, ?)");

$bind = mysqli_stmt_bind_param($stmt, "ss", $naslov, $sadrzaj);

$exec = mysqli_stmt_execute($stmt);


header('Location: IspisVijesti.php');
















?>