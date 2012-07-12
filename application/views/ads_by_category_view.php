<?php
	$metaTitle="";	
	$metaDesc="";
	$metaKeywords= ""; 
	$h1title="";
	$h2title="";
	$h3title="";
	$keyword2="";
	include 'header.inc.php';	
?>
   
<div class="span-8 last"><br />
<br /><br />

 <div class="imageLeftPadded">
 <h3>Welcome!</h3>
 </div>
           
            
        </div>
<div class="span-15"><br />
<br />
<br />


<div class="paddedTanBox">
   
    <p>
    
    <?php foreach ($ads as $ads_item): ?>

    <h4><?php echo $ads_item['title'] ?></h4>
    <p><?php echo $ads_item['desc'] ?><br />
<a href="ads/<?php echo $ads_item['adsNumber'] ?>">View article</a></p>

	<?php endforeach ?>
    
    
     </p>
<br />

        
  </div>
</div>
        <br /><br />

</div>
       
<?php 
include 'footer.inc.php';
?>