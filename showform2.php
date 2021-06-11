<?php
$s="select * from forma where id=$_GET[id]";
$q=mysql_query($s);
$r=mysql_fetch_array($q);


 

echo "<h2>$r[title]</h2>";
echo "<b>Category: $r[category]</b><br><br>";
echo "$r[description]<hr>";
$s="select * from fields where id_form=$_GET[id]";
$q=mysql_query($s);
while ($r=mysql_fetch_array($q))
{
$ss="select * from fieldvalue where id_rec=$_GET[rec] and id_field=$r[id]";
$qq=mysql_query($ss);
$rr=mysql_fetch_array($qq);
	switch($r['type'])
	{
	case 1: echo "$r[property1]<br>";
			break;

	case 2: 
			if ($r['property2']==1) $rq=" required ";
			else $rq=" ";
			echo "$r[property1]<br><input type=text $rq name=f$r[id] value='$rr[value]'><br>";
			break;		
	case 21: 
			if ($r['property2']==1) $rq=" required ";
			else $rq=" ";
			echo "$r[property1]<br><input type=email $rq name=f$r[id] value='$rr[value]'><br>";
			break;		
	case 3: 
			if ($r['property4']==1) $rq=" required ";
			else $rq=" ";
			echo "$r[property1]<br><textarea rows=$r[property2] $rq cols=$r[property3] name=f$r[id]>value='$rr[value]'</textarea><br>";
			break;	

	case 4: 
			if ($r['property3']==1) $rq=" required ";
			else $rq=" ";
			$res=explode(',',$r['property2']);
			$ops="<option>$rr[value]</option>";
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
			   
			   var pos =new google.maps.LatLng($rr[value]);
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
      
		
      }
      google.maps.event.addDomListener(window, 'load', init$r[id]);

			
			</script>";
			
			
			
			break;	

	case 51: 
	$vr=explode(' ',$rr['value']);
	
	
	echo "$r[property1]<br><div style='width:100%; height:200px' id=m$r[id]></div>
	Distance and Points: <input type=text id=ff$r[id] name=f$r[id] value='$rr[value]'>
	
	<br>";
			echo "
			<script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp\"></script>

			<script>
			var map;
			var marker;
			   function init$r[id]() {
			   
			   var pos =new google.maps.LatLng$vr[1];
					var mapOptions = {
						zoom: $r[property2],
						 center: pos

						};
				   map = new google.maps.Map(document.getElementById('m$r[id]'),  mapOptions);		
				marker=new google.maps.Marker({
					  map: map,
					  position: pos

					});		
				

				var pos =new google.maps.LatLng$vr[2];
				marker=new google.maps.Marker({
					  map: map,
					  position: pos

					});		

      }
      google.maps.event.addDomListener(window, 'load', init$r[id]);

			
			</script>";
			
			
			
			break;	

			
	case 6: 
			if ($r['property2']==1) $rq=" required ";
			else $rq=" ";
			echo "$r[property1]<br><img src='upload/$rr[value]' width=300><br>";
			break;		
	case 7: 
			if ($r['property2']==1) $rq=" required ";
			else $rq=" ";
			echo "$r[property1]<br><audio src = 'upload/$rr[value]' controls>
	</audio><br>";
			break;		
	case 8: 
			if ($r['property2']==1) $rq=" required ";
			else $rq=" ";
			echo "$r[property1]<br><input type=text $rq name=f$r[id] value='$rr[value]' id=ff$r[id]><br>";
			break;		
	

	case 9: 
	echo "$r[property1]<br> <div style='width:100%; height:200px' id=m$r[id]></div>
	
	<br>";
			echo "
			<script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp\"></script>

			<script>
			var map;
			var marker;
			var vx=0;
			var pos;
			";
			echo "
			   function init$r[id]() {
			   
				
					var mapOptions = {
						zoom: $r[property2],
						};
					map = new google.maps.Map(document.getElementById('m$r[id]'),  mapOptions);		
					";
						
					$vrr=preg_split('/\n|\r\n?/',$rr['value']);
				
					foreach ($vrr as $vr)
					{
					echo "
						pos =new google.maps.LatLng($vr);
						marker=new google.maps.Marker({
						map: map,
						position: pos

						
					});
					";
					}
					echo "
					map.setCenter(pos);
					
						
		
				}
      google.maps.event.addDomListener(window, 'load', init$r[id]);

			
			</script>";
			
			
			
			break;	

	case 92: 
			if ($r['property2']==1) $rq=" required ";
			else $rq=" ";
			echo "$r[property1]<br><textarea $rq name=f$r[id] cols=60 rows=5 id=ff$r[id]>$rr[value]</textarea><br>";
			break;		
	

	}
}




?>
