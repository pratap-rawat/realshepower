<?php
  $loguser = $this->Session->read('Auth.Admin');
  App::import('Model', 'User');
  $this->User = new User();

  //echo '<pre>'; print_r($loguser); die;
?>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
            <div class="box-header">
              <?php echo $this->Flash->render(); ?>
              <h3 class="box-title">User Records</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Created</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  if ($count > 0) :
                    $srNo = 1;
                    foreach ($data as $value) :
                      //echo '<pre>'; print_r($value);
                  ?>
                    <tr>
                      <td><?php echo $srNo++; ?></td>
                      <td><?php echo $value['User']['first_name']; ?></td>
                      <td><?php echo $value['User']['last_name']; ?></td>
                      <td><?php echo $value['User']['email']; ?></td>
                      <td><?php echo date_format(date_create($value['User']['created']), 'Y-m-d'); ?></td>
                      <td>
                        <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $value['User']['id']), array('escape' => false, 'title' => 'Edit')); ?>
                        &nbsp;&nbsp;
                        <?php
                           if ($value['User']['is_active'] == 1) {
                              echo $this->Form->postLink('<i class="fa fa-remove"></i>', array('action' => 'deactivate', $value['User']['id']), array('escape' => false, 'title' => 'Inactive', 'confirm' => __('Are you sure you want to de-activate ') . $value['User']['first_name'] . ' ' . $value['User']['last_name']));
                           } else {
                            echo $this->Form->postLink('<i class="fa fa-check"></i>', array('action' => 'activate', $value['User']['id']), array('escape' => false, 'title' => 'Active', 'confirm' => __('Are you sure you want to activate ') . $value['User']['first_name'] . ' ' . $value['User']['last_name']));
                            }
                            ?>
                              &nbsp;&nbsp;
                            <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'users', 'action' => 'viewDetails', $value['User']['id']), array('escape' => false, 'title'=>'View Details')); ?>
                      </td>
                    </tr>
                <?php
                  endforeach;
                endif;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Created</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </div>
</section>