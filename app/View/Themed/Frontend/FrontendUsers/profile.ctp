<!-- Call header info---- -->
<?php echo $this->element('user/header-info'); ?>
<section class="rsp_dashboard py-100" style="background-color: #eee8fb">
	<div class="container">
		<div class="row">
			<!-- call left nav -->
			<?php echo $this->element('user/left-nav'); ?>
			<!-- /.col-md-3 -->
			<div class="col-md-9">
				<div class="rsp_dashboard_content">
					<div class="row">
						<div class="col-md-6">
							<h4>Profile Detail</h4> </br>
						</div>
						<div class="col-md-6">
							<?php echo $this->Html->link('Change Profile', array('controller'=>'FrontendUsers', 'action'=>'editprofile'),array('class'=>'btn btn-success')); ?>
						</div>
					</div>

					<div class="row">
						<div class="rsp_dashboard_profile text-center">
							<div class="rsp_dashboard_image">
								<?php if(isset($userProfile) && !empty($userProfile))
								{
									if($userProfile['profile_image']!=''){
										echo $this->Html->image('frontend_images/user/'.$userProfile['profile_image']);
									}else{
										if($userProfile['gender']=='male'){
											echo $this->Html->image('frontend_images/user/default-male.jpg');
										}else{
											echo $this->Html->image('frontend_images/user/default-female.jpg');
										}
									}
								} ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<h5>First Name:</h5>
							<p><?php echo $userProfile['first_name']; ?></p>
						</div>
						<div class="col-md-6">
							<h5>Last Name:</h5>
							<p><?php echo $userProfile['last_name']; ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<h5>Email Id:</h5>
							<p><?php echo $userProfile['email']; ?></p>
						</div>
						<div class="col-md-6">
							<h5>Alternate Email:</h5>
							<p><?php echo $userProfile['alternate_email1']; ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<h5>Gender:</h5>
							<p><?php echo ucfirst($userProfile['gender']); ?></p>
						</div>
						<div class="col-md-6">
							<h5>Mobile No:</h5>
							<p><?php echo $userProfile['mobile']; ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<h5>Address:</h5>
							<p><?php echo $userProfile['address']; ?></p>
						</div>
						<div class="col-md-6">
							<h5>Profile Created Date:</h5>
							<p><?php echo $userProfile['created']; ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<h5>About Me:</h5>
							<p><?php echo $userProfile['about_self']; ?></p>
						</div>
					</div>
					
				</div>
				
				<!-- /.rsp_dashboard_content -->
			</div>
			<!-- /.col-md-9 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</section>
<!-- /.rsp_dashboard -->
