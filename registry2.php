<?php

 
$q="INSERT INTO users (id, email, password, firstname,lastname, phone, type) 
VALUES (NULL, '$_POST[email]', '$_POST[password]', 
'$_POST[fname]','$_POST[lname]', '$_POST[phone]', 'user')";

if (mysql_query($q)) {
	
echo "Your registration was correct. Please press Login on the above menu.";
	
}
else
{
echo "Your email already exist! ";	
	
};


?>
