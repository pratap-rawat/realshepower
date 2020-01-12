<?php
  $loguser = $this->Session->read('Auth.Admin');
  App::import('Model');
?>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
            <div class="box-header">
              <?php echo $this->Flash->render(); ?>
              <h3 class="box-title">Subscriber Records</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Email</th>
                  <th>Subscription Date</th>
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
                        <td><?php echo $value['Subscriber']['email']; ?></td>
                        <td><?php echo date_format(date_create($value['Subscriber']['created']), 'd M Y'); ?></td>
                    </tr>
                  <?php
                  endforeach;
                endif;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Email</th>
                  <th>Subscription Date</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </div>
</section>