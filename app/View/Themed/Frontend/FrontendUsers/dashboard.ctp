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
					<h4>Write Your Blog...</h4>
					<form action="#">
						<div class="rsp_textarea">
							<textarea name="" id="" cols="30" rows="10" placeholder="share something about your self"></textarea>
						</div>
						<!-- /.rsp_textarea -->
						<div class="rsp_input_file">
							<label for="image"><i class="fas fa-images"></i></label>
							<input type="file" id="image" class="d-none">
							<label for="video"><i class="fas fa-video"></i></label>
							<input type="file" id="video" class="d-none">
						</div>
						<!-- /.rsp_input_file -->
						<div class="rsp_publish d-flex justify-content-end">
							<input type="submit" class="action-btn-border" value="Discard">
							<input type="submit" class="action-btn" value="Publish">
						</div>
						<!-- /.rsp_publish -->
					</form>
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
