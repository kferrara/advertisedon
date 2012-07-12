<?php 
$config = array(
	 'auth/signup_completion' => array(
					array(
							'field' => 'firstName',
							'label' => 'Name',
							'rules' => 'required|alpha'
						 ),
					array(
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'required|valid_email'
						 ),						 
					array(
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'required'
						 )
					),
	 'business/add_business' => array(						 
					array(
							'field' => 'name',
							'label' => 'Business Name',
							'rules' => 'required'
						 ),						 
					array(
							'field' => 'address',
							'label' => 'Business Address',
							'rules' => 'required'
						 ),						 
					array(
							'field' => 'zip',
							'label' => 'Business Zipcode',
							'rules' => 'required|exact_length[5]|integer'
						 ),						 
					array(
							'field' => 'phone',
							'label' => 'Phone Number',
							'rules' => 'required|alpha_dash|min_length[10]|max_length[12]'
						 ),						 
					array(
							'field' => 'desc',
							'label' => 'Business Description',
							'rules' => 'requireSd'
						 ),						 
					array(
							'field' => 'website',
							'label' => 'Website',
							'rules' => ''
						 )
					),	
					
	 'business/create_ad' => array(						 
					array(
							'field' => 'title',
							'label' => 'Advertisement Title',
							'rules' => 'required'
						 ),		
					array(
							'field' => 'desc',
							'label' => 'Advertisement Description',
							'rules' => 'required'
						 ),
					array(
							'field' => 'parentCategoryId',
							'label' => 'Ad Category',
							'rules' => 'required|integer'
						 ),			 
					array(
							'field' => 'expiresOn',
							'label' => 'Expiration Date',
							'rules' => 'required'
						 )
					),						
	 'auth/update_password' => array(						 
					array(
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'required'
						 ),						 
					array(
							'field' => 'password2',
							'label' => 'Password2',
							'rules' => 'required'
						 )
					),					
	 'auth/edit_account' => array(						 
					array(
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'trim|required|valid_email'
						 ),		
					array(
							'field' => 'firstName',
							'label' => 'Name',
							'rules' => 'required'
						 )
					)                         
	);
?>