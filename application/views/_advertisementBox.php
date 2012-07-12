<div class="quickFlip">
  <div class="redPanel">
    <h4 class="first quickFlipCta">
      <?= substr($ad_item['company'], 0,25) ?>
    </h4>
     <a href="<?= site_url("business/id"); ?>/<?= $ad_item['businessId'] ?>">
     	<img src="<?= base_url("assets/icons/" . $ad_item['adCode'] . ".jpg") ?>"  width="64px" height="64px" align="left" class="img5" />
     </a>
     <span style="display:block;"><strong><?= substr($ad_item['title'], 0,25) ?></strong></span>
     <span style="display:block;"><?= substr($ad_item['desc'], 0,50) ?></span> 
     <span style="display:block;"><a href="#" class="quickFlipCta">More info</a></span>
    
  </div>
  
  <div class="blackPanel">
    <a href="#" class="quickFlipCta">[X]</a><span style="display:block;"><?= substr($ad_item['title'], 0,35) ?></span>
      <span style="display:block;"><?= substr($ad_item['desc'], 0,150) ?></span>
		<span style="display:block;"><a href="<?= site_url("business/id"); ?>/<?= $ad_item['businessId'] ?>">Full Details</a></span>
        
  </div>
</div>  
