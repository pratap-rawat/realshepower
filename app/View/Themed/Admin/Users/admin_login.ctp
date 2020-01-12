<div class="login-box">
	<div class="login-logo">
    	<?php echo $this->Html->image('logo.png'); ?>
    	<div style="font-size: 15px; font-weight: bold;">
    		<?php echo $this->Flash->render(); ?>
    	</div>
  	</div>
  <!-- /.login-logo -->
  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to start your session</p>

    	<?php echo $this->Form->create('User'); ?>
      		<div class="form-group has-feedback">
        		<?php echo $this->Form->input('username', array('class' => 'form-control', 'autocomplete' => 'off', 'label' => false, 'placeholder'=>'User Name')); ?>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
      		<div class="form-group has-feedback">
        		<?php echo $this->Form->input('password', array('class' => 'form-control', 'autocomplete' => 'off', 'label' => false, 'placeholder' => 'Password' )); ?>
        		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
      		</div>
      		<div class="row">
		        <!-- <div class="col-xs-8">
		          <div class="checkbox icheck">
		            <label>
		              <input type="checkbox"> Remember Me
		            </label>
		          </div>
		        </div> -->
		        <!-- /.col -->
		        <div class="col-xs-4">
		          <?php echo $this->Form->button('Login', array('class' => 'btn btn-primary btn-block btn-flat')); ?>
		        </div>
        		<!-- /.col -->
      		</div>
    	<?php echo $this->Form->end(); ?>

	    <!-- <div class="social-auth-links text-center">
	      <p>- OR -</p>
	      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
	        Facebook</a>
	      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
	        Google+</a>
	    </div> -->
	    <!-- /.social-auth-links -->
	    <!-- <a href="#">I forgot my password</a><br> 
		<br>-->
		<?php //echo $this->Html->link('Registration New User', array('action' => 'add')); ?>

  	</div>
  	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->