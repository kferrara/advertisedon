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
		<a href='<?php echo site_url('login/home')?>'>Home</a> |
        <a href='<?php echo site_url('admin/customers_management')?>'>Customers</a> |
        <a href='<?php echo site_url('admin/child_category_management')?>'>Child Category</a> |
        <a href='<?php echo site_url('admin/parent_category_management')?>'>Parent Category</a> |
		<a href='<?php echo site_url('admin/business_management')?>'>Business</a> |
        <a href='<?php echo site_url('admin/advertisements')?>'>Advertisements</a> |
        <a href='<?php echo site_url('admin/zipc')?>'>Zipcode</a> |
        <a href='<?php echo site_url('admin/city')?>'>City</a> |
        <a href='<?php echo site_url('admin/business_categoryChild')?>'>Business To Category Group</a> 
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>
