<?php
  $loguser = $this->Session->read('Auth.Admin');
?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
            <div class="box-header with-border">
              <?php echo $this->Flash->render(); ?>
              <h3 class="box-title">Category Edit Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php echo $this->Form->create('Category'); ?>
                <!-- text input -->
                <div class="form-group">
                  <?php echo $this->Form->input('title', array('class' => 'form-control','required'=>TRUE, 'placeholder' => 'Enter Title Name', 'onkeyup' => 'createSlug()')); ?>
                </div>

                <div class="form-group">
                  <?php echo $this->Form->input('slug', array('class' => 'form-control','required'=>TRUE, 'placeholder' => 'Enter Slug Name')); ?>
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

<script type="text/javascript">
  function createSlug(){
    var title = document.getElementById('CategoryTitle').value;
    document.getElementById('CategorySlug').value = title.replace(/\s+/g, '-').toLowerCase();
  }
</script>