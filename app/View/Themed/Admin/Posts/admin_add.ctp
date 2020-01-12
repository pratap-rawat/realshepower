<?php
 $loguser = $this->Session->read('Auth.Admin');
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
          <h3 class="box-title">Post Creation Form</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php echo $this->Form->create('Post', array('type' => 'file')); ?>
            <!-- text input -->

          <!-- <div class="form-group">
            <?php //echo $this->Form->input('type', array('class' => 'form-control', 'onChange' => 'showHideCategoreis()')); ?>
          </div> -->

          <div class="form-group">
            <?php echo $this->Form->input('category', array('class' => 'form-control', 'onChange' => 'showLandingURL()')); ?>
          </div>

          <div class="form-group">
            <?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Enter Title', 'onkeyup' => 'createSlug()')); ?>
          </div>

          <div class="form-group">
            <?php echo $this->Form->input('slug', array('class' => 'form-control', 'placeholder' => 'Enter Slug')); ?>
          </div>


          <div class="form-group landingURL" style="display:none">
            <?php echo $this->Form->input('landing_url', array('class' => 'form-control', 'placeholder' => 'Landing URL', 'label' => 'Landing URL')); ?>
          </div>

          <div class="form-group">
              <?php echo $this->Form->input('featured_image', array('type' => 'file')); ?>
          </div>

          <div class="form-group">
            <?php echo $this->Form->input('youtube_url', array('class' => 'form-control', 'placeholder' => 'Youtube URL', 'label' => 'Youtube URL')); ?>
          </div>

          <div class="form-group">
          <label>Dispaly Preference (Image Or Video)</label><br />
          <?php
            $options= array(
              '0' => 'Image',
              '1' => 'Video',
            );
            $attributes = array(
              'legend' => false,
              'separator' => '&nbsp;&nbsp;&nbsp;'
            );
            echo $this->Form->radio('image_or_video', $options, $attributes);
          ?> 
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
          </div>

          <div class="form-group">
            <?php echo $this->Form->input('about_author', array('class' => 'form-control', 'label' => 'About Author', 'type' => 'textarea', 'id' => 'editor2')); ?>
          </div>

          <div id="label-box"></div>
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
            <?php echo $this->Form->button('Save', array('class' => 'btn btn-primary pull-right')); ?>
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

  function showLandingURL(){
    // value 8 is for category 'Artists'
    var catVal = document.getElementById('PostCategory').value;
    document.getElementsByClassName('landingURL')[0].style.display = (catVal == 8) ? 'block' : 'none' ;
  }
</script>