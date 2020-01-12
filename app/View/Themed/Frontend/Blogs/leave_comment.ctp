<?php
  App::import('Model', 'User');
  $this->User = new User(); 
?>
<li class="rsp_comment_list">
	<div class="rsp_comment_author">
		<img src="images/comment-author.jpg" alt="/">
	</div>
	<!-- /.rsp_comment_author -->
	<div class="rsp_comment_text">
		<h5><?php $user= $this->User->getFullNameById($lastComment['Comment']['user_id']); echo ucwords($user['User']['first_name'].' '.$user['User']['last_name']); ?></h5>
		<time><?php echo date_format(date_create($lastComment['Comment']['created']), 'd M Y'); ?></time>
		<p><?php echo $lastComment['Comment']['comment']; ?></p>
		<a href="#">Reply <i class="fas fa-reply"></i></a>
	</div>
	<!-- /.rsp_comment_text -->
</li>
<!-- /.rsp_comment_list -->