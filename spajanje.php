 <?php
  $host="localhost";
  $username="root";
  $password="123";
  $nazivbaze="seminar22";


$konekcija = mysqli_connect($host, $username, $password, $nazivbaze) 
      or die('Kaj je krivo?'); 
$konekcija->set_charset('utf8');

?>