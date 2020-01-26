<?php
  App::import('Model', 'User');
  $this->User = new User(); 
?>
<section class="rsp_inner_banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><?php echo $postDetail['Post']['title']; ?></h2>
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
							<li><a href="/">home</a></li>
							<li>/</li>
							<li>Post Detail</li>
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

	<article class="blog_detail_page py-100">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<figure class="post_thumbnail">
					<?php echo $this->Html->image('posts/' . $postDetail['Post']['featured_image'], array('class'=>'img-fluid', 'alt'=>'/')); ?>
					</figure>
					<div class="blog_info">
						<div class="admin-detail">
						<time><i class="far fa-calendar-alt"></i><?php echo date_format(date_create($postDetail['Post']['created']), 'd M Y'); ?></time>
						<div class="post"><i class="fas fa-user-alt"></i>Admin</div>
						<?php
							$tags = json_decode($postDetail['Post']['tags']);
							if(!empty($tags)):
						?>
						<div class="post_category"><i class="fas fa-tags"></i>
							<?php foreach($tags as $tag) :?>
							<a href="#"><?php echo $tag; ?></a> ,
							<?php endforeach; ?>
						</div>
							<?php endif; ?>
						<!-- /.post_category -->
						<?php if ($userAuth): ?>
								<div class="post_like liked">
									<?php if(!$checkUserLikeStatus): ?>
									<i class="fas fa-heart" style="cursor:pointer; color: green;" onclick="addLike(<?php echo $userAuth['id']; ?>,<?php echo $postDetail['Post']['id']; ?>,<?php echo $postDetail['Post']['user_id']; ?>);">
									</i>
									<?php else: ?>
										<i class="fas fa-heart"></i>
									<?php endif; ?>
									<span id='totalLikes'><?php echo $postTotalLikes; ?></span>
								</div>
							<?php else: ?>
								<div class="post_like liked"><i class="fas fa-heart"></i><span id='totalLikes'><?php echo $postTotalLikes; ?></span></div>
							<?php endif; ?>
						<!-- /.post_like -->
						<div class="post_comment commented">
							<i class="fas fa-comments"></i><?php echo $postTotalComments; ?>
						</div>
						<!-- /.post_comment -->
					</div>
					<div class="social_share">
						<p>Share :</p>
						<a href="#" onclick="sharethisToFB('<?php echo Router::url(null, true); ?>');"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<!-- <a href="#"><i class="fab fa-whatsapp"></i></a> -->
					</div>
					<!-- /.social_share -->
					</div>
					<!-- /.blog_info -->
					<?php echo $postDetail['Post']['description']; ?>
					<div class="rsp_comments">
						<h4>Comments</h4>
						<ul class="rsp_comment_body" id="appendComment">
							<?php if(isset($postComments) && !empty($postComments) ){
								foreach ($postComments as $comment) { ?>
								<li class="rsp_comment_list">
									<div class="rsp_comment_author">
										<img src="images/comment-author.jpg" alt="/">
									</div>
									<!-- /.rsp_comment_author -->
									<div class="rsp_comment_text">
										<h5>
											<?php $user= $this->User->getFullNameById($comment['Comment']['user_id']); echo ucwords($user['User']['first_name'].' '.$user['User']['last_name']); ?>
										</h5>
										<time>
											<?php echo date_format(date_create($comment['Comment']['created']), 'd M Y'); ?>
										</time>
										<p><?php echo $comment['Comment']['comment']; ?></p>
										<!-- <a href="#">Reply <i class="fas fa-reply"></i></a> -->
									</div>
									<!-- /.rsp_comment_text -->
								</li>
							<?php } }else{?>
								<li class="rsp_comment_list no-comment">
									<h2>No Comments!!</h2>
								</li>
								<?php } ?>
							<!-- /.rsp_comment_list -->
						</ul>
						<!-- /.rsp_comment_body -->
					</div>
					<!-- /.rsp_comment_list -->
					<?php if ($userAuth): ?>
					<div class="comment_section">
						<h4>leave a comment</h4>

						<?php echo $this->Form->create(false, array('url' => array('controller' => 'Blogs', 'action' => 'leaveComment'), 'id' => 'LeaveComment', 'class'=>'comment_form'));?>

							<div class="row">
								<div class="col-md-12 rsp_comment_form">
									<?php echo $this->Form->hidden('post_id',array('value'=>$postDetail['Post']['id'])) ?>
									<?php echo $this->Form->hidden('post_user_id',array('value'=>$postDetail['Post']['user_id'])) ?>
									<?php echo $this->Form->input('comment',array('label'=>false,'type'=>'textarea','placeholder'=>'Message', 'cols'=>'30', 'rows'=>'10')); ?>
								</div>
								<!-- /.col-md-12 rsp_comment_form -->
								<div class="col-md-12 rsp_submit text-center">
									<input type="submit" value="Submit" class="action-btn-border">
								</div>
								<!-- /.col-md-12 rsp_submit -->
							</div>
							<!-- /.row -->
						<?php echo $this->Form->end(); ?>
					</div>
					<!-- /.comment_section -->
					<?php endif; ?>
				</div>
				<!-- /.col-md-12 -->

			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</article>
	<!-- /.blog_detail_page -->
