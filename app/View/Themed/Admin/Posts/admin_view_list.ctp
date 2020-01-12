<?php
  $loguser = $this->Session->read('Auth.Admin');
  App::import('Model', 'Category');
  $this->Category = new Category();
?>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
            <div class="box-header">
              <?php echo $this->Flash->render(); ?>
              <h3 class="box-title">Post Records</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Category ID</th>
                  <th>Title</th>
                  <th>Published Date</th>
                  <th>Actions</th>
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
                      <td><?php echo $this->Category->getCategoryById($value['Post']['category'])['Category']['title']; ?></td>
                      <td><?php echo $value['Post']['title']; ?></td>
                      <td><?php echo $value['Post']['published_date']; ?></td>
                      <td>
                      <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $value['Post']['id']), array('escape' => false, 'title' => 'Edit')); ?>
                            &nbsp;&nbsp;
                            <?php
                           if ($value['Post']['is_active'] == 1) {
                              echo $this->Form->postLink('<i class="fa fa-remove"></i>', array('action' => 'deactivate', $value['Post']['id']), array('escape' => false, 'title' => 'Inactive', 'confirm' => __('Are you sure you want to de-activate ') . $value['Post']['title']));
                           } else {
                            echo $this->Form->postLink('<i class="fa fa-check"></i>', array('action' => 'activate', $value['Post']['id']), array('escape' => false, 'title' => 'Active', 'confirm' => __('Are you sure you want to activate ') . $value['Post']['title']));
                            }
                            ?>
                            &nbsp;&nbsp;
                        <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'posts', 'action' => 'viewDetails', $value['Post']['id']), array('escape' => false, 'title' => 'View Details')); ?>
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
                  <th>Category ID</th>
                  <th>Title</th>
                  <th>Published Date</th>
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