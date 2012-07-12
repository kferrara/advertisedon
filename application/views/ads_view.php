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
  <p>Welcome !</p>
 </div>
           
            
        </div>
<div class="span-15"><br />
<br />
<br />


<div class="paddedTanBox">
   <h8>All Advertisements</h8>
   <hr />
    <p>
    
    <?php foreach ($ads as $ads_item): ?>
<p>
    <img src="http://advertisedon.com/assets/img/example-logo.jpg" align="left" style="padding:0px 10px 5px 0px;"/><h4><a href="ads/<?php echo $ads_item['id'] ?>"><?php echo $ads_item['title'] ?></a></h4> 
    <strong><?php echo $ads_item['desc'] ?></strong><br />
       <em><?= $ads_item['subDesc'] ?></em> <br />
Expires on <?php echo $ads_item['enteredOn'] ?> </p>

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