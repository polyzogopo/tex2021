<?php

$q="select * from users where id=$_GET[id]";
 
$tb=mysql_query($q);
$r=mysql_fetch_array($tb);

echo "
<br><br>
<form action='index.php?pg=edit2.php' method=post name=frm2>
<table width=300>
<tr><td>email*:</td><td><input type=email required readonly name=email value='$r[email]'></td></tr>
<tr><td>Password*:</td><td><input type=password required name=password value='$r[password]'></td></tr>
<tr><td>Firstname:</td><td><input type=text required name=fname value='$r[firstname]'></td></tr>
<tr><td>Lastname:</td><td><input type=text required name=lname value='$r[lastname]'></td></tr>
<tr><td>Τηλέφωνο:</td><td><input type=text  name=phone value='$r[phone]'></td></tr>";


if ($_SESSION['type']=='admin')
{
	echo "
	<tr><td>Type:</td><td><select name=type value=$r[type]>";
	  echo "
	  <option>$r[type]</option>
	  <option>user</option>
	<option>writer</option>
	   <option>admin</option>";
	echo "</select></td></tr>";
}
else
{
echo "<input type=hidden name=type value=$r[type]>";

}

echo "
<input type=hidden  name=id_user value='$r[id]'>

<tr><td></td><td><input type=submit value='Save' class='art-button' name=button3></td><td></td></tr>

</table>
<br><br>
<i> * Required Fields </i>

</form>";
?>