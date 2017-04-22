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
                            echo $this->Form->control('username');
                            echo $this->Form->control('password');
                            echo $this->Form->control('group_id', ['options' => $groups]);
                        ?>
                        <div class="form-group checkbox">
                            <input type="hidden" name="enabled" value="0">
                        <label for="associate">
                            <?php if (h($user->device)=='ignore' or h($user->device)==""): ?>
                                <input type="checkbox" name="enabled" value="1" id="enabled-device">Accept logins from single device</label>
                            <?php else: ?>
                                <input type="checkbox" name="enabled" value="1" id="enabled-device" checked>Accept logins from single device</label>
                            <?php endif ?>
                        </div>
                        <div id="device-box">
                            <?php echo $this->Form->control('device', ['label'=>'Mac Address']); ?>
                        </div>
                        <?php
                            echo $this->Form->control('enabled');
                        ?>
                    </fieldset>
                   <?= $this->Form->button(__('Save')) ?>
                    <?= $this->Form->end() ?>
                </div>
                
                <style type="text/css">
                  #device-box
                  {
                      <?php if (h($user->device)=='ignore' or h($user->device)==""): ?>
                      display:none;
                      <?php endif ?>
                  }
              </style>
                
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
                  <div id="collapseTwo" class="panel-collapse collapse in">
                    <div class="box-body">
                        <div class="row">
                            <?php 
                                if($user->username!='guest' && $user->id!=2)
                                    $colNum=3;
                                else
                                    $colNum=4;
                            
                            ?>
                            
                             <div class="col-md-<?php echo $colNum ?>">
                                <abbr title="Abort Changes">
                                    <?= $this->Html->link(__('<button type="button" class="btn btn-success btn-block"><i class="fa fa-undo"></i></button>'), ['controller' => 'Users', 'action' => 'view', $user->id], ['escape' => false, 'style' => 'color:#fff']) ?>
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
                         <li><b>Accept logins from single device:</b> if checked, you can set a single mac address accepted for login. You can leave blanka Mac Address textbox to acquire mac address at first login.</li>
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

