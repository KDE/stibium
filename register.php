<?php
$emaila = $_GET['emaila'];
//$passa = $_GET['passa'];

// I'm creating the user
if ($emaila!=""){
//if ($emaila!="" && $passa!=""){
//$passa4 = md5($passa);


// fine informazioni sull'utente
//if (file_exists("./".$emaila)){
print "ERROR: The e-mail address <i>'.$emaila.'</i> is already registered.";
//}

}
//print '<form action="register.php">Username: <input type="text" name="usera" /><br /> Password: <input type="password" name="passa" /><br /><br /> <input type="submit" value="Create" /> <input type="reset" value="Cancel" /> </form>' ;
print '<form action="index.php">Em@il address: <input type="text" name="emaila" /><br />  Name: <input type="text" name="rname" /><br />  Locale: <input type="text" name="passa" /><br /><br /> <input type="submit" value="Create" /> <input type="reset" value="Cancel" /> </form>' ;

?> 
