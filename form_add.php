<?php

 
$s="insert into forma(title,description,id_user,category,free) 
	values('$_POST[formname]','$_POST[frmdescr]','$_SESSION[id_user]','$_POST[frmcat]','$_POST[frmfree]')";
if (mysql_query($s))
{

$idf=mysql_insert_id();

$json="{ \"arrayel\": [ $_POST[v1] ]}";

$data=json_decode($json);


			foreach ($data->arrayel as $t)
			{
			
				print "Type:$t->type<br>";
				
				switch($t->type)
				{
				case "1":
					$s="insert into fields(id_form,type,fieldname,property1) values($idf,".$t->type.",'".$t->name."','".$t->text."')";
					break;
				case "2":
					$s="insert into fields(id_form,type,fieldname,property1,property2) values($idf,".$t->type.",'".$t->name."','".$t->fieldname."','".$t->Required."')";	
					break;
				case "21":
					$s="insert into fields(id_form,type,fieldname,property1,property2) values($idf,".$t->type.",'".$t->name."','".$t->fieldname."','".$t->Required."')";	
					break;	
				case "3":
					$s="insert into fields(id_form,type,fieldname,property1,property2,property3,property4) 
					values($idf,".$t->type.",'".$t->name."','".$t->fieldname."','".$t->rows."','".$t->cols."','".$t->Required."')";	
					break;
				case "4":
					$s="insert into fields(id_form,type,fieldname,property1,property2,property3) 
					values($idf,".$t->type.",'".$t->name."','".$t->fieldname."','".$t->Options."','".$t->Required."')";	
					break;	
					
				case "5":
					$s="insert into fields(id_form,type,fieldname,property1,property2) 
					values($idf,".$t->type.",'".$t->name."','".$t->fieldname."','".$t->Zoom."')";	
					break;		
				case "51":
					$s="insert into fields(id_form,type,fieldname,property1,property2) 
					values($idf,".$t->type.",'".$t->name."','".$t->fieldname."','".$t->Zoom."')";	
					break;		
				
					
				case "6":
					$s="insert into fields(id_form,type,fieldname,property1,property2) values($idf,".$t->type.",'".$t->name."','".$t->fieldname."','".$t->Required."')";	
					break;
					
				case "7":
					$s="insert into fields(id_form,type,fieldname,property1,property2) values($idf,".$t->type.",'".$t->name."','".$t->fieldname."','".$t->Required."')";	
					break;
				
				case "8":
					$s="insert into fields(id_form,type,fieldname,property1,property2) values($idf,".$t->type.",'".$t->name."','".$t->fieldname."','".$t->Required."')";	
					break;
				case "9":
					$s="insert into fields(id_form,type,fieldname,property1,property2,property3) values($idf,".$t->type.",'".$t->name."','".$t->fieldname."','".$t->Zoom."','".$t->timestep."')";	
					break;
				case "92":
					$s="insert into fields(id_form,type,fieldname,property1,property2,property3) values($idf,".$t->type.",'".$t->name."','".$t->fieldname."','".$t->Required."','".$t->timestep."')";	
					break;	
				case "10":
					$s="insert into fields(id_form,type,fieldname) values($idf,10,'Submit')";	
				
				}
				if (mysql_query($s))
				{
					echo "Field ".$t->name." Inserted!<br>";
			
				}
				else
				{
					echo "Error Insert Field<br>";
				
				}
				
			}

}
else
{
     echo "Error Insert Form";			
}

?>


