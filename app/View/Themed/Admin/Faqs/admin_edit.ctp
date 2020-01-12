<?php
  $loguser = $this->Session->read('Auth.Admin');
?>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-header with-border">
          <?php echo $this->Flash->render(); ?>
          <h3 class="box-title">Faq Updation Form</h3>
        </div>
        <!-- /.box-header <-->
        <div class="box-body">
          <?php echo $this->Form->create('Faq', array('type' => 'file')); ?>
            <!-- text input -->

          <div class="form-group">
            <?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Enter Title', 'onkeyup' => 'createSlug()')); ?>
          </div>

          <div class="form-group">
            <?php echo $this->Form->input('description', array('class' => 'form-control', 'label' => 'Description', 'type' => 'textarea', 'rows' => '10', 'id' => 'editor1')); ?>
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
  /*function showHideCategoreis(){
    var type = document.getElementById('PostType').value;
    document.getElementById('catIds').style.display = (type != 'blog') ? 'none' : 'block';
  }*/

  function createSlug(){
    var title = document.getElementById('PostTitle').value;
    document.getElementById('PostSlug').value = title.replace(/\s+/g, '-').toLowerCase();
  }
</script>