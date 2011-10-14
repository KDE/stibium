<?php

//$myalphabet = "0abcdefghijklmnopqrstuvwxyz123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZ,;.:-_\|£$%&/()='?<>èéùàòç°#@[]{}~ÈÉÙÀÒ".'"';
//$myalphabet = "0abcdefghijklmnopqrstuvwxyz123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZ,;.:-_\£$%&/()=?<>#@[]{}~èéùàòçÈÉÙÀÒ".'"'."\'";  //not allowed characters: |
$myalphabet = "0abcdefghijklmnopqrstuvwxyz123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZ,;.:-_@";  //just the main character, since we are using this function only for file names
/*$mytext = 'Prova se funziona questo testo: "un\'oca, un asino."';
$mykey = preparekey($mytext, "jhdie93df", $myalphabet);
$test = encrypt($mytext, $mykey, $myalphabet);
$newtest = decrypt($test, $mykey, $myalphabet);
print $mytext."<br>".$test."<br>".$mykey."<br>".$newtest;
*/

function encrypt ($text, $key, $alphabet) {
$h = 0; $i = 0; $m = 0; $k = 0; $n = 0; $u = 0; 
$numtext = 0;
$newtext = "";
while ($k<(strlen($text))) {
for ($h = 0; $h<strlen($alphabet)+1;$h++) if ($key[$k]==$alphabet[$h]) $n=$h;
for ($m = 0; $m<strlen($alphabet)+1;$m++) if ($text[$k]==$alphabet[$m]) $u=$m;
$newtext = $newtext.$alphabet[($u+$n)%strlen($alphabet)];
$numtext++;
$k++;
}
return $newtext;
}

function decrypt ($text, $key, $alphabet) {
$h = 0; $i = 0; $m = 0; $k = 0; $n = 0; $u = 0; 
$numtext = 0;
$newtext = "";
while ($k<(strlen($text))) {
for ($h = 0; $h<strlen($alphabet)+1;$h++) if ($key[$k]==$alphabet[$h]) $n=$h;
for ($m = 0; $m<strlen($alphabet)+1;$m++) if ($text[$k]==$alphabet[$m]) $u=$m;
$newtext = $newtext.$alphabet[(strlen($alphabet)-$n+$u)%(strlen($alphabet))];
$numtext++;
$k++;
}
return $newtext;
}

function preparekey($text, $key, $alphabet) { //this will prepare the key to be use to the text
$k = 0;
$newkey = $key;
$tmpkey = $key;
while (strlen($newkey)<(strlen($text))) {
$newkey = $newkey.str_rot13(strrev($newkey));
$tmpkey = $tmpkey.$key;
$k++;
}
$mykey = encrypt ($newkey, $tmpkey, $alphabet);
return $mykey;
}
/*
function decritta (char *text, char key[], char alphabet[]) {
$h = 0; $i = 0; $m = 0; $k = 0; $n = 0; $u = 0; 
while (*text) {
for (h = 0; h<strlen(alphabet)+1;h++) if (key[k]==alphabet[h]) n=h; 
for (m = 0; m<strlen(alphabet)+1;m++) if (*text==alphabet[m]) u=m; 
*text = alphabet[(strlen(alphabet)-n+u)%(strlen(alphabet))];
text++;
k++;
}
}

function chiave(char *text, int num, char alphabet[]) {
$h = 0; $i = 0; $m = 0; $k = 0; $n = 0; $u = 0; 
while (*text) {
for (h= 0; h<strlen(alphabet)+1;h++) if	(*text==alphabet[h]) n=h;
u = (n*num)%strlen(alphabet);
*text = alphabet[u];
text++;
k++;
}
} */
?>