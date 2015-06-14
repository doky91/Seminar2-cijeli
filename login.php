<?php

session_start();
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "123");
define('DB_TABLE', "seminar22");

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);

if ($conn->connect_error) {
    trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}
$nadimak=$_POST['nadimak'];
$lozin=$_POST['lozinka'];
$lozinka=md5($lozin);


$query = "SELECT ime,lozinka,uloga FROM svi WHERE ime LIKE ?";

$stmt = $conn->prepare($query);

if ($stmt) {

    $stmt->bind_param("s", $nadimak);
    $stmt->execute();
    $stmt->bind_result($user, $pass,$uloga);

	if (!$stmt->execute()){echo "No no,nešto je krivo!";}
    while ($stmt->fetch()) {
     
   if(strcmp($lozinka,$pass)==0){

   session_start();

   $_SESSION['username']=$nadimak;
   $_SESSION['id']=$uloga;

header('Location: index.php');
}


    }


    $stmt->close();


} else {



    
}


$conn->close();



?>





