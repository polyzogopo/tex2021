<?php
 
$f=0;
$s="select * from forma where id=$_GET[id]";
$q=mysql_query($s);
$r=mysql_fetch_array($q);
if (!isset($_SESSION['id_user'])) 
		$vuser=0;
		else 
		$vuser=$_SESSION['id_user'];
		
$s="insert into fieldrec(id_user,id_form) value($vuser,$_GET[id])";
if (!mysql_query($s)) $f=1;
$idrec=mysql_insert_id();



$s="select * from fields where id_form=$_GET[id]";
$q=mysql_query($s);
while ($r=mysql_fetch_array($q))
{
	switch($r['type'])
	{
	

	case 2:
	
			$s="insert into fieldvalue(id_field,id_rec,value) value($r[id],$idrec,'".$_POST["f".$r['id']]."')";
			if (!mysql_query($s)) $f=1;
			break;

	case 3: 
			$s="insert into fieldvalue(id_field,id_rec,value) value($r[id],$idrec,'".$_POST["f".$r['id']]."')";
			if (!mysql_query($s)) $f=1;
			break;	
	
	case 21: 
			$s="insert into fieldvalue(id_field,id_rec,value) value($r[id],$idrec,'".$_POST["f".$r['id']]."')";
			if (!mysql_query($s)) $f=1;
			break;	

	
	case 4: 
			$s="insert into fieldvalue(id_field,id_rec,value) value($r[id],$idrec,'".$_POST["f".$r['id']]."')";
			if (!mysql_query($s)) $f=1;
			break;	
		
	case 5: 
			$s="insert into fieldvalue(id_field,id_rec,value) value($r[id],$idrec,'".$_POST["f".$r['id']]."')";
			if (!mysql_query($s)) $f=1;
			break;	
	case 51: 
			$s="insert into fieldvalue(id_field,id_rec,value) value($r[id],$idrec,'".$_POST["f".$r['id']]."')";
			if (!mysql_query($s)) $f=1;
			break;	

	case 6: 
			$fn="";
			if ($_FILES["f".$r['id']]['name']!="")
				$fn=$idrec.$r['id'].$_FILES["f".$r['id']]['name'];
			$s="insert into fieldvalue(id_field,id_rec,value) value($r[id],$idrec,'".$fn."')";
			if (!mysql_query($s)) $f=1;
			else
			{
				if ($_FILES["f".$r['id']]['name']!="")
				{
					move_uploaded_file($_FILES["f".$r['id']]["tmp_name"], "upload/".$fn);
				
				}
			}
			break;	
	case 7: 
			$fn="";
			if ($_FILES["f".$r['id']]['name']!="")
				$fn=$idrec.$r['id'].$_FILES["f".$r['id']]['name'];
			$s="insert into fieldvalue(id_field,id_rec,value) value($r[id],$idrec,'".$fn."')";
			if (!mysql_query($s)) $f=1;
			else
			{
				if ($_FILES["f".$r['id']]['name']!="")
				{
					move_uploaded_file($_FILES["f".$r['id']]["tmp_name"], "upload/".$fn);
				
				}
			}
			break;	
	case 8:
	
			$s="insert into fieldvalue(id_field,id_rec,value) value($r[id],$idrec,'".$_POST["f".$r['id']]."')";
			if (!mysql_query($s)) $f=1;
			break;
	case 9:
	
			$s="insert into fieldvalue(id_field,id_rec,value) value($r[id],$idrec,'".$_POST["f".$r['id']]."')";
			if (!mysql_query($s)) $f=1;
			break;
	case 92:
	
			$s="insert into fieldvalue(id_field,id_rec,value) value($r[id],$idrec,'".$_POST["f".$r['id']]."')";
			if (!mysql_query($s)) $f=1;
			break;
	}
}


if ($f==0) echo "Data inserted !<br>";
else echo "Error Inserted Data";



?>
