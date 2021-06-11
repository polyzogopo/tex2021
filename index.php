<?php
include ('connect.php');

 


if(!isset($_SESSION['type']))   // an den exei oristei to usertype (diladi prwti fora sti selida)
{

// dinoume arxikes times
	$_SESSION['type']='guest';  // einai xristis guest
	$_SESSION['login']=0;  // den exoume kanei login diladi den exoume syndethei
	
}


$error=0;    // otan einai 0 den exoume kanei lathos (otan stelnoume email kai password apo tin forma login (0 sosta stoixeia , 1 lathos stoixeia)
if (isset($_POST['button1']))    // an exei stoixeia apo tin selida syndesi.php diladi dinei username
// kai password gia na syndethei tote
{
	
	// elegxei an yparxei o xristis stin vasi
	$q="select * from users where email='$_POST[email]' and password='$_POST[password]'";
	$t=mysql_query($q);
	if (mysql_num_rows($t)==1)   // diladi an ton vrike 1 fora giati exoume monadiko email
	{
		
		// an yparxei krataei sto pinaka session ta aparetita stoixeia
		$rec=mysql_fetch_array($t);
		$_SESSION['type']=$rec['type'];
		$_SESSION['login']=1;
		$_SESSION['id_user']=$rec['id'];	
		$_SESSION['email']=$rec['email'];	
		
	}
	else
	{
	$error=1;  // an dosei lathos stoixeia	
	}
	
	
}

include ('up.php');



?>
<br><br><br>

<?php

if (isset($_GET['pg']))  // an exoume valei pg sti selida panw sto url tote ensomatwse tin selida pg
{
include ($_GET['pg']);	
	
}
else   // alliws emfanizetai o xartis kai kalosorisma
{
	
	if ($_SESSION['login']==0)  
	{
		if ($error==0)   // an den eimaste syndemenoi kai den exei ginei lathos
	echo "
	
       Create your Web Form and Take your Results 

	<br><br><br>			
        <p><a href='#' class='art-button'>Read More</a></p> <br>
    
  ";
  else  // an den eimaste syndemenoi alla exei prokipsei lathos
  	echo "
	
        Error Login. Please try again

	<br><br><br>			
        
  ";
	}
	else   // an eimaste syndemenoi
	{
		echo "
	
       You are the user email: $_SESSION[email]. <br><br>You are $_SESSION[type] <br>
       
  ";
		
	}
	
}




?>


		

<br><br><br>

<?php
include ('down.php');


?>