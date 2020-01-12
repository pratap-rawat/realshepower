<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
            <div class="box-header with-border">
              <?php echo $this->Flash->render(); ?>
              <h3 class="box-title">Category Creation Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <?php echo $this->Form->create('Category'); ?>
      <div class="form-group has-feedback">
        <?php echo $this->Form->input('title', array('class' => 'form-control','required'=>TRUE, 'label' => false, 'placeholder' => 'Enter Title', 'onkeyup' => 'createSlug()')); ?>
      </div>
      <div class="form-group has-feedback">
        <?php echo $this->Form->input('slug', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Enter Slug')); ?>
      </div>
      <div class="form-group has-feedback">
        <?php echo $this->Form->input('is_active', array('class' => 'form-control','required'=>TRUE, 'options' => array('0'=> 'Inactive', '1' => 'Active'), 'label' => false)); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group">
        <?php echo $this->Form->button('Create', array('type' => 'submit', 'class' => 'btn btn-primary pull-right ')); ?> 
      </div>
    <?php echo $this->Form->end(); ?>

  </div>
  <!-- /.form-box -->
</div>
</div>
  </div>
</section>

<script type="text/javascript">
  function createSlug(){
    var title = document.getElementById('CategoryTitle').value;
    document.getElementById('CategorySlug').value = title.replace(/\s+/g, '-').toLowerCase();
  }
</script>