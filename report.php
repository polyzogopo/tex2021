<?php
$s="select * from forma where id=$_GET[id]";
$q=mysql_query($s);
$r=mysql_fetch_array($q);

 

echo "<h2>Report of Form : $r[title]</h2>";
echo "<a href='csv.php?id=$_GET[id]' target=_blank>Get data as CSV list and Images and Audio files as Zip </a><br><br>";
echo "<b>Category: $r[category]</b><br><br>";
echo "$r[description]<hr>";
echo "<table border=1>";

$s="select * from fields where id_form=$_GET[id]";
$q=mysql_query($s);
echo "<tr>";
echo "<th>id</th>";
echo "<th>id_user</th>";
while ($r=mysql_fetch_array($q))
{
 if ($r['type']!=1 && $r['type']!=10) echo "<th>$r[property1]</th>";
}
echo "</tr>";

$s="select * from fieldrec where id_form=$_GET[id]";
$q=mysql_query($s);
while ($r=mysql_fetch_array($q))
{
	echo "<tr>";
	echo "<td><a href='index.php?pg=showform2.php&id=$_GET[id]&rec=$r[id]'>$r[id]</a></td>";
	echo "<td>$r[id_user]</td>";
	$s1="select * from fieldvalue where id_rec=$r[id]";
	$q1=mysql_query($s1);
	while ($r1=mysql_fetch_array($q1))
	{
	 
	  echo "<td>$r1[value]</td>";
	 
	
	}

	echo "</tr>";

}

echo "</table>";

?>
