<?php
include ('connect.php');
$fp=fopen("form$_GET[id].csv","w");
$s="select * from forma where id=$_GET[id]";
$q=mysql_query($s);
$r=mysql_fetch_array($q); 

$z = new ZipArchive();
$z->open("form$_GET[id].zip", ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE );
$s="select * from fields where id_form=$_GET[id]";
$q=mysql_query($s);

fprintf($fp,"id");
fprintf($fp,";id_user");

while ($r=mysql_fetch_array($q))
{
 if ($r['type']!=1 && $r['type']!=10) fprintf($fp,";%s",$r['property1']);
 $rv[$r['id']]=$r['type'];
 
}
echo "<br>";

$s="select * from fieldrec where id_form=$_GET[id]";
$q=mysql_query($s);
while ($r=mysql_fetch_array($q))
{
fprintf($fp,"\n");
fprintf($fp,"%s",$r['id']);
fprintf($fp,";%s",$r['id_user']);


	$s1="select * from fieldvalue where id_rec=$r[id]";
	$q1=mysql_query($s1);
	while ($r1=mysql_fetch_array($q1))
	{
fprintf($fp,";%s",preg_replace("/[\\n\\r]+/", " ", $r1['value']));
	 
	  if ($rv[$r1['id_field']]==6 || $rv[$r1['id_field']]==7)
	  {
	  if ($r1['value']!='')
		$z->addFile("upload/$r1[value]",$r1['value']);
	  }
	 
	
	}
	
}
fclose($fp);
$z->close();
	
	echo "<a href='form$_GET[id].csv'>Download CSV File</a><br><br>";
	echo "<a href='form$_GET[id].zip'>Zip with Images and Audio Files</a>";

?>
