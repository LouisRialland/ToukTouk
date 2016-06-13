<section>
<div id="world-map" ></div>
</section>

<script src="<?= URL ?>src/js/libs/jquery-2.2.0.js"></script>
<script>
$(function(){
	
      $('#world-map').vectorMap({map: 'world_mill',
      	backgroundColor : 'blue',
      	regionsSelectable:true,
      	markersSelectable:true,
      	markerStyle: {
      		initial: {
		        fill: '#60B6DE',
		        stroke: '#ebc049',
		        r:15,
     		}
   		},
   		
   		
	});
  });
</script>
<?php
 $data = $pdo->query('SELECT * FROM data ORDER BY country');
  	 $datas = $data->fetchALL();

		foreach ($datas as $_datas):
?>
<script>

$(function(){
      $('#world-map').vectorMap({
      markers : [ {
      	latLng: [43.73, 7.41], name: 'coucou'
      }]
	});
  });
</script>				



<?php
		endforeach 

  ?>