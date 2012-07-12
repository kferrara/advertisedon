
<div class="span-23 last"> <br /><br />
<br />

<img src="http://advertisedon.com/assets/img/advertisedon-banner.jpg" width="1109" height="495" alt="banner" /><br />
<br />
<br />
<br />
<br />
<br />

<!--
<table width="800px">

<tr>
	<?php 
	$i = 0;
	$catTypes = array(
		"1" => "Auto",
		"2" => "Home",
		"3" => "Food",
		"4" => "Realty" );
	foreach ($ad as $ad_item): ?>
    
    <?php $i++; ?>
        <td width="200px" style="vertical-align: top">
        
        <h7><?= $catTypes[$i] ?></h7><div class="adverts">
        <img src="<?= base_url("assets/img/" . $ad_item['adCode'] . ".jpg") ?>"  width="170px"/><br />

            <a href="http://advertisedon.com/index.php/business/childCategory/<?php echo $ad_item['id'] ?>/Weymouth"><?php echo $ad_item['title'] ?></a><br/>
            <?= $ad_item['desc'] ?><br /></div>
        </td>
    <?php endforeach; ?>  
    
</tr>

</table>
-->
</div></div>  
  
  
