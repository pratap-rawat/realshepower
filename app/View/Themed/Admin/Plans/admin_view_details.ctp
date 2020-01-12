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
                      <?php echo $this->Html->link('Edit Plan', array('controller' => 'plans', 'action' =>'edit', $data['Plan']['id']), array('class'=>'btn btn-info btn-flat pull-right')); ?>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php if($count > 0): ?>
                <tr>
                  <th scope="row">TITLE</th>
                  <td><?php echo $data['Plan']['title']; ?></td>
                </tr>
                <tr>
                  <th scope="row">SUB TITLE</th>
                  <td><?php echo $data['Plan']['sub_title']; ?></td>
                </tr>
                <tr>
                  <th scope="row">PRICE</th>
                  <td><?php echo $data['Plan']['price']; ?></td>
                </tr>
                <tr>
                  <th scope="row">DESCRIPTION</th>
                  <td><?php echo $data['Plan']['description']; ?></td>
                </tr>
                <tr>
                  <th scope="row">STATUS</th>
                  <td><?php echo ($data['Plan']['is_active']) ? 'Active' : 'Inactive'; ?></td>
                </tr>
                <tr>
                  <th scope="row">CREATED DATE</th>
                  <td><?php echo date_format(date_create($data['Plan']['created']),'Y-m-d'); ?></td>
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