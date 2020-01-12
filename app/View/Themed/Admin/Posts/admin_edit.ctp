<?php
 $loguser = $this->Session->read('Auth.Admin');
 $postDetails = $this->request->data;
 //echo '<pre>'; print_r($postDetails); die;
 if(count($this->request->data['Post']['valueForYourForm']) < 1)
 {
    $this->request->data['Post']['valueForYourForm'] = '';
 }
 //valueForYourForm
?>

<style>
  #label-box {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      margin-top: 20px;
  }
  .label {
      padding: 10px;
      background: #5771a8 ;
      border-radius: 10px;
  }
  .label span.close-label {
      margin-left: 10px;
      font-size: 14px;
      cursor: pointer;
  }
  .label:not(:last-child) { margin-right: 10px; }
</style>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-header with-border">
          <?php echo $this->Flash->render(); ?>
          <h3 class="box-title">Post Updation Form</h3>
        </div>
        <!-- /.box-header <-->
        <div class="box-body">
          <?php echo $this->Form->create('Post', array('type' => 'file')); ?>
            <!-- text input -->

          <!-- <div class="form-group">
            <?php //echo $this->Form->input('type', array('class' => 'form-control', 'onChange' => 'showHideCategoreis()')); ?>
          </div> -->

          <div class="form-group">
            <?php echo $this->Form->input('category', array('class' => 'form-control')); ?>
          </div>

          <div class="form-group">
            <?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Enter Title', 'onkeyup' => 'createSlug()')); ?>
          </div>

          <div class="form-group">
            <?php echo $this->Form->input('slug', array('class' => 'form-control', 'placeholder' => 'Enter Slug')); ?>
          </div>


          <div class="form-group">
            <?php echo $this->Form->input('landing_url', array('class' => 'form-control', 'placeholder' => 'Landing URL', 'label' => 'Landing URL')); ?>
          </div>

          <div class="form-group">
              <?php echo $this->Form->input('featured_image', array('type' => 'file')); ?>

              <?php echo $this->Html->image('posts/' . $postDetails['Post']['featured_image'], array('width' => '150px')); ?>
          </div>
          
          <div class="form-group">
            <?php echo $this->Form->input('youtube_url', array('class' => 'form-control', 'placeholder' => 'Youtube URL', 'label' => 'Youtube URL')); ?>
          </div>

          <div class="form-group">
            <?php echo $this->Form->input('excerpt', array('class' => 'form-control', 'placeholder' => 'Enter Short Description', 'label' => 'Short Description', 'type' => 'textarea', 'rows' => '3')); ?>
          </div>

          <div class="form-group">
            <?php echo $this->Form->input('description', array('class' => 'form-control', 'label' => 'Description', 'type' => 'textarea', 'rows' => '10', 'id' => 'editor')); ?>
          </div>

          <div class="form-group">
            <label for="published_date">DateTime Picking</label><br />
            <div class="input-group date form_datetime col-md-5" data-link-field="dtp_input1">
              <?php echo $this->Form->control('published_date', array('class' => 'form-control','required' => true, 'placeholder' => 'Select Post Published Date', 'readonly' => true)); ?>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </span>
            </div>
          </div>

          <div class="form-group">
              <?php echo $this->Form->input('author_image', array('type' => 'file')); ?>

              <?php echo $this->Html->image('posts/' . $postDetails['Post']['author_image'], array('width' => '150px')); ?>
          </div>

          <div class="form-groups">
            <?php echo $this->Form->input('about_author', array('class' => 'form-control', 'label' => 'About Author', 'type' => 'textarea', 'id' => 'editor2')); ?>
          </div>
          <div id="label-box">
          <?php
            //echo 'pratap--'. count($postDetails['Post']['tagsValues']);
            if(count($postDetails['Post']['tagsValues']) > 0)
            {
              foreach($postDetails['Post']['tagsValues'] as $tagValue)
              {
              ?>
                <label class="label"><span><?php echo $tagValue; ?></span><span class="close-label">x</span></label>
              <?php
              }
            }
          ?>
          </div>
          <?php echo $this->Form->input('valueForYourForm', array('id' => 'labelInput', 'type' => 'hidden')); ?>
          <div class="form-group">
            <?php echo $this->Form->input('tags', array('class' => 'form-control', 'placeholder' => 'Enter Tags', 'id' => 'text-field')); ?>
            <?php echo $this->Html->link('ADD TAGS', array('#'), array('class'=>'btn btn-info btn-flat pull-left', 'id' => 'add-label')); ?><br /><br />
              <!-- <a href="#" id="add-label">Add</a> -->
          </div>

          <div class="form-group has-feedback">
            <?php echo $this->Form->input('is_active', array('class' => 'form-control','required'=>TRUE, 'options' => array('0'=> 'Inactive', '1' => 'Active'), 'label' => false)); ?>
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