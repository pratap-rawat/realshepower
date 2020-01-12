<?php
  $loguser = $this->Session->read('Auth.Admin');
  App::import('Model', 'User');
  $this->User = new User();
?>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
            <div class="box-header">
              <?php echo $this->Flash->render(); ?>
              <h3 class="box-title">Plans Listing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Title</th>
                  <th>Sub Title</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  if ($count > 0) :
                    $srNo = 1;
                    foreach ($data as $value) :
                  ?>
                    <tr>
                      <td><?php echo $srNo++; ?></td>
                      <td><?php echo $value['Plan']['title']; ?></td>
                      <td><?php echo $value['Plan']['sub_title']; ?></td>
                      <td><?php echo $value['Plan']['price']; ?></td>
                      <td><?php echo ($value['Plan']['is_active']) ? 'Active' : 'Inactive' ; ?></td>
                      <td>
                      <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $value['Plan']['id']), array('escape' => false, 'title' => 'Edit')); ?>
                            &nbsp;&nbsp;
                            <?php
                           if ($value['Plan']['is_active'] == 1) {
                              echo $this->Form->postLink('<i class="fa fa-remove"></i>', array('action' => 'deactivate', $value['Plan']['id']), array('escape' => false, 'title' => 'Inactive', 'confirm' => __('Are you sure you want to de-activate ') . $value['Plan']['title']));
                           } else {
                            echo $this->Form->postLink('<i class="fa fa-check"></i>', array('action' => 'activate', $value['Plan']['id']), array('escape' => false, 'title' => 'Active', 'confirm' => __('Are you sure you want to activate ') . $value['Plan']['title']));
                            }
                            ?>
                            &nbsp;&nbsp;
                        <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'plans', 'action' => 'viewDetails', $value['Plan']['id']), array('escape' => false, 'title' => 'View Details')); ?>
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
                  <th>Title</th>
                  <th>Sub Title</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </div>
</section>