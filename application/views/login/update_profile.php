
           
<div class="span-23 last"><br />
<br />

<div id="login_form">
    <h5><?php echo validation_errors(); ?></h5>
    <h4>Edit Account</h4><br />
    <?php 
    echo form_open('auth/update_account');	
    echo form_fieldset('Account Information');
	echo form_label('Email Address', 'email');
    echo form_input('email', '');
	echo form_label('First Name', 'firstName');
    echo form_input('firstName', '');
	echo form_label('Last Name', 'lastName');
    echo form_input('lastName', '');
	echo form_label('Username', 'username');
    echo form_input('username', '');
    echo form_fieldset_close(); 
        
    echo form_submit('submit', 'Update Account');
    echo form_close();
    ?>

</div>   

</div>
<br /><br /></div>