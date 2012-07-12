<div class="span-2">
	<br />
	<br />
	<br />
</div> 
<div class="span-10"><br /> 
	<br />
	
	<h3>Add your Business</h3>

	<?php echo form_open('business/add_business'); ?>	
	
		<label for="mediumNiceInput">Business Name*</label>
		<input type="text" class="medium input-text" id="mediumNiceInput" name="name" value="<?php echo set_value('name'); ?>" />
		<label for="standardNiceInput">Address*</label>
		<input type="text" class="input-text" id="standardNiceInput" name="address" value="<?php echo set_value('address'); ?>"/>
		<label for="standardNiceInput">Zipcode*</label>
		<input type="text" class="input-text" id="standardNiceInput" name="zip" value="<?php echo set_value('zip'); ?>" />
		<label for="standardNiceInput">Business Phone Number* (555-555-5555)</label>
		<input type="text" class="input-text" id="standardNiceInput" name="phone" value="<?php echo set_value('phone'); ?>" />
		<label for="niceTextarea">Brief Business Description*</label>
		<textarea id="niceTextarea" name="desc" cols="2" value="<?php echo set_value('desc'); ?>" ></textarea>		
		<label for="standardNiceInput">Website</label>
		<input type="text" class="input-text" id="standardNiceInput" name="website" value="<?php echo set_value('website'); ?>" />	
		<p>By clicking 'Add your Business' you agree to the <a href="<?php echo site_url('terms-conditions');?>">Terms and Conditions</a></p>
		<input type="submit" class="nice tiny radius green button" value="Add your Business"   />
		
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
