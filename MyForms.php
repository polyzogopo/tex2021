<?php
require_once 'mobile_dt/Mobile_Detect.php';
$detect = new Mobile_Detect;
if (!$detect->isMobile() && !$detect->isTablet())
{ 
$s="select * from forma where id_user=$_SESSION[id_user]";
$q=mysql_query($s);
echo "<h2>My Forms</h2>";
echo "<table>";
while ($r=mysql_fetch_array($q))
{
echo "<tr><td><a href=index.php?pg=showform.php&id=$r[id]>$r[title]</a>
</td>
<td><a href='index.php?pg=report.php&id=$r[id]' class=art-button>Report</a></td>
<td><a href='index.php?pg=delform.php&id=$r[id]' class=art-button>Delete</a></td>

</tr>";


}
echo "</table>";
}
else
{
echo "No support Mobile Devices. Try from a PC.";


}

?>
