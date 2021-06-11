<?php
require_once 'mobile_dt/Mobile_Detect.php';
$detect = new Mobile_Detect;
//if ($detect->isMobile() || $detect->isTablet())
if(1)
{ 
$s="select * from forma where id=$_GET[id]";
$q=mysql_query($s);
$r=mysql_fetch_array($q);
echo "<form action='index.php?pg=insertform.php&id=$_GET[id]' method=post enctype='multipart/form-data'>";
echo "<h2>$r[title]</h2>";
echo "<b>Category: $r[category]</b><br><br>";
echo "$r[description]<hr>";
$s="select * from fields where id_form=$_GET[id]";
$q=mysql_query($s);
while ($r=mysql_fetch_array($q))
{
	switch($r['type'])
	{
	case 1: echo "$r[property1]<br>";
			break;

	case 2: 
			if ($r['property2']==1) $rq=" required ";
			else $rq=" ";
			echo "$r[property1]<br><input type=text $rq name=f$r[id]><br>";
			break;		
	case 21: 
			if ($r['property2']==1) $rq=" required ";
			else $rq=" ";
			echo "$r[property1]<br><input type=email $rq name=f$r[id]><br>";
			break;		
	case 3: 
			if ($r['property4']==1) $rq=" required ";
			else $rq=" ";
			echo "$r[property1]<br><textarea rows=$r[property2] $rq cols=$r[property3] name=f$r[id]></textarea><br>";
			break;	

	case 4: 
			if ($r['property3']==1) $rq=" required ";
			else $rq=" ";
			$res=explode(',',$r['property2']);
			$ops="";
			foreach($res as $vv)
			{
				$ops.="<option>$vv</option>";
			}
			echo "$r[property1]<br><select $rq name=f$r[id]>$ops</select><br>";
			break;	
	case 5: 
	echo "$r[property1]<br><div style='width:100%; height:200px' id=m$r[id]></div>
	<input type=hidden id=ff$r[id] name=f$r[id]>
	
	<br>";
			echo "
			<script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp\"></script>

			<script>
			var map;
			var marker;
			   function init$r[id]() {
			   
			   var pos =new google.maps.LatLng(-34.397, 150.644);
					var mapOptions = {
						zoom: $r[property2],
						 center: pos

						};
				   map = new google.maps.Map(document.getElementById('m$r[id]'),  mapOptions);		
				marker=new google.maps.Marker({
					  map: map,
					  position: pos

					});		
						
				document.getElementById('ff$r[id]').value=pos.lat()+\",\"+pos.lng();		
      
		 if(navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
						var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
						marker.setMap(null);
						marker=new google.maps.Marker({
						  map: map,
						  position: pos
						});
						
						map.setCenter(pos);
						document.getElementById('ff$r[id]').value=pos.lat()+\",\"+pos.lng();					   
					});
				}
				
		  google.maps.event.addListener(map, 'click', function(event) {
					
						var pos = event.latLng;
						marker.setMap(null);
						marker=new google.maps.Marker({
						  map: map,
						  position: pos
						});
						
						map.setCenter(pos);
						document.getElementById('ff$r[id]').value=pos.lat()+\",\"+pos.lng();					   
		 
				});		
		
      }
      google.maps.event.addDomListener(window, 'load', init$r[id]);

			
			</script>";
			
			
			
			break;	

	case 51: 
	echo "$r[property1]<br><div style='width:100%; height:200px' id=m$r[id]></div><button type=button id=btm$r[id] onclick='get$r[id]();'>Measure 1</button>
	<input type=text id=ff$r[id] name=f$r[id]>
	
	<br>";
			echo "
			<script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp\"></script>
<script type=\"text/javascript\" src=\"http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry\"></script>
			<script>
			var map;
			var marker1;
			var marker2;
			var vx,vy;
			var v1x,v1y,v2x,v2y;
			var ri=1;
			   function init$r[id]() {
			   
			   var pos =new google.maps.LatLng(-34.397, 150.644);
					var mapOptions = {
						zoom: $r[property2],
						 center: pos

						};
				   map = new google.maps.Map(document.getElementById('m$r[id]'),  mapOptions);		
				marker1=new google.maps.Marker({
					  map: map,
					  position: pos

					});		
						
				marker2=new google.maps.Marker({
					  map: map,
					  position: pos

					});		
				
				
		  google.maps.event.addListener(map, 'click', function(event) {
					
						var pos = event.latLng;
						if (ri==1){ 
						
							marker1.setMap(null);
							marker2.setMap(null);
							
							ri=2;	
								marker1=new google.maps.Marker({
								map: map,
								position: pos
							});
							vx=pos.lat(); vy=pos.lng();
							v1x=vx/1;
							v1y=vy/1;
							document.getElementById('btm$r[id]').innerHTML='Measure 2';
							map.setCenter(pos);
						  
						  
						
						}
						else {
							marker2=new google.maps.Marker({
								map: map,
								position: pos
							});
							ri=1;
							vx=pos.lat(); vy=pos.lng();
							v2x=vx/1;
							v2y=vy/1;
							document.getElementById('btm$r[id]').innerHTML='Measure 1';
							var p1=new google.maps.LatLng(v1x, v1y);
							var p2=new google.maps.LatLng(v2x, v2y);
				
							d=google.maps.geometry.spherical.computeDistanceBetween(p1, p2);
				
							document.getElementById('ff$r[id]').value='d='+d+' ('+v1x+','+v1y+') ('+v2x+','+v2y+')';
							map.setCenter(pos);
				
							
						}
						map.setCenter(pos);
											   
		 
				});		
		
      }
	  
	  function get$r[id]()
	  {
		navigator.geolocation.getCurrentPosition(function(position) {
		
				var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
					if (ri==1){
						marker1.setMap(null);
						marker2.setMap(null);
						
						ri=2;	
							marker1=new google.maps.Marker({
							map: map,
							position: pos
						});
						vx=pos.lat(); vy=pos.lng();
						v1x=vx/1;
						v1y=vy/1;
						document.getElementById('btm$r[id]').innerHTML='Measure 2';
						map.setCenter(pos);
					}
					else
					{
				
						marker2=new google.maps.Marker({
						map: map,
						position: pos
						});
						ri=1;
						vx=pos.lat(); vy=pos.lng();
						v2x=vx/1;
						v2y=vy/1;
						document.getElementById('btm$r[id]').innerHTML='Measure 1';
						var p1=new google.maps.LatLng(v1x, v1y);
						var p2=new google.maps.LatLng(v2x, v2y);
			
						d=google.maps.geometry.spherical.computeDistanceBetween(p1, p2);
			
						document.getElementById('ff$r[id]').value='d='+d+' ('+v1x+','+v1y+') ('+v2x+','+v2y+')';
						map.setCenter(pos);
						
					}	
				
				
			
				
									   
			});
			  
	  }
	  
	  
      google.maps.event.addDomListener(window, 'load', init$r[id]);

			
			</script>";
			
			
			
			break;	


			
	case 6: 
			if ($r['property2']==1) $rq=" required ";
			else $rq=" ";
			echo "$r[property1]<br><input type=file $rq name=f$r[id] accept='image/*' capture='camera'><br>";
			break;		
	case 7: 
			if ($r['property2']==1) $rq=" required ";
			else $rq=" ";
			echo "$r[property1]<br><input type=file $rq name=f$r[id] accept='audio/*' capture><br>";
			break;		
	case 8: 
			if ($r['property2']==1) $rq=" required ";
			else $rq=" ";
			echo "$r[property1]<br><input type=text $rq name=f$r[id] id=ff$r[id]><button type=button onclick=\"getMeasure1('ff$r[id]');\">Get Measure</button><br>";
			echo "<script>
			var mm='';
			
			if (window.DeviceMotionEvent==undefined) {
					mm='';

			} else {
					window.ondevicemotion = function(event) {
					
						if (event.accelerationIncludingGravity.x!=undefined)
						{
						mm='x='+event.accelerationIncludingGravity.x+' y='+event.accelerationIncludingGravity.y+' z='+event.accelerationIncludingGravity.z;
						}
						else
						{
						mm='';		
						}
					}
			}					
				function getMeasure1(v)
				{
					document.getElementById(v).value=mm;
					return false;
				}
				</script>
			";
			break;		
	

	case 9: 
	echo "$r[property1]<br> <button id='btm$r[id]' type=button onclick='startmeasure$r[id]();'>Get Measures</button><div style='width:100%; height:200px' id=m$r[id]></div>
	Measures: <textarea name=f$r[id] cols=60 rows=5 id=ff$r[id]></textarea>
	
	<br>";
			echo "
			<script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp\"></script>

			<script>
			var map;
			var marker;
			var vx=0;
			   function init$r[id]() {
			   
			   var pos =new google.maps.LatLng(-34.397, 150.644);
					var mapOptions = {
						zoom: $r[property2],
						 center: pos

						};
				   map = new google.maps.Map(document.getElementById('m$r[id]'),  mapOptions);		
				marker=new google.maps.Marker({
					  map: map,
					  position: pos

					});		
						
				document.getElementById('ff$r[id]').value=pos.lat()+\",\"+pos.lng();		
      
		 if(navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
						var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
						marker.setMap(null);
						marker=new google.maps.Marker({
						  map: map,
						  position: pos
						});
						
						map.setCenter(pos);
						document.getElementById('ff$r[id]').value=pos.lat()+\",\"+pos.lng();					   
					});
				}
					
		
      }
	  
	  var tv$r[id];
	  function startmeasure$r[id]()
	  {
	  vx=0;
			init$r[id]();
	    document.getElementById('btm$r[id]').setAttribute( 'onClick', 'javascript: stopmeasure$r[id]();' );
		document.getElementById('btm$r[id]').innerHTML = 'Stop Measure';
		getmeasure$r[id]();
		tv$r[id]=setInterval(function() { getmeasure$r[id](); },$r[property3]);
	    
	  }
	  
	  function stopmeasure$r[id]()
	  {
		clearInterval(tv$r[id]);
		document.getElementById('btm$r[id]').setAttribute( 'onClick', 'javascript: startmeasure$r[id]();');
		document.getElementById('btm$r[id]').innerHTML = 'Get New Measure';
		
	  }
	  
	  function getmeasure$r[id]()
	  {
				//vx+=0.00001;
				navigator.geolocation.getCurrentPosition(function(position) {
						var pos = new google.maps.LatLng(position.coords.latitude+vx, position.coords.longitude);
						
						marker=new google.maps.Marker({
						  map: map,
						  position: pos
						});
						
						map.setCenter(pos);
						document.getElementById('ff$r[id]').value=document.getElementById('ff$r[id]').value+\"\\r\\n\"+pos.lat()+\",\"+pos.lng();					   
					});
	  
	
	  }
      google.maps.event.addDomListener(window, 'load', init$r[id]);

			
			</script>";
			
			
			
			break;	

	case 92: 
			if ($r['property2']==1) $rq=" required ";
			else $rq=" ";
			echo "$r[property1]<br><textarea $rq name=f$r[id] cols=60 rows=5 id=ff$r[id]></textarea><br><button type=button id=btm$r[id] onclick=\"startmeasure$r[id]();\">Get Measure</button><br><br>";
			echo "<script>
			var mm='';
			
			if (window.DeviceMotionEvent==undefined) {
					mm='';

			} else {
					window.ondevicemotion = function(event) {
					
						if (event.accelerationIncludingGravity.x!=undefined)
						{
						mm='x='+event.accelerationIncludingGravity.x+' y='+event.accelerationIncludingGravity.y+' z='+event.accelerationIncludingGravity.z;
						}
						else
						{
						mm='';		
						}
					}
			}		
				var tv$r[id];			
				function startmeasure$r[id]()
				{
					
				
					document.getElementById('btm$r[id]').setAttribute( 'onClick', 'javascript: stopmeasure$r[id]();' );
					document.getElementById('btm$r[id]').innerHTML = 'Stop Measure';
					getmeasure$r[id]();
						tv$r[id]=setInterval(function() { getmeasure$r[id](); },$r[property3]);
	    
				}
				
				function stopmeasure$r[id]()
				{
					clearInterval(tv$r[id]);
					document.getElementById('btm$r[id]').setAttribute( 'onClick', 'javascript: startmeasure$r[id]();');
					document.getElementById('btm$r[id]').innerHTML = 'Get New Measure';
		
				}
				
				
				
				function getmeasure$r[id]()
				{
						document.getElementById('ff$r[id]').value=document.getElementById('ff$r[id]').value+\"\\r\\n\"+mm;					   
				}
				
				
				
				
				
				
				</script>
			";
			break;		
	
	
	case 10: echo "<input type=submit value='Submit'>";
			break;
	}
}
echo "</form>";

}
else
{
	echo "Is not a Mobile or Tablet Device";

}



?>
