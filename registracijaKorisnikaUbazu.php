<!DOCTYPE HTML>
<html lang="hr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/master.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php
session_start();
include('provjerajezika.php');
//inicijalizacija vrijednosti

$greske=0;
$brojac_nadimak=0;

//header('Content-Type: charset=utf-8');
//Prilagodba stringa te provjera dužine
function provjera_stringova($string,$brojac)
{
    if(strlen($string)<=4)
    {
        /**Ukoliko je string manji ili jednak 4 brojac grešaka raste
         * te će zbog toga kasnije biti prekinut unos podataka u bazu. */
        $string=NULL;
        $brojac++;
        return array($string,$brojac);
    }
    else
    {
        $string = filter_var($string, FILTER_SANITIZE_STRING, FILTER_SANITIZE_MAGIC_QUOTES);
        return array($string,$brojac);
    }
}
function provjera_grad($string)
{
    $string = filter_var($string, FILTER_SANITIZE_MAGIC_QUOTES);
    return $string;
}
//Greška pri unosu podataka u bazu, te preusmjeravanje
function preusmjeravanje($greska,$dio1,$dio2)
{
    print $dio1.$greska.$dio2;
    kraj();
}
//preusmjeravanje
function kraj()
{
    header("refresh:5;url=index.php");
}

/** napraviti sve za registraciju i ostalo potrebno (provjere unosa i zapis u bazu podataka
 * te preusmjeravanje nakon 5 sec ma drugu stranicu */

/** preuzimanje post vrijednosti */
$nadimak=$_POST['nadimak'];
$lozinka=$_POST['lozinka'];
//$ime=$_POST['ime'];
//$prezime=$_POST['prezime'];
//$adresa=$_POST['adresa'];
$grad=$_POST['grad'];
//$telefon=$_POST['telefon'];
$mail=$_POST['mail'];
$priv_prav=$_POST['priv_prav'];
$anonimno=$_POST['anonimno'];

$salt="Neka za sada bude ovo";

//Formatiranje vrijednosti post podataka prije upisa u bazu

list($nadimak,$greske)=provjera_stringova($nadimak,$greske);
list($lozinka,$greske)=provjera_stringova($lozinka,$greske);
$lozinka=md5($lozinka);
//$ime=provjera_stringova($ime);
//$prezime=provjera_stringova($prezime);
//$adresa=provjera_stringova($adresa);
$grad=provjera_grad($grad);
$mail=filter_var($mail, FILTER_SANITIZE_EMAIL);
$priv_prav=filter_var($priv_prav, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
$anonimno=filter_var($anonimno, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

//Provjera jesu li vrijednosti u željenom formatu

if(is_string($nadimak) && is_string($grad) && is_bool($priv_prav) && is_bool($anonimno) && $greske===0) {


//Upit prema bazi

    $servername = "localhost";
    $username = "root";
    $password = "123";
    $database = "seminar22";

    try {
        $db = new PDO("mysql:host=$servername; dbname=$database; charset=utf8", $username, $password);
    } catch (PDOException $e) {
        echo "Došlo je do greške! <br/>";
        echo $e->getMessage();
    }
//Ispituje postoji li već taj nadimak u bazi. Ukoliko da, upozorava na to te preusmjerava nazad na registraciju
    $provjera_nadimka="SELECT 'Ime' FROM donatori WHERE Ime='$nadimak'";
    foreach($db->query($provjera_nadimka) as $row){
        $brojac_nadimak++;
    }
    if($brojac_nadimak!=0){
        echo $lang['REGBAZ_NICKTAKEN1'];
        echo $nadimak;
        echo $lang['REGBAZ_NICKTAKEN2'];
        kraj();
    }
    else {
        //Ukoliko je sve u redu, podaci se unose u bazu
        if (
        $db->exec("INSERT INTO donatori(Ime,Lozinka,PrivatnoPravno,Grad,Email,Anonimnost,idUloga) VALUES ('$nadimak','$lozinka','$priv_prav','$grad','$mail','$anonimno',3)")
        ) {
             $db->exec("INSERT INTO svi(ime,lozinka,uloga) VALUES ('$nadimak','$lozinka',3)");
            echo $lang['REGBAZ_REGSU'];
            $db = NULL;
            kraj();
        } else {
            preusmjeravanje($greske,$lang['REGBAZ_REGERROR1'],$lang['REGBAZ_REGERROR2']);
        }
    }
}
else
{
    preusmjeravanje($greske,$lang['REGBAZ_REGERROR1'],$lang['REGBAZ_REGERROR2']);
}
?>

</body>
</html>