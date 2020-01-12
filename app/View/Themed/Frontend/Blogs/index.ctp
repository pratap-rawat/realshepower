<?php
  App::import('Model', 'User');
  $this->User = new User(); 
?>
<section class="rsp_inner_banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Blogs Page</h2>
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
		<div class="rsp_inner_banner_breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="rsp_breadcrumb">
							<li><a href="/">Home</a></li>
							<li>/</li>
							<li><?php echo $cat_name; ?></li>
						</ul>
					</div>
					<!-- /.col-md-12 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /.rsp_inner_banner_breadcrumb -->
	</section>
	<!-- /.rsp_inner_banner -->

	<section class="rsp_blog py-100">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="rsp_blog_cat text-center mb-5">
						<?php
						if(isset($this->params['pass'][0]) && !empty($this->params['pass'][0])){
							$param = $this->params['pass'][0];
						}else{
							$param = 'active_cat';
						}
						?>
					<a href="<?php echo $this->webroot . 'blog' ?>" class="action-btn-border <?php echo $param; ?>" data-cat="all">All</a>
						<?php
							
							if (isset($categories) && !empty($categories)) {
								foreach ($categories as $cat) {
									$class = ($param == $cat['Category']['slug']) ? 'active_cat' : '';
						?>
									<a href="<?php echo $this->webroot . 'blog/categories/' .$cat['Category']['slug'] ?>" class="action-btn-border <?php echo $class; ?>" data-cat="all" ><?php echo $cat['Category']['title'] ?></a>
							<?php	}
							}
						?>
					</nav>
				</div>
				<!-- /.col-md-12 -->
				<div class="col-md-12">
					<div class="row" id='PostByAjax'>
					<?php if(isset($posts) && !empty($posts)): ?>
							<?php foreach($posts as $singlePost) : ?>
						<div class="col-md-4 all post_cat video">
							<div class="blog-box">
								<div class="img-wrapper">
									<?php echo $this->Html->image('posts/' . $singlePost['Post']['featured_image'], array('class'=>'img-fluid', 'alt'=>'/')); ?>
								</div>
						<!-- /.img-wrapper -->
						<div class="blog-content text-left">
							<div class="author-img">
								<?php echo $this->Html->image('posts/' . $singlePost['Post']['author_image'], array('class'=>'img-fluid', 'alt'=>'/')); ?>
							</div>
							<div class="admin-detail">
								<time><i class="far fa-calendar-alt"></i><?php echo date_format(date_create($singlePost['Post']['created']), 'd M Y'); ?></time>
								<div class="post"><i class="fas fa-user-alt"></i><?php $user= $this->User->getFullNameById($singlePost['Post']['user_id']); echo ucwords($user['User']['first_name'].' '.$user['User']['last_name']); ?></div>
							</div>
							<h4><?php echo $singlePost['Post']['title']; ?></h4>
							<p><?php echo $singlePost['Post']['excerpt']; ?></p>
							<a href="post/<?php echo $singlePost['Post']['slug']; ?>">Read me <?php echo $this->Html->image('frontend_images/arrow-sign-used-black.png', array('alt' => 'arrow-sign-used-black')); ?></a>
						</div>
						<!-- /.blog-content -->
					</div>
						</div>
						<!-- /.col-md-4 -->
						<?php endforeach; ?>
						<?php else: ?>
						<div class="col-md-12">
						<h2 style="text-align:center">Post Not Found!</h2>
						</div>
						<?php endif; ?>
					</div>
					<!-- /.row -->
				</div>
				<!-- /.col-md-12 -->
				<?php
					$postCounter = count($posts);
					if($postCounter == 6):
				?>
				<input type='hidden' id='offset' value="<?php echo $postCounter; ?>" />
				<div class="col-md-12 text-center" id='loadMoreBtn'>
					<button onclick="loadMorePosts('<?php echo $cat_id; ?>')" class="btn action-btn rsp_bt_md" type="submit">Show More Blogs
					<?php echo $this->Html->image('frontend_images/arrow-sign-used.png', array('alt' => 'arrow-sign-used')); ?>
					</button>
				</div>
					<?php endif; ?>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</section>
	<!-- /.rsp_blog -->
