<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>
</head>
<body>
	<div>
    	
		<a href='<?php echo site_url('admin')?>'>Customers</a> |
		<a href='<?php echo site_url('admin/ads')?>'>Advertisements</a> | 
        <a href='<?php echo site_url('admin/child_categories')?>'>Child Categories</a> |
        <a href='<?php echo site_url('admin/parent_categories')?>'>Parent Categories</a> 
        
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>
