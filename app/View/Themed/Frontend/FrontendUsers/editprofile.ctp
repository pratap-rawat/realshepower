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
							<h4>Change Profile Detail</h4></br>
						</div>
					</div>
					<?php echo $this->Form->create(false, array('enctype'=>'multipart/form-data','url'=>array('controller' => 'FrontendUsers', 'action' => 'editprofile'))); ?>
					<div class="row">
						<div class="col-md-6 form-group">
							<label for="first_name">First Name <span class="danger">*</span></label>
							<?php echo $this->Form->input('first_name', array('label'=>false,'class'=>'form-control','required'=>'true','placeholder'=>'Enter first name','value'=>$userProfile['first_name'])) ?>
						</div>
						<div class="col-md-6 form-group">
							<label for="last_name">First Name </label>
							<?php echo $this->Form->input('last_name', array('label'=>false,'class'=>'form-control','placeholder'=>'Enter last name', 'value'=>$userProfile['last_name'])) ?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 form-group">
						<label for="email">Alternate Email Id </label>
							<?php echo $this->Form->input('alternate_email1', array('label'=>false,'type'=>'email','class'=>'form-control', 'value'=>$userProfile['alternate_email1'])) ?>
						</div>
						<div class="col-md-6 form-group">
							<label for="phone">Mobile No. <span class="danger">*</span></label>
							<?php echo $this->Form->input('mobile', array('label'=>false,'type'=>'number','class'=>'form-control','required'=>'true','placeholder'=>'Enter your mobile no.', 'value'=>$userProfile['mobile'])) ?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 form-group">
						<label for="email">Profile Image </label>
							<?php echo $this->Form->input('profile_image', array('label'=>false,'type'=>'file','class'=>'form-control')) ?>
						</div>
						<div class="col-md-6 form-group">
							<label for="phone">Address</label>
							<?php echo $this->Form->input('address', array('label'=>false,'type'=>'text','class'=>'form-control','placeholder'=>'Enter address.', 'value'=>$userProfile['address'])) ?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 form-group">
						<label for="email">About Me</label>
							<?php echo $this->Form->input('about_self', array('label'=>false,'type'=>'textarea','class'=>'form-control','value'=>$userProfile['about_self'])) ?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<?php echo $this->Html->link('Cancel',array('controller'=>'FrontendUsers','action'=>'profile'),array('class'=>'btn btn-danger')) ?>
							<button type="submit" class="btn btn-default">Submit</button>
						</div>
					</div>
					<?php echo $this->Form->end(); ?>
					
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
