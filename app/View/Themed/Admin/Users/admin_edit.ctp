<?php
  $loguser = $this->Session->read('Auth.Admin');
  //echo '<pre>'; print_r($loguser); die;
?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-warning">
            <div class="box-header with-border">
              <?php echo $this->Flash->render(); ?>
              <h3 class="box-title">Profile Edit Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php echo $this->Form->create('User', array('type' => 'file')); ?>
                <!-- text input -->
                <div class="form-group">
                  <?php echo $this->Form->input('first_name', array('class' => 'form-control','required'=>TRUE, 'placeholder' => 'Enter First Name')); ?>
                </div>

                <div class="form-group">
                  <?php echo $this->Form->input('last_name', array('class' => 'form-control','required'=>TRUE, 'placeholder' => 'Enter Last Name')); ?>
                </div>

        				<div class="form-group date">
                  <?php echo $this->Form->input('gender', array('class' => 'form-control','required'=>TRUE)); ?>
                </div>

                <div class="form-group">
                  <?php echo $this->Form->input('username', array('class' => 'form-control','required'=>TRUE, 'placeholder' => 'Enter Username')); ?>
                </div>
  
                <div class="form-group">
                  <?php echo $this->Form->input('new_password', array('class' => 'form-control', 'type' => 'password', 'autocomplete' => "off")); ?>
                </div>

                <div class="form-group">
                  <?php echo $this->Form->input('mobile', array('class' => 'form-control','required'=>TRUE, 'placeholder' => 'Enter Mobile Number')); ?>
                </div>

                <div class="form-group">
                    <?php echo $this->Form->input('profile_image', array('type' => 'file')); ?>

                    <?php
                      echo $this->Html->image('users/profile_images/' . $this->request->data['User']['profile_image'], array('width' => '150px'));
                    ?>
                </div>

        				<div class="form-group">
                  <?php echo $this->Form->button('Update', array('class' => 'btn btn-primary pull-right')); ?>
        				</div>
              <?php echo $this->Form->end(); ?>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
</section>