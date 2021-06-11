<?php

// diagrafo to xristi me id_user afto pou tou esteile i forma delete.php
$q="delete from users where id=$_POST[id_user]";
 
if (mysql_query($q)) {
	
echo "User Deleted !";
	
}
else
{
echo "Delete Error! ";	
	
};


?>