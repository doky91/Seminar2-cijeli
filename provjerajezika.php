<?

if(isSet($_GET['lang']))
{
$lang = $_GET['lang'];
 

$_SESSION['lang'] = $lang;
}

else
{
$lang = $_SESSION['lang'] ;
}
 

 switch ($lang) {
  case 'en':
  $lang_file = 'lang.en.php';
  break;
 
  case 'cro':
  $lang_file = 'lang.cro.php';
  break;
    default:
  $lang_file = 'lang.cro.php';
}
include_once 'languages/'.$lang_file;
?>