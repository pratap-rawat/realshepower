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
					<h4>Write Your Blog...</h4>
					<?php echo $this->Form->create(false, array('enctype'=>'multipart/form-data','url'=>array('controller' => 'FrontendUsers', 'action' => 'addBlog'))); ?>
                        <div class="row">
                            <div class="col-md-12 form-group">
                            <label for="email">Category <span class="danger">*</span> </label>
                                <?php echo $this->Form->input('category', array('label' => false,'type'=>'select', 'class' => 'form-control','default'=>'Select Category','options'=>$categories)) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                            <label for="email">Title <span class="danger">*</span></label>
                                <?php echo $this->Form->input('title', array('label' => false, 'type' => 'text','required'=>'true', 'class' => 'form-control','placeholder'=>'Enter blog title','onkeyup' => 'createSlug()')) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                            <label for="email">Slug <span class="danger">*</span></label>
                                <?php echo $this->Form->input('slug', array('label' => false, 'type' => 'text', 'required'=>'true', 'class' => 'form-control', 'placeholder'=>'Enter slug')) ?>
                            </div>
						</div>
						<div class="row">
							<div class="col-md-12 form-group">
								<div id="label-box"></div>
          						<?php echo $this->Form->input('valueForYourForm', array('id' => 'labelInput', 'type' => 'hidden')); ?>
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                            <label>Tags</label>
								<?php echo $this->Form->input('tags', array('label' => false, 'type' => 'text', 'class' => 'form-control','placeholder'=>'Enter Tags ','id' => 'text-field')) ?>
								<?php echo $this->Html->link('ADD TAGS', array('#'), array('class'=>'btn btn-info btn-flat pull-left', 'id' => 'add-label')); ?><br /><br />
                            </div>
                        </div>

						<div class="row ">
							<div class="col-md-12 form-group">
							<label >Short Description <span class="danger">*</span></label>
								<?php echo $this->Form->input('excerpt', array('label' => false, 'type' => 'textarea','required'=>'true', 'rows'=>'3', 'class' => 'form-control','placeholder'=>'Enter short description')) ?>
							</div>
						</div>

						<div class="rsp_textarea">
							<label >Description</label>
							<?php echo $this->Form->input('description', array('label'=>false, 'type'=>'textarea','placeholder'=>'Share something about your self','cols'=>'30','rows'=>'10','id' => 'editor')) ?>
						</div>
						<!-- /.rsp_textarea -->
						<div class="rsp_input_file">
							<label for="image"><i class="fas fa-images"></i></label>
							<?php echo $this->Form->input('featured_image', array('label'=>false, 'class'=>'d-none','type'=>'file', 'id'=>'image','required'=>'true')) ?>
						</div>
						<!-- /.rsp_input_file -->
						<div class="rsp_publish d-flex justify-content-end">
						<?php echo $this->Html->link('Discard',array('controller'=>'FrontendUsers','action'=>'dashboard'),array('class'=>'action-btn-border')) ?>
							<input type="submit" class="action-btn" value="Publish">
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
<!-- /.rsp_dashboard -->
<script type="text/javascript">
	function createSlug(){
    var title = document.getElementById('title').value;
    document.getElementById('slug').value = title.replace(/\s+/g, '-').toLowerCase();
  }

  
</script>