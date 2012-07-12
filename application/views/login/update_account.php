<div class="span-1">
	<br />
	<br />
	<br />
</div>
           
<div class="span-8"><br />


    <?php echo validation_errors(); ?>
    <h3>Edit Details</h3>
      
    
    <?php 
	foreach ($cust as $customer) {
	?><form action="<?= site_url("auth/edit_account"); ?>" method="post">
		<label for="mediumNiceInput">Email</label>		
         <input type="text" class="medium input-text" id="mediumNiceInput" value="<?= $customer['email'] ?>" name="email" />
		<label for="mediumNiceInput">Name</label>	
         <input type="text" class="medium input-text" id="mediumNiceInput" value="<?= $customer['firstName'] ?>" name="firstName"   /> 
        <input type="submit" class="nice tiny radius blue button" value="Update Info &raquo;"   /> 
	</form> 
	<?php
		 }
	 ?>         
	 
	 
	 
	<h3>Change Password</h3>
	<form action="<?= site_url("auth/update_password"); ?>" class="nice" method="post">
		<label for="mediumNiceInput">New Password</label>
		<input type="password" class="medium input-text" id="mediumNiceInput" name="password" />
		<label for="standardNiceInput">Retype Password</label>
		<input type="password" class="input-text" id="standardNiceInput" name="password2" />
		<input type="submit" class="nice tiny radius blue button" value="Update Password &raquo;"   />
	</form>
     
</div>
<div class="span-15 last"><br />

       <table> 
	   	<tr><td width="300px"><h3>Your Businesses </h3></td><td colspan="2"><a class="nice tiny radius green button" href="<?= site_url("business/add_business") ?>">Add your Business &raquo;</a></td></tr>
           <?php 
			foreach ($biz as $business) {
			?>
       <tr bgcolor="#E8E8E8">
	   		<td width="200px" ><?= $business['name'] ?></td>
			
	   		<td><a class="nice tiny radius blue button" href="<?= site_url("auth/change_password") . "/" . $business['id']; ?>">Edit &raquo;</a></td>
			<td><a class="nice tiny radius red button" href="<?= site_url("auth/change_password") . "/" . $business['id']; ?>">Delete &raquo;</a></td>
		</tr> 
          <?php
			}
			?>
         </table>   
        
                
     </form> 
    
       <table>
	   <tr><td width="300px"><h3>Your Advertisements </h3></td><td colspan="2"><a class="nice tiny radius green button" href="<?= site_url("business/create_ad") ?>">Create an Advertisement &raquo;</a></td></tr>
           <?php 
			foreach ($ads as $advert) {
			?>
       <tr bgcolor="#E8E8E8"><td width="300px" ><?= $advert['title'] ?></td>
	   
	   		<td><a class="nice tiny radius blue button" href="<?= site_url("auth/change_password") . "/" . $advert['id']; ?>">Edit &raquo;</a></td>
			<td><a class="nice tiny radius red button" href="<?= site_url("auth/change_password") . "/" . $advert['id']; ?>">Delete &raquo;</a></td>
	   </tr> 
             <?php
			}
			?>
         </table>   
         
                
     </form> 

</div>
<br /><br /></div>