<?php
require_once 'mobile_dt/Mobile_Detect.php';
$detect = new Mobile_Detect;
if (!$detect->isMobile() && !$detect->isTablet())
{
 



?>


<table cellspacing=20px>
<tr><td valign=top>
<h2>Form Elements</h2>
<button id=b1 onclick='put(1);' class=art-button style='width:100px;'>Label-Text</button><br>
<button id=b2 onclick='put(2);' class=art-button  style='width:100px;'>TextField</button><br>
<button id=b2 onclick='put(21);' class=art-button  style='width:100px;'>Email</button><br>
<button id=b2 onclick='put(3);' class=art-button  style='width:100px;'>TextArea</button><br>
<button id=b2 onclick='put(4);' class=art-button  style='width:100px;'>Select</button><br>
<button id=b2 onclick='put(5);' class=art-button  style='width:100px;'>Map</button><br>
<button id=b2 onclick='put(51);' class=art-button  style='width:100px;'>Distance</button><br>
<button id=b2 onclick='put(6);' class=art-button  style='width:100px;'>Image</button><br>
<button id=b2 onclick='put(7);' class=art-button  style='width:100px;'>Audio</button><br>
<button id=b2 onclick='put(8);' class=art-button  style='width:100px;'>X-Y-Z Device</button><br>
<button id=b2 onclick='put(9);' class=art-button  style='width:100px;'>Follow Path</button><br>
<button id=b2 onclick='put(92);' class=art-button  style='width:100px;'>All Moves</button><br>
<br><br>
<form action='index.php?pg=form_add.php' method=post>
<input type=hidden id=v1 name='v1' >
<input type=submit name=sb1 value='Save Form' style='width:100px;' class=art-button>



</td>
<td  valign=top>
<h2>Form Properties</h2>
<table><tr><td>Form Name:</td><td> <input type=text required name=formname></td></tr>
<tr><td>Description: </td><td><input type=text required name=frmdescr></td></tr>
<tr><td>Category: </td><td><select name=frmcat><option>Social</option><option>Company</option><option>Science</option><option>Medical</option></select></td></tr>
<tr><td>Pricacy: </td><td><select name=frmfree><option value=0>Free</option><option value=1>User Only</option></select></td></tr>
</table>
<hr>
<div id=fm>



</div>
</form>
</td>





</table>


<script>
var frm=new Array();
var js=new Array();
s="";
d=-1;

function del(idelement)
{

	
			e=" ";

			js[idelement]=" ";
		   frm[idelement]=e;


jsv="";
	s="<h2>My Form</h2><table width=700px>";
	for (i=0;i<frm.length;i++)
	{
	 s+=frm[i];
	 jsv+=js[i];
	}
	s+="</table>";

	
   document.getElementById('fm').innerHTML=s;    
   document.getElementById('v1').value=jsv;


}


function show(el)
{
element="dv"+el;
     
	 if (document.getElementById(element).style.display=="none")
	 {
		document.getElementById(element).style.display="block";
	 }
	 else
	 {
		document.getElementById(element).style.display="none";
	 }


}

function chng(el,idelement)
{

var d=idelement;
  switch(el)
  {
   case 1:
   v=document.getElementById('tlabel'+d).value;
	    e="<tr><td valign=top><span id=lb"+d+">"+v+"</span></td>";
			e+="<td valign=top><button onclick='show("+d+");'>Edit</button><button onclick='del("+d+");'>Delete</button></td>";
			e+="<td valign=top><div id=dv"+d+" style='display:none; border: 1px solid; background:#aaccaa;'>Properties<br>";
			e+="TextLabel: <input type=text value='"+v+"' id=tlabel"+d+" onchange='chng(1, "+d+");'><br>";
			e+="</div></td></tr>";

			
			js[idelement]="{\"type\":\"1\",\"name\":\"lb"+d+"\",\"text\":\""+v+"\"},";
		
           frm[idelement]=e;


	break;
	case 2: 
	  v=document.getElementById('ttxt'+d).value;
	  v2=document.getElementById('treq'+d).checked;
	  if (v2==true) vv2=1;
	  else vv2=0;
			    e="<tr><td valign=top><span id=txt"+d+">"+v+"</span><br><input type=text></td>";
			e+="<td valign=top><button onclick='show("+d+");'>Edit</button><button onclick='del("+d+");'>Delete</button></td>";
			e+="<td valign=top><div id=dv"+d+" style='display:none; border: 1px solid; background:#aaccaa;'>Properties<br>";
			e+="FieldName: <input type=text id=ttxt"+d+" value='"+v+"' onchange='chng(2, "+d+");'><br>";
			if (v2==true) e+="Required: <input type=checkbox checked onchange='chng(2, "+d+");' id=treq"+d+"><br>";
			else e+="Required: <input type=checkbox onchange='chng(2, "+d+");' id=treq"+d+"><br>";
			e+="</div></td></tr>";
		
		    frm[idelement]=e;
		   js[idelement]=("{\"type\":\"2\",\"name\":\"txt"+d+"\",\"fieldname\":\""+v+"\", \"Required\":\""+vv2+"\"},");
		   break;
		   
	case 21: 
	  v=document.getElementById('ttxt'+d).value;
	  v2=document.getElementById('treq'+d).checked;
	  if (v2==true) vv2=1;
	  else vv2=0;
			    e="<tr><td valign=top><span id=txt"+d+">"+v+"</span><br><input type=text></td>";
			e+="<td valign=top><button onclick='show("+d+");'>Edit</button><button onclick='del("+d+");'>Delete</button></td>";
			e+="<td valign=top><div id=dv"+d+" style='display:none; border: 1px solid; background:#aaccaa;'>Properties<br>";
			e+="FieldName: <input type=text id=ttxt"+d+" value='"+v+"' onchange='chng(21, "+d+");'><br>";
			if (v2==true) e+="Required: <input type=checkbox checked onchange='chng(21, "+d+");' id=treq"+d+"><br>";
			else e+="Required: <input type=checkbox onchange='chng(21, "+d+");' id=treq"+d+"><br>";
			e+="</div></td></tr>";
		
		    frm[idelement]=e;
		   js[idelement]=("{\"type\":\"21\",\"name\":\"temail"+d+"\",\"fieldname\":\""+v+"\", \"Required\":\""+vv2+"\"},");
		   break;
		   
	case 3:
	
	  v1=document.getElementById('ttxta_name'+d).value;
	  v2=document.getElementById('ttxta_cols'+d).value;
	  v3=document.getElementById('ttxta_rows'+d).value;
	   v4=document.getElementById('treq'+d).checked;
	   if (v4==true) vv4=1;
	  else vv4=0;
		    e="<tr><td valign=top><span id=txt"+d+">"+v1+"</span><br><textarea cols="+v2+" rows="+v3+"></textarea></td>";
			e+="<td valign=top><button onclick='show("+d+");'>Edit</button><button onclick='del("+d+");'>Delete</button></td>";
			e+="<td valign=top><div id=dv"+d+" style='display:none; border: 1px solid; background:#aaccaa;'>Properties<br>";
			e+="FieldName:<input type=text id=ttxta_name"+d+"  value='"+v1+"' onchange='chng(3, "+d+");'><br>";
			e+="Cols:<input type=text id=ttxta_cols"+d+" value='"+v2+"' onchange='chng(3, "+d+");'><br>";
			e+="Rows:<input type=text id=ttxta_rows"+d+" value='"+v3+"' onchange='chng(3, "+d+");'><br>";
			if (v4==true) e+="Required: <input type=checkbox checked onchange='chng(3, "+d+");' id=treq"+d+"><br>";
			else e+="Required: <input type=checkbox onchange='chng(3, "+d+");' id=treq"+d+"><br>";
			e+="</div></td></tr>";
		
		    frm[idelement]=e;
		   js[idelement]=("{\"type\":\"3\",\"name\":\"txtarea"+d+"\",\"fieldname\":\""+v1+"\",\"rows\":\""+v3+"\",\"cols\":\""+v2+"\", \"Required\":\""+vv4+"\"},");
		
		
		 
		break;
		
		case 4:
		  v=document.getElementById('ttxt'+d).value;
		v2=document.getElementById('treq'+d).checked;
		if (v2==true) vv2=1;
		else vv2=0;
		v3=document.getElementById('toption'+d).value;
		
	  
			    e="<tr><td valign=top><span id=txt"+d+">"+v+"</span><br><select id=sel"+d+">";
				var res = v3.split(",");
				for (i=0;i<res.length;i++)
				{
				e+="<option>"+res[i]+"</option>";
				
				}
				
				e+="</select></td>";
			e+="<td valign=top><button onclick='show("+d+");'>Edit</button><button onclick='del("+d+");'>Delete</button></td>";
			e+="<td valign=top><div id=dv"+d+" style='display:none; border: 1px solid; background:#aaccaa;'>Properties<br>";
			e+="FieldName: <input type=text id=ttxt"+d+" value='"+v+"' onchange='chng(4, "+d+");'><br>";
			e+="Options(use , between them): <input type=text id=toption"+d+" value='"+v3+"' onchange='chng(4, "+d+");'><br>";
			if (v2==true) e+="Required: <input type=checkbox checked onchange='chng(4, "+d+");' id=treq"+d+"><br>";
			else e+="Required: <input type=checkbox onchange='chng(4, "+d+");' id=treq"+d+"><br>";
			
			e+="</div></td></tr>";
		
		    frm[idelement]=e;
		   js[idelement]=("{\"type\":\"4\",\"name\":\"tselect"+d+"\",\"fieldname\":\""+v+"\", \"Required\":\""+vv2+"\", \"Options\":\""+v3+"\"},");
		   break;
		
		case 5: 
	  v=document.getElementById('ttxt'+d).value;
	  v2=document.getElementById('tzoom'+d).value;		
			e="<tr><td valign=top><span id=txt"+d+" '>"+v+"</span><br><div style='width:100%; height:200px;' id=map"+d+">";
			e+="<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d50135.89130282601!2d21.74735306010182!3d38.24486577815511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sel!2sgr!4v1413496109206\" width=\"100%\" height=\"200\" frameborder=\"0\" style=\"border:0\"></iframe>";
			e+="</div></td>";
			
			e+="<td valign=top><button onclick='show("+d+");'>Edit</button><button onclick='del("+d+");'>Delete</button></td>";
			e+="<td valign=top><div id=dv"+d+" style='display:none; border: 1px solid; background:#aaccaa;'>Properties<br>";
			e+="FieldName: <input type=text id=ttxt"+d+" value='"+v+"' onchange='chng(5, "+d+");'><br>";
			e+="Zoom: <input type=text id=tzoom"+d+" value='"+v2+"' onchange='chng(5, "+d+");'><br>";

			e+="</div></td></tr>";
		
		    frm[idelement]=e;
		   js[idelement]=("{\"type\":\"5\",\"name\":\"tmap"+d+"\",\"fieldname\":\""+v+"\", \"Zoom\":\""+v2+"\"},");
		   break;


		case 51: 
	  v=document.getElementById('ttxt'+d).value;
	  v2=document.getElementById('tzoom'+d).value;		
			e="<tr><td valign=top><span id=txt"+d+" '>"+v+"</span><br><div style='width:100%; height:200px;' id=map"+d+">";
			e+="<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d50135.89130282601!2d21.74735306010182!3d38.24486577815511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sel!2sgr!4v1413496109206\" width=\"100%\" height=\"200\" frameborder=\"0\" style=\"border:0\"></iframe>";
			e+="</div></td>";
			
			e+="<td valign=top><button onclick='show("+d+");'>Edit</button><button onclick='del("+d+");'>Delete</button></td>";
			e+="<td valign=top><div id=dv"+d+" style='display:none; border: 1px solid; background:#aaccaa;'>Properties<br>";
			e+="FieldName: <input type=text id=ttxt"+d+" value='"+v+"' onchange='chng(51, "+d+");'><br>";
			e+="Zoom: <input type=text id=tzoom"+d+" value='"+v2+"' onchange='chng(51, "+d+");'><br>";

			e+="</div></td></tr>";
		
		    frm[idelement]=e;
		   js[idelement]=("{\"type\":\"51\",\"name\":\"tdist"+d+"\",\"fieldname\":\""+v+"\", \"Zoom\":\""+v2+"\"},");
		   break;


		   
	case 6: 
	  v=document.getElementById('ttxt'+d).value;
	  v2=document.getElementById('treq'+d).checked;
	  if (v2==true) vv2=1;
	  else vv2=0;
			    e="<tr><td valign=top><span id=txt"+d+">"+v+"</span><br><input type='file' accept='image/*' capture='camera'></td>";
			e+="<td valign=top><button onclick='show("+d+");'>Edit</button><button onclick='del("+d+");'>Delete</button></td>";
			e+="<td valign=top><div id=dv"+d+" style='display:none; border: 1px solid; background:#aaccaa;'>Properties<br>";
			e+="FieldName: <input type=text id=ttxt"+d+" value='"+v+"' onchange='chng(6, "+d+");'><br>";
			if (v2==true) e+="Required: <input type=checkbox checked onchange='chng(6, "+d+");' id=treq"+d+"><br>";
			else e+="Required: <input type=checkbox onchange='chng(6, "+d+");' id=treq"+d+"><br>";
			e+="</div></td></tr>";
		
		    frm[idelement]=e;
		   js[idelement]=("{\"type\":\"6\",\"name\":\"timage"+d+"\",\"fieldname\":\""+v+"\", \"Required\":\""+vv2+"\"},");
		   break;
	case 7: 
	  v=document.getElementById('ttxt'+d).value;
	  v2=document.getElementById('treq'+d).checked;
	  if (v2==true) vv2=1;
	  else vv2=0;
			    e="<tr><td valign=top><span id=txt"+d+">"+v+"</span><br><input type='file' accept='audio/*' capture></td>";
			e+="<td valign=top><button onclick='show("+d+");'>Edit</button><button onclick='del("+d+");'>Delete</button></td>";
			e+="<td valign=top><div id=dv"+d+" style='display:none; border: 1px solid; background:#aaccaa;'>Properties<br>";
			e+="FieldName: <input type=text id=ttxt"+d+" value='"+v+"' onchange='chng(7, "+d+");'><br>";
			if (v2==true) e+="Required: <input type=checkbox checked onchange='chng(7, "+d+");' id=treq"+d+"><br>";
			else e+="Required: <input type=checkbox onchange='chng(7, "+d+");' id=treq"+d+"><br>";
			e+="</div></td></tr>";
		
		    frm[idelement]=e;
		   js[idelement]=("{\"type\":\"7\",\"name\":\"taudio"+d+"\",\"fieldname\":\""+v+"\", \"Required\":\""+vv2+"\"},");
		   break;

	
	case 8: 
	  v=document.getElementById('ttxt'+d).value;
	  v2=document.getElementById('treq'+d).checked;
	  if (v2==true) vv2=1;
	  else vv2=0;
			    e="<tr><td valign=top><span id=txt"+d+">"+v+"</span><br><input type=text><button>Get Measure</button></td>";
			e+="<td valign=top><button onclick='show("+d+");'>Edit</button><button onclick='del("+d+");'>Delete</button></td>";
			e+="<td valign=top><div id=dv"+d+" style='display:none; border: 1px solid; background:#aaccaa;'>Properties<br>";
			e+="FieldName: <input type=text id=ttxt"+d+" value='"+v+"' onchange='chng(8, "+d+");'><br>";
			if (v2==true) e+="Required: <input type=checkbox checked onchange='chng(8, "+d+");' id=treq"+d+"><br>";
			else e+="Required: <input type=checkbox onchange='chng(8, "+d+");' id=treq"+d+"><br>";
			e+="</div></td></tr>";
		
		    frm[idelement]=e;
		   js[idelement]=("{\"type\":\"8\",\"name\":\"txyz"+d+"\",\"fieldname\":\""+v+"\", \"Required\":\""+vv2+"\"},");
		   break;
		   
		   
		case 9:
			  v=document.getElementById('ttxt'+d).value;
			   v2=document.getElementById('tzoom'+d).value;
				v3=document.getElementById('ttmst'+d).value;	
		    e="<tr><td valign=top><span id=txt"+d+">"+v+"</span><button>Get Measures</button><br><div style='width:100%; height:200px;' id=map"+d+">";
			e+="<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d50135.89130282601!2d21.74735306010182!3d38.24486577815511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sel!2sgr!4v1413496109206\" width=\"100%\" height=\"200\" frameborder=\"0\" style=\"border:0\"></iframe>";
			e+="</div></td>";
			e+="<td valign=top><button onclick='show("+d+");'>Edit</button><button onclick='del("+d+");'>Delete</button></td>";
			e+="<td valign=top><div id=dv"+d+" style='display:none; border: 1px solid; background:#aaccaa;'>Properties<br>";
			e+="FieldName: <input type=text id=ttxt"+d+" value='"+v+"' onchange='chng(9, "+d+");'><br>";
			e+="TimeStep Measure(ms): <input type=number value='"+v3+"' onchange='chng(92, "+d+");' id=ttmst"+d+"><br>";			
			e+="Zoom: <input type=text id=tzoom"+d+" value='14' onchange='chng(9, "+d+");'><br>";
			e+="</div></td></tr>";
		
		    frm[idelement]=e;
		     js[idelement]=("{\"type\":\"9\",\"name\":\"tfpath"+d+"\",\"fieldname\":\""+v+"\",\"timestep\":\""+v3+"\",\"Zoom\":\""+v2+"\"},");
		
		
		 
		break;
		case 92:
			  v=document.getElementById('ttxt'+d).value;
			    v2=document.getElementById('treq'+d).checked;
				v3=document.getElementById('ttmst'+d).value;
				
		    e="<tr><td valign=top><span id=txt"+d+">"+v+"</span><br> <textarea cols=30 rows=5></textarea><button>Get Moves</button></td>";
		
			e+="<td valign=top><button onclick='show("+d+");'>Edit</button><button onclick='del("+d+");'>Delete</button></td>";
			e+="<td valign=top><div id=dv"+d+" style='display:none; border: 1px solid; background:#aaccaa;'>Properties<br>";
			e+="FieldName: <input type=text id=ttxt"+d+" value='"+v+"' onchange='chng(92, "+d+");'><br>";
			e+="TimeStep Measure(ms): <input type=number value='"+v3+"' onchange='chng(92, "+d+");' id=ttmst"+d+"><br>";
			e+="Required: <input type=checkbox onchange='chng(92, "+d+");' id=treq"+d+"><br>";	
			e+="</div></td></tr>";
			
		  frm[idelement]=e;
		 
		    js[idelement]=("{\"type\":\"92\",\"name\":\"txyz2"+d+"\",\"fieldname\":\""+v+"\",\"timestep\":\""+v3+"\",\"Required\":\""+v2+"\"},");
	
		
		
		 
		break;
		   
	
   }

    jsv="";
   s="<h2>My Form</h2><table width=700px>";
	for (i=0;i<frm.length;i++)
	{
	 s+=frm[i];
	 jsv+=js[i];
	}
	s+="</table>";
	jsv+="{\"type\":\"10\",\"name\":\"sbm\"}";

	
   document.getElementById('fm').innerHTML=s;    
   document.getElementById('v1').value=jsv;

   document.getElementById("dv"+d).style.display="block";
   
   
}






</script>

<?php
}
else
{
 echo "No support Mobile Devices. Try from a PC.";

}


?>