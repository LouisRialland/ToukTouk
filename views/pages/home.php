<section>

<div id='tools'>
  <button class='numberVisitor'>Cercle/Visiteur</button>
</div>

<div id="world-map" >
<div class='container_bar'>
  <div class='bar_info'>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
  <button class='button_return'>Revenir sur la carte</button>
</div>
</section>

<script src="<?= URL ?>src/js/libs/jquery-2.2.0.js"></script>
<script>
$(function(){
	
      $('#world-map').vectorMap({map: 'world_mill',
      	backgroundColor : 'blue',
        regionsSelectable:true,
      	regionsSelectableOne:true,
        zoomAnimate:true,
      	regionStyle: {
              
              selected: {
                fill: 'red'
              }
            },
      	markerStyle: {
      		initial: {
		        fill: '#60B6DE',
		        stroke: '#ebc049',
		        r:15,
     		}
        
        },

         onRegionSelected: function(e,code,isSelected,selectedRegions){
          if(isSelected==true) {
           var mapObj = $('#world-map').vectorMap('get', 'mapObject');
           var data_selected=mapObj.getSelectedRegions();
           $('.bar_info').children().html('');
           mapObj.setFocus({region: data_selected,animate:true});
           $('.bar_info').css('transition','all 0.5s ease-out 0.5s');
           $('.bar_info').css('transform','translateX(0px)');
           $('.button_return').css('transition','all 0.5s ease-out 0.5s');
           $('.button_return').css('transform','translateX(0px)');
           $('.button_return').on('click',function(){
                mapObj.clearSelectedRegions();
                mapObj.reset();
                $('.bar_info').css('transition','all 0.5s ease-out 0.2s');
                $('.bar_info').css('transform','translateX(-400px)');
                $('.button_return').css('transition','all 0.5s ease-out 0.2s');
                $('.button_return').css('transform','translateX(400px)');

            });
        <?php
           header('Content-Type: text/html; charset=ISO-8859-1'); // écrase l'entête utf-8 envoyé par php
            ini_set( 'default_charset', 'ISO-8859-1' );
           $one_data = $pdo->query('SELECT * FROM data ');
           $specify_country = $one_data->fetchALL();
           
           $one_tips = $pdo->query('SELECT * FROM tips');
           $specify_tips = $one_tips->fetchALL();
               
           foreach ($specify_country as $_specify_country):{     
        ?>
          if(data_selected[0]=='<?=$_specify_country->name_rac?>'){
          var number_comment=1;
          $('.bar_info').find( "div" ).eq(0).html('<?=$_specify_country->country?>');
          <?php foreach($specify_tips as $_specify_tips): { ?>
          if('<?=$_specify_country->ID?>'=='<?=$_specify_tips->id_country?>') {
          $('.bar_info').find( "div" ).eq(number_comment).html('<?=$_specify_tips->content?></br><p><?=$_specify_tips->user?></p>');
          number_comment++;
          }
          <?php 
         
          } endforeach ?>
          if(number_comment==1) {
            $('.bar_info').find( "div" ).eq(number_comment).html('Aucun Commentaire n"a été trouvé pour ce pays, soyez le premier !');
          }
          }
         <?php 

           } endforeach 
          ?> 
         }
         
        },
        markers : [
        <?php
           $data = $pdo->query('SELECT * FROM data ORDER BY country');
           $datas = $data->fetchALL();
           
               
           foreach ($datas as $_datas):      
        ?>

        {latLng: [<?=$_datas->position?>], name: '<?=$_datas->country?>, nombre de visite : <?=$_datas->iteration?>', style: {fill: 'black', r:<?= $_datas->iteration*5?>}},
        
          <?php 

           endforeach 
          ?>
        ,

        ],

       
	});
  });
</script>


<script>


</script>


