<nav class="art-nav">
    <div class="art-nav-inner">
    <ul class="art-hmenu">
	
 	
	
<?php

  
  if (isset($_GET['pg'])) // an yparxei pg sto url
 {
	 if ($_GET['pg']=='logout.php')  
	 { 
$_SESSION['type']='guest';
	 
	 }
 }
 
 
 
 if ($_SESSION['type']=='guest')  // an o xristi einai guest emfanizei to parakatw menu
 { 
 echo "  
      <li> <a href='index.php'>Home</a> </li>
	  <li> <a href='index.php?pg=login.php'>Login</a> </li>
	  <li> <a href='index.php?pg=freeforms.php'>FreeForms</a> </li>
  ";
 }
 
 
 

 
 

  if ($_SESSION['type']=='admin')  
 { 
 echo "  
       <li> <a href='index.php'>Home</a> </li>
       <li> <a href='index.php?pg=users.php' >Users</a> </li>
	   <li> <a href='index.php?pg=Forms1.php'>Forms</a> </li>
	   <li> <a href='index.php?pg=edit.php&id=$_SESSION[id_user]'>Profile</a> </li>
       <li> <a href='index.php?pg=logout.php'>Logout</a> </li>
";
 
 
 
 }
 
 
   if ($_SESSION['type']=='writer')  // an o xristi einai aplos xristi emfanizei to parakatw menu
 { 
 echo "        
	   <li> <a href='index.php'>Home</a> </li>
       <li> <a href='index.php?pg=Forms2.php'>Create Forms</a> </li>
	   <li> <a href='index.php?pg=MyForms.php'>My Forms</a> </li>
	   <li> <a href='index.php?pg=Forms1.php'>Forms</a> </li>
	   <li> <a href='index.php?pg=edit.php&id=$_SESSION[id_user]'>Profile</a> </li>
       <li> <a href='index.php?pg=logout.php'>Logout</a> </li>
	   
	   ";
 
 
 
 }
 
 
    if ($_SESSION['type']=='user')  // an o xristi einai aplos xristi emfanizei to parakatw menu
 { 
 echo "        
	   <li> <a href='index.php'>Home</a> </li>
       <li> <a href='index.php?pg=Forms1.php'>Forms</a> </li>
	   <li> <a href='index.php?pg=edit.php&id=$_SESSION[id_user]'>Profile</a> </li>
       <li> <a href='index.php?pg=logout.php'>Logout</a> </li>
	   
	   ";
 
 
 
 }
 ?>


</ul> 
        </div>
    </nav> 