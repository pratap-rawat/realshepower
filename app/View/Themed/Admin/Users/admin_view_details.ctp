<?php
  $loguser = $this->Session->read('Auth.Admin');
?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-warning">
          <div class="box-header">
            <?php echo $this->Flash->render(); ?>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" colspan="2">
                      <?php echo $this->Html->link('Edit Profile', array('controller' => 'users', 'action' =>'edit', $data['User']['id']), array('class'=>'btn btn-info btn-flat pull-right')); ?>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php if($count > 0): ?>
                <tr>
                  <th scope="row">FIRST NAME</th>
                  <td><?php echo ucwords($data['User']['first_name']); ?></td>
                </tr>
                <tr>
                  <th scope="row">LAST NAME</th>
                  <td><?php echo ucwords($data['User']['last_name']); ?></td>
                </tr>
                <tr>
                  <th scope="row">GENDER</th>
                  <td><?php echo ucwords($data['User']['gender']); ?></td>
                </tr>
                <tr>
                  <th scope="row">USERNAME</th>
                  <td><?php echo $data['User']['username']; ?></td>
                </tr>
                <tr>
                  <th scope="row">ROLE</th>
                  <td><?php echo ucwords(str_replace('_', ' ', $data['User']['role'])); ?></td>
                </tr>
                <tr>
                  <th scope="row">MOBILE</th>
                  <td><?php echo $data['User']['mobile']; ?></td>
                </tr>
                <tr>
                  <th scope="row">PROFILE IMAGE</th>
                    <td>
                      <?php 
                        echo $this->Html->image('users/profile_images/' . $data['User']['profile_image'], array('width' => '150px'));
                      ?>
                    </td>
                </tr>
                <?php else: ?>
                <tr>
                  <th scope="row">User Not Found</th>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
		</div>
	</div>
</section>