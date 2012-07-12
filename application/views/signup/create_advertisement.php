<div class="span-2">
	<br />
	<br />
	<br />
</div> 
<div class="span-10"><br /> 
	<br /> 
	<h3>Create an Advertisement</h3>

	<?php echo form_open('business/create_ad'); ?>	
	
		<!-- Title -->
		<label for="mediumNiceInput">Advertisement Title*</label>
		<input name="title" type="text" class="medium input-text" id="mediumNiceInput"  value="<?php echo set_value('title'); ?>" />
		
		<!-- Description -->
		<label for="niceTextarea">Advertisement Description*</label>
		<textarea name="desc" id="niceTextarea"  cols="2" ><?php echo set_value('desc'); ?></textarea>	
		
		<!-- Parent Category -->
		<label for="standardNiceInput">Type of Ad:*</label>
		<?php 
			$options = array('' => 'Select One');
			foreach($categories->result() as $parentCategoryId) {
				$options[$parentCategoryId->id] = $parentCategoryId->name;
			}
			echo form_dropdown('parentCategoryId', $options, set_value('parentCategoryId'));
		?>
		
		<!-- Expiration Date -->
		<script>
		$(function() {
			$( "#datepicker" ).datepicker();
		});
		</script>
		<label for="standardNiceInput">Expires On:*</label>
		<input name="expiresOn" id="datepicker" type="text">
		
		<!-- Submit -->
		<p>By clicking 'Create an Advertisement' you agree to the <a href="<?php echo site_url('terms-conditions');?>">Terms and Conditions</a></p>
		<input type="submit" class="nice tiny radius green button" value="Create an Advertisement"   />
		
	</form>
</div>
<div class="span-8 last"><br />
<br />
<br /> <br />
<br />

<?php echo validation_errors(); ?> 
</div>
<br />
<br />
</div>
