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
				<?php echo $this->Session->flash(); ?>
					<h4>Change Your Password...</h4>
					<?php echo $this->Form->create('FrontendUsers', array('enctype'=>'multipart/form-data','url'=>array('controller' => 'FrontendUsers', 'action' => 'changePassword'))); ?>
                        <div class="row">
                            <div class="col-md-12 form-group">
                            <label for="email">New Password <span class="danger">*</span> </label>
                                <?php echo $this->Form->input('password', array('label' => false,'type'=>'password', 'class' => 'form-control','required'=>true)) ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                            <label for="email">Confirm Password <span class="danger">*</span> </label>
                                <?php echo $this->Form->input('confirm_password', array('label' => false,'type'=>'password', 'class' => 'form-control','required'=>true)) ?>
                            </div>
                        </div>

                        <div class="rsp_publish d-flex justify-content-end">
							<input type="submit" class="action-btn" value="Save">
						</div>
                        
						<!-- /.rsp_publish -->
					<?php echo $this->Form->end() ?>
				</div>
				<!-- /.rsp_dashboard_content -->
			</div>
			<!-- /.col-md-9 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</section>