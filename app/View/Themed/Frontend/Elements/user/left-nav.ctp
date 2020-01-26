<div class="col-md-3">
	<div class="rsp_dashboard_pane">
		<div class="rsp_dashboard_profile text-center">
			<div class="rsp_dashboard_image">
				<?php if(isset($userProfile) && !empty($userProfile))
				{
					if($userProfile['profile_image']!=''){
						echo $this->Html->image('frontend_images/user/'.$userProfile['profile_image']);
					}else{
						if($userProfile['gender']=='male'){
							echo $this->Html->image('frontend_images/user/default-male.jpg');
						}else{
							echo $this->Html->image('frontend_images/user/default-female.jpg');
						}
					}
				} ?>
			</div>
			<!-- /.rsp_dashboard_image -->
			<div class="rsp_dashboard_name">
				<h4 class="rsp_profile_name"><?php if(isset($userProfile) && !empty($userProfile)){ echo ucwords($userProfile['first_name'].' '.$userProfile['last_name']); } ?></h4>
			</div>
			<!-- /.rsp_dashboard_name -->
			<div class="rsp_follow">
				<a href="#">following <span>12</span></a>
				<a href="#">followers <span>08</span></a>
			</div>
			<!-- /.rsp_follow -->
		</div>
		<!-- /.rsp_dashboard_profile -->
		<nav class="dashboard_navi">
			<ul>
				<li>
					<?php echo $this->Html->link('Dashboard', array('controller'=>'FrontendUsers', 'action'=>'dashboard' )) ?>	
				</li>
				<li>
					<?php echo $this->Html->link('Profile', array('controller'=>'FrontendUsers', 'action'=>'profile' )) ?>	
				</li>
				<!-- <li><a href="#">my wallet</a></li> -->
				<?php if(strtolower($userProfile['gender'] !='male')){  ?>
				<li>
				<?php echo $this->Html->link('Blogs', array('controller'=>'FrontendUsers', 'action'=>'addBlog' )) ?>	
				</li>
				<?php }?>
				<li>
				<?php echo $this->Html->link('Change Password', array('controller'=>'FrontendUsers', 'action'=>'changePassword' )) ?>	
				</li>
				<li><?php echo $this->Html->link('Logout', '/logout'); ?></li>
			</ul>
		</nav>
		<!-- /.dashboard_navi -->

	</div>
	<!-- /.rsp_dashboard_pane -->
</div>
