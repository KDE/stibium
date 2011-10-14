<?php
print '<center><img border="0" src="stibium.png" alt="" /></center>';
//require './plugin/src/facebook.php';
//@include("english.php");

$user = $_POST['user'];
$pass = $_POST['pass'];
$service = $_POST['service'];

if ($service == "ubuntuone") {
@include("backend/ubuntuone/login.php");

$myauth= requestAuthentification($user,$pass);
$rootinfo = getRoot($myauth);
if ($rootinfo==!"") {
  echo ('<script type="text/javascript">');
  echo ('top.location.href = "desktop.svg";');
  echo ('</script>');
}
}

if ($service == "dropbox") {
print "Sorry, actually Stibium does not work with Dropbox. But our monkeys are working on it.";
}
if ($service == "owncloud") {
print "Sorry, actually Stibium does not work with ownCloud. But our monkeys are working on it.";
}
if ($service == "googledocs") {
print "Sorry, actually Stibium does not work with Google Docs. But our monkeys are working on it.";
}




?> 
