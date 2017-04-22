<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb" style="padding-right: 18px">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/users">Users</a></li>
        <li class="active">Edit User</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="padding-top: 20px">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style="padding-top: 10px">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Edit User') ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
              <div class="box-body">
                <div class="form-group">
                     <?= $this->Form->create($user) ?>
                    <fieldset>
                        <?php
                            echo $this->Form->control('username', ['disabled'=>true, 'value'=>h($user->username)]);
                            echo $this->Form->control('password', ['disabled'=>true, 'value'=>h($user->password)]);
                            echo $this->Form->control('device', ['disabled'=>true, 'value'=>h($user->device)]);
                        ?>
                        <div class="form-group select">
                            <label for="group-id">Group</label>
                            <input type="text" id="group-id" class="form-control" value="<?php echo h($user->group->name) ?>" disabled>
                        </div>
                        <div class="form-group select">
                            <label for="group-id">Enabled</label>
                            <input type="text" id="group-id" class="form-control" value="<?php if ($user->enabled==1) echo "Yes"; else echo "No"; ?>" disabled>
                        </div>
                        
                    </fieldset>
                    <?= $this->Form->end() ?>
                </div>
                
                
                
              </div>
              
              <!-- /.box-body -->

              <div class="box-footer">
               
              </div>
           
          </div>

        </div>
          <div class="col-md-6">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        Actions
                      </a>
                    </h4>
                  </div>
                  <?php 
                        if($user->username!='guest' && $user->id!=2)
                            $colNum=3;
                        else
                            $colNum=4;

                    ?>
                    <div class="box-body">
                        <div class="row">
                              <div class="col-md-<?php echo $colNum ?>">
                                <abbr title="Abort Changes">
                                    <?= $this->Html->link(__('<button type="button" class="btn btn-warning btn-block"><i class="fa fa-edit"></i></button>'), ['controller' => 'Users', 'action' => 'edit', $user->id], ['escape' => false, 'style' => 'color:#fff']) ?>
                                </abbr>
                            </div> 
                            
                            <?php if($user->username!='guest' && $user->id!=2): ?>
                                <div class="col-md-<?php echo $colNum ?>">  
                                    <abbr title="Delete user">
                                        <?= $this->Form->postLink(__("<button type='button' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i></button>"), ['action' => 'delete', $user->id],  ['escape' => false, 'style' => 'color:#fff', 'confirm' => __('Are you sure you want to delete user {0}?', $user->username)]) 
                                        ?>
                                    </abbr>
                                 </div> 
                             <?php endif ?>
                            
                            <div class="col-md-<?php echo $colNum ?>">
                                <abbr title="Create a new group">
                                    <?= $this->Html->link(__('<button type="button" class="btn btn-info btn-block"><i class="fa fa-plus"></i></button>'), ['controller' => 'Groups', 'action' => 'add'], ['escape' => false, 'style' => 'color:#fff']) ?>
                                </abbr>
                            </div> 
                             <div class="col-md-<?php echo $colNum ?>">
                                <abbr title="Show groups list">
                                    <?= $this->Html->link(__('<button type="button" class="btn btn-success btn-block"><i class="fa fa-users"></i></button>'), ['controller' => 'Groups', 'action' => 'index'], ['escape' => false, 'style' => 'color:#fff']) 
                                    ?>
                                </abbr>
                               
                            </div>
                               
                            </div>
                        </div>
                     
                  
                  </div>
                </div>
                
                <div class="panel box box-secondary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        User's group
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
                    <div class="box-body">
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><abbr title="group's name"><?= $this->Paginator->sort('name') ?></abbr></th>
                            <th><abbr title="user enable to log in"><?= $this->Paginator->sort('minutes', ['th'=>'Minutes']) ?></abbr></th>
                            <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                                <?php $group=$user->group ?>
                                <tr>
                                <td><?= $this->Number->format($group->id) ?></td>
                                <td><?= h($group->name) ?></td>
                                <td><?= h($group->minutes) ?></td>
                                <td class="actions">
                                    <abbr title="View">
                                        <?= $this->Html->link(__("<small class='label bg-green'><i class='fa fa-info'></i></small>"), ['controller' => 'Groups','action' => 'view', $group->id], ['escape' => false]) ?>
                                    </abbr>
                                    <abbr title="Edit">
                                        <?= $this->Html->link(__("<small class='label bg-yellow'><i class='fa fa-edit'></i></small>"), ['controller' => 'Groups', 'action' => 'edit', $group->id], ['escape' => false]) ?>
                                    </abbr>
                                    
                                </td>
                            </tr>
                          </table>
                        </div>
                        
                        
                    </div>
                  </div>
                </div> 
                
                
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Quick Help
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                      <ul>
                        <li><b>Username:</b> user's login name;</li>
                        <li><b>Password:</b> simple user password, cannot be empty. Passwords will be saved in cleartext into database (no hash);</li>
                        <li><b>Device:</b> user's device mac address allowing access. If empty, user can login from all devices at first login, and device's mac will be stored. To reset device, set this value to empty again;</li>
                         <li><b>Group:</b> assign this user to existing group, for policies like time surfing or download quota;</li>
                         <li><b>Enabled:</b> if unchecked, user cannot log in into hotspot</li>
                        
                        
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

