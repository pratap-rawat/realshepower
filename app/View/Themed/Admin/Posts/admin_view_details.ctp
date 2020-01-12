<?php
  $loguser = $this->Session->read('Auth.Admin');
  App::import('Model', 'Category');
  $this->Category = new Category();
  //echo '<pre>'; print_r($data);
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
                      <?php echo $this->Html->link('Edit Post', array('controller' => 'posts', 'action' =>'edit', $data['Post']['id']), array('class'=>'btn btn-info btn-flat pull-right')); ?>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php if($count > 0): ?>
                <tr>
                  <th scope="row">CATEGORY</th>
                  <td><?php echo $this->Category->getCategoryById($data['Post']['category'])['Category']['title']; ?></td>
                </tr>
                <tr>
                  <th scope="row">TITLE</th>
                  <td><?php echo $data['Post']['title']; ?></td>
                </tr>
                <tr>
                  <th scope="row">SLUG</th>
                  <td><?php echo $data['Post']['slug']; ?></td>
                </tr>
                <tr>
                  <th scope="row">LANDING URL</th>
                  <td><?php echo $data['Post']['landing_url']; ?></td>
                </tr>
                <?php
                  if(!empty($data['Post']['featured_image'])):
                ?>
                <tr>
                  <th scope="row">FEATURED IMAGE</th>
                  <td>
                    <?php 
                      echo $this->Html->image('posts/' . $data['Post']['featured_image'], array('width' => '150px'));
                    ?>
                    </td>
                </tr>
              <?php endif; ?>
                <tr>
                  <th scope="row">YOUTUBE URL</th>
                  <td><?php echo $data['Post']['youtube_url']; ?></td>
                </tr>
                <tr>
                  <th scope="row">SHORT DESCRIPTION</th>
                  <td><?php echo $data['Post']['excerpt']; ?></td>
                </tr>
                <tr>
                  <th scope="row">DESCRIPTION</th>
                  <td><?php echo $data['Post']['description']; ?></td>
                </tr>
                <tr>
                  <th scope="row">TAGS</th>
                  <td><?php echo $data['Post']['tags']; ?></td>
                </tr>
                <tr>
                  <th scope="row">PUBLISHED DATE</th>
                  <td><?php echo $data['Post']['published_date']; ?></td>
                </tr>

                <?php
                  if(!empty($data['Post']['about_author'])):
                ?>
                <tr>
                  <th scope="row">ABOUT AUTHOR</th>
                  <td><?php echo $data['Post']['about_author']; ?></td>
                </tr>
              <?php endif; ?>

                <?php
                  if(!empty($data['Post']['author_image'])):
                ?>
                <tr>
                  <th scope="row">AUTHOR IMAGE</th>
                  <td>
                    <?php 
                      echo $this->Html->image('posts/' . $data['Post']['author_image'], array('width' => '150px'));
                    ?>
                    </td>
                </tr>
              <?php endif; ?>
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