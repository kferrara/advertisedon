<div class="span-5">
    <div class="imageLeftPadded">
    <h8>Photos</h8>
    <hr />
     
    <a href="#"><h5>Add a Photo</h5></a>
    <br />
    <hr />
    <a href="#"><h5>Add a Photo</h5></a>
    <br />
    <hr />
    <a href="#"><h5>Add a Photo</h5></a>
    <br />
    <hr />      
    </div>
    
    
</div>

<div class="span-12">
<div class="paddedTanBox">

   <div id="content">
    <?php foreach ($biz as $biz_item): ?>
       <h8><?= $biz_item['name'] ?></h8>
   <hr />
  	<p>
    <?php if( !empty($biz_item['logoImage'] )) { ?>    
    	<img src="<?= base_url("assets/uploads/files/" . $biz_item['logoImage'] ) ?>"  align="left" class="img1" />
    <?php } else { ?>
    	<img src="<?= base_url("assets/icons/" . $biz_item['iconCode'] . ".jpg") ?>"  width="64px" height="64px" align="left" class="img1" />
    <?php } ?>   
    
     <?= $biz_item['desc'] ?><br/>
       </p>

	<?php endforeach ?>
    <div class="adverts">
    <h8>Advertisements</h8>
    <hr />
    <?php foreach ($ads as $ads_item): ?>
    <img src="<?= base_url("assets/uploads/files/" . $ads_item['adImage'] ) ?>"  align="left" class="img1" />
    
    <?php if( !empty($biz_item['logoImage'] )) { ?>    
    	<img src="<?= base_url("assets/uploads/files/" . $ads_item['adImage'] ) ?>"  align="left" class="img1" />
    <?php } ?>  
    	   
    
    <h8><a href="<?= site_url("business/id"); ?>/<?= $ads_item['id'] ?>"><?= $ads_item['title'] ?></a></h8> 

    <?= $ads_item['desc'] ?><br />
<br />

	
	<?php endforeach ?>
    </div>

    </div>
    </div>
</div>

<div class="span-7 last">
    <div class="imageLeftPadded">
    <h8>Directions and Info</h8>
    <hr />
         <?php foreach ($biz as $biz_item): ?>
       <?= $biz_item['address'] ?><br/> <?= $biz_item['cityName'] ?>, MA <?= $biz_item['zipcode'] ?><br/>
       <?= preg_replace('/\d{3}/', '$0-', str_replace('.', null, trim($biz_item['phone'])), 2); ?>
       <br />
       <a href="#"><?= $biz_item['website'] ?></a></p>

	<?php endforeach ?>
        <style type="text/css">
      #map_canvas { height: 100% } 
    </style>
    <script type="text/javascript">
	  var geocoder;
	  var map; 
	  
	  function initialize() {
		geocoder = new google.maps.Geocoder();
		codeAddress('<?= $address ?>');
	  }
	  	
	  function codeAddress(address) {
		geocoder.geocode( { 'address': address}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {
			if (status == google.maps.GeocoderStatus.OK) {
					var myOptions = {
					zoom: 12,
					center: results[0].geometry.location,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});
			  }
		   }
		});
	  }

    </script>
  
    <div id="map_canvas" style="width:229px; height:150px"></div>
    
       <h8>Hours</h8>
    <hr />
    <p>9am-5pm <br />
Monday - Friday</p>
    </div>
    
    
</div>


<br /><br />

</div>   
    