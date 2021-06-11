<?php
 
// allazw ta stoixeia enos xristi opou exei id_user afto pou tou esteile to post apo tin forma edit.php
$q="update users set password='$_POST[password]', 
firstname='$_POST[fname]', 
lastname='$_POST[lname]', 
phone='$_POST[phone]', 
type='$_POST[type]'
 where id=$_POST[id_user]";

if (mysql_query($q)) {
	
echo "Your changes saved!";
	
}
else
{
echo "Save Error ! ";	
	
};


?>