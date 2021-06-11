<?php
 
$s="select * from forma order by category";
$q=mysql_query($s);
echo "<h2>Forms</h2>";
while ($r=mysql_fetch_array($q))
{
echo "<a href=index.php?pg=showform.php&id=$r[id]>$r[title]</a> - Category:$r[category] <br>";


}


?>
