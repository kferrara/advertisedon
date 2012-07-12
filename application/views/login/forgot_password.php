<div class="span-2">
	<br />
	<br />
	<br />
</div>
<div class="span-22 last"><br />
	<br />
	<?php echo validation_errors(); ?>
	<h3>Forgot Password</h3>
	<form action="<?= site_url("auth/send_password"); ?>" class="nice" method="post">
		<label for="mediumNiceInput">Email</label>
		<input type="text" class="medium input-text" id="mediumNiceInput" name="email" />
		<input type="submit" class="nice small radius blue button" value="Reset My Password &raquo;"   /><br /><br />
	</form>
</div>
<br />
<br />
</div>

  