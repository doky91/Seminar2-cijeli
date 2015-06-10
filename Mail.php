<?php
/*ovo ne radi,ali je kod ostavljen da se vidi ideja koju smo planirali realiziati:
dakle smišljeno je da kada se ustanova želi registrirati da joj se na službeni mail(koji se nalazi
	otprije u našoj bazi pošalje random lozinka i ta ista lozinka spremi u bazu u tablicu svi)*/

$ime=$_POST['ime'];
$korisnikime=$_POST['korisnikime'];

include('spajanje.php');


$query="SELECT * FROM  ppopisdomova WHERE naziv=$ime";
$result=mysqli_query($konekcija,$query) or die('upit ne radi');

$row = mysqli_fetch_array($result));
$adresa=$row['email'];


require("PHPMailer-master/class.phpmailer.php"); 
ini_set("SMTP","ssl://smtp.gmail.com"); 
ini_set("smtp_port","465"); 
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com"; 
$mail->SMTPSecure = "ssl";
$mail->Username = "donacijehrvatska123@gmail.com"; 
$mail->Password = "donacijeseminar"; 
$mail->Port = "465";
$mail->IsSMTP();  // 
$rec1=$adresa; //
$mail->AddAddress($rec1);

 $rendomstring=substr(md5(rand()), 0, 7);

$mail->Subject  = "Vaša lozinka";
$mail->Body     = "Hvala na registraciji,vaša lozinka je".+$rendomstring;
$mail->WordWrap = 200;
if(!$mail->Send()) {


echo 'Message was not sent!.';
echo 'Mailer error: ' . $mail->ErrorInfo;
} else {


$query="INSERT into svi (ime,lozinka,idVrste) VALUES $korisnikime,md5($rendomstring),2";
$result=mysqli_query($konekcija,$query) or die('upit ne radi');


echo  //Fill in the document.location thing
'<script type="text/javascript">
                        if(confirm("Your mail has been sent"))
                        document.location = "/";
        </script>';
}
?>