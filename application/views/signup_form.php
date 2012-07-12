<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>Sign Up!</title>
	<link rel="stylesheet" href="http://advertisedon.com/css/style.css" type="text/css" media="screen" />
	
</head>
<body>

   <div id="login_form">
   <h3><?php echo validation_errors(); ?></h3>
	<h1>Create an Account</h1>
    <h4>Direct Savings to you!</h4>
    <?php 
	echo form_open('signup');
	echo form_submit('submit', 'Login');
	echo anchor('login/signup', 'Create an Account');
	echo form_close();
	?>

	</div>   
   
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>	

	<script type="text/javascript" charset="utf-8">
		$('input').click(function(){
			$(this).select();	
		});
	</script>

</body>
</html>