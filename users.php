<h2>Users</h2>
<table border=1>
<tr><th>id</th><th>email</th><th>Firstname</th><th>Lastname</th><th>Phone</th><th>Type</th></th></th></tr>

<?php 

$q="select * from users order by email";
$tb=mysql_query($q);
while($r=mysql_fetch_array($tb))
{

echo "<tr><td>$r[id]</td><td>$r[email]</td><td>$r[firstname]</td><td>$r[lastname]</td>
<td>$r[phone]</td><td>$r[type]</td>";
echo "<td><a href='index.php?pg=edit.php&id=$r[id]'>Edit</a> <a href='index.php?pg=delete.php&id=$r[id]'>Delete</a></td></tr>";

}



?>



</table>



