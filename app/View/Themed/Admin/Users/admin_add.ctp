<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
            <div class="box-header with-border">
              <?php echo $this->Flash->render(); ?>
              <h3 class="box-title">User Registration Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <?php echo $this->Form->create('User'); ?>
      <div class="form-group has-feedback">
        <?php echo $this->Form->input('first_name', array('class' => 'form-control','required'=>TRUE, 'label' => false, 'placeholder' => 'Enter First Name')); ?>
      </div>
      <div class="form-group has-feedback">
        <?php echo $this->Form->input('last_name', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter Last Name')); ?>
      </div>
      <div class="form-group has-feedback">
        <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => false, 'required' => TRUE, 'placeholder' => 'Enter Email')); ?>
      </div>
      <div class="form-group has-feedback">
        <?php echo $this->Form->input('gender', array('class' => 'form-control','required'=>TRUE, 'options' => array('female'=> 'Female', 'male' => 'Male'), 'label' => false)); ?>
      </div>
      <div class="form-group has-feedback">
        <?php echo $this->Form->input('username', array('class' => 'form-control','required'=>TRUE, 'label' => false, 'placeholder' => 'Enter Username')); ?>
      </div>
      <div class="form-group has-feedback">
        <?php echo $this->Form->input('password', array('class' => 'form-control','required'=>TRUE, 'label' => false, 'placeholder' => 'Enter Password')); ?>
      </div>
      <div class="form-group has-feedback">
        <?php echo $this->Form->input('confirmPassword', array('class' => 'form-control','required'=>TRUE, 'label' => false, 'placeholder' => 'Enter Password Again', 'type' => 'password')); ?>
      </div>
      <div class="form-group">
        <?php echo $this->Form->button('Register', array('type' => 'submit', 'class' => 'btn btn-primary pull-right ')); ?> 
      </div>
    <?php echo $this->Form->end(); ?>

  </div>
  <!-- /.form-box -->
</div>
</div>
  </div>
</section>
