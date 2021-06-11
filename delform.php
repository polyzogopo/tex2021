<?php
$s="delete from forma where id=$_GET[id]";
$q=mysql_query($s);
 
$s="delete from fields where id_form=$_GET[id]";

$s="select * from fieldrec where id_form=$_GET[id]";
$q=mysql_query($s);
while ($r=mysql_fetch_array($q))
{

	$s1="delete from fieldvalue where id_rec=$r[id]";
	$q1=mysql_query($s1);

}

$s="delete from fieldrec where id_form=$_GET[id]";
$q=mysql_query($s);

echo "Form Deleted !";

?>
