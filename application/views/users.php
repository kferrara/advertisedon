<html>
<head>
	<title>Users Management</title>
    <link rel="stylesheet" href="http://advertisedon.com/assets/css/box.css" type="text/css" />
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.6.3.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/datagrid.js"></script>
</head>
<body>
<?php
		$this->Datagrid->hidePkCol(true);
		$this->Datagrid->setHeadings(array('email'=>'E-mail'));
		$this->Datagrid->ignoreFields(array('password'));
		if($error = $this->session->flashdata('form_error')){
			echo "<font color=red>$error</font>";
		}
		echo form_open('test/proc',array('class'=>'dg_form'));
		echo $this->Datagrid->generate();
		echo Datagrid::createButton('delete','Delete');
		echo form_close();
?>

</body>
</html>