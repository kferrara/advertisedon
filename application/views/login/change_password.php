<div class="span-2"> <br />
	<br />
	<br />
</div>
<div class="span-22 last"><br />
	<br />
	<?php echo validation_errors(); ?>
	<h3>Change Password</h3>
	<form action="<?= site_url("auth/update_password"); ?>" class="nice" method="post">
		<label for="mediumNiceInput">New Password</label>
		<input type="password" class="medium input-text" id="mediumNiceInput" name="password" />
		<label for="standardNiceInput">Retype Password</label>
		<input type="password" class="input-text" id="standardNiceInput" name="password2" />
		<input type="submit" class="nice small radius blue button" value="Login &raquo;"   />
	</form>
</div>
<br />
<br />
</div>
