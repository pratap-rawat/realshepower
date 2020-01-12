<?php
 $loguser = $this->Session->read('Auth.Admin');
 ?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-warning">
          <div class="box-header">
            <?php echo $this->Flash->render(); ?>
            <!-- <h3 class="box-title">Sale Details</h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table">
              <!-- <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Values</th>
                </tr>
              </thead> -->
              <tbody>
                <?php if($count > 0): ?>
                <tr>
                  <th scope="row">FULL NAME</th>
                  <td><?php echo $data['User']['full_name']; ?></td>
                </tr>
                <tr>
                  <th scope="row">GENDER</th>
                  <td><?php echo ucfirst($data['User']['gender']); ?></td>
                </tr>
                <?php //if(in_array(AuthComponent::user('role'), array('super_admin','admin'))): ?>
                <tr>
                  <th scope="row">USERNAME</th>
                  <td><?php echo $data['User']['username']; ?></td>
                </tr>
                <tr>
                  <th scope="row">DATE OF BIRTH</th>
                  <td><?php echo $data['User']['dob']; ?></td>
                </tr>
                <tr>
                  <th scope="row">ROLE</th>
                  <td><?php echo $data['User']['role']; ?></td>
                </tr>
                <tr>
                  <th scope="row">MOBILE</th>
                  <td><?php echo $data['User']['mobile']; ?></td>
                </tr>
                <tr>
                  <th scope="row">ALTERNATE MOBILE</th>
                  <td><?php echo $data['User']['alternate_mobile']; ?></td>
                </tr>
                <tr>
                  <th scope="row">RESIDENCE ADDRESS</th>
                  <td><?php echo $data['User']['residence_address']; ?></td>
                </tr>
                <tr>
                  <th scope="row">PERMANENT ADDRESS</th>
                  <td><?php echo $data['User']['permanent_address']; ?></td>
                </tr>
                <tr>
                  <th scope="row">JOINING DATE</th>
                  <td><?php echo date_format(date_create($data['User']['created']), 'Y-m-d'); ?></td>
                </tr>
                <?php else: ?>
                <tr>
                  <th scope="row">Record Not Found</th>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
		</div>
	</div>
</section>