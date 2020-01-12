<?php
  $loguser = $this->Session->read('Auth.Admin');
?>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
            <div class="box-header">
              <?php echo $this->Flash->render(); ?>
              <h3 class="box-title">Faq Records</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Title</th>
                  <th>Description</th>
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
                      <td><?php echo $value['Faq']['title']; ?></td>
                      <td><?php echo $value['Faq']['description']; ?></td>
                      <td>
                      <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $value['Faq']['id']), array('escape' => false, 'title' => 'Edit')); ?>
                            &nbsp;&nbsp;
                            <?php
                           if ($value['Faq']['is_active'] == 1) {
                              echo $this->Form->postLink('<i class="fa fa-remove"></i>', array('action' => 'deactivate', $value['Faq']['id']), array('escape' => false, 'title' => 'Inactive', 'confirm' => __('Are you sure you want to de-activate ') . $value['Faq']['title']));
                           } else {
                            echo $this->Form->postLink('<i class="fa fa-check"></i>', array('action' => 'activate', $value['Faq']['id']), array('escape' => false, 'title' => 'Active', 'confirm' => __('Are you sure you want to activate ') . $value['Faq']['title']));
                            }
                          ?>
                    </td>
                  </tr>
                <?php
                  endforeach;
                  else:
                ?>
                <tr>
                  <th scope="row">Record Not Found</th>
                </tr>
                <?php endif; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Title</th>
                  <th>Description</th>
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