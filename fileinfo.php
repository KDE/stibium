<?php

$path = $_GET['path'];
$value = $_COOKIE["stibium"];
$auth = json_decode($value,1);
$service = $auth["service"];

if ($service == "ubuntuone") {
@include("backend/ubuntuone/login.php");
$myoauth = loadAuth();
$mylist = fileInfo($myoauth, $path);
print $mylist;
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
