<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users Groups</a></li>
        <li class="active">Add Group</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Add Group') ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
              <div class="box-body">
                <div class="form-group">
                     <?= $this->Form->create($group) ?>
                    <fieldset>
                       <?php
                            echo $this->Form->control('name');
                            echo $this->Form->control('minutes', ['label' => 'Surfing minutes']);
                            echo $this->Form->control('blockInterval', ['label' => 'Block after expire']);
                            echo $this->Form->control('fakeminutesoffset', ['label' => 'Hidden minutes']);
                            echo $this->Form->control('upload', ['label' => 'Upload rate limit ( kbps)']);
                            echo $this->Form->control('download', ['label' => 'Download rate limit (kbps)']);
                            echo $this->Form->control('quota', ['label' => 'Download quota (megabytes)']);
                        ?>
                    </fieldset>
                   <?= $this->Form->button(__('Save')) ?>
                    <?= $this->Form->end() ?>
                </div>
                <div class="form-group">
                  
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
                  <div id="collapseTwo" class="panel-collapse collapse in">
                    <div class="box-body">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <abbr title="Show groups list">
                                    <?= $this->Html->link(__('<button type="button" class="btn btn-success btn-block"><i class="fa fa-users"></i></button>'), ['controller' => 'Groups', 'action' => 'index'], ['escape' => false, 'style' => 'color:#fff']) ?>
                                </abbr>
                            </div> 
                            
                            <div class="col-md-6"> 
                                <abbr title="Users List">
                                    <?= $this->Html->link(__('<button type="button" class="btn btn-warning btn-block"><i class="fa fa-user"></i></button>'), ['controller'=>'Users', 'action' => 'index'], ['escape' => false, 'style' => 'color:#fff']) ?>
                                 </abbr>
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
                        <li><b>Name:</b> group's name</li>
                        <li><b>Surfing minutes:</b> total client sessions duration. When timeout occurs, client will be locked for minutes read from "Block after expire" option;</li>
                        <li><b>Block after expire:</b> minutes to be blocked before removing this session from database, allowing next client log in;</li>
                         <li><b>Hidden minutes:</b> hide minutes from total times, useful to alert distracted users;</li>
                         <li><b>Upload:</b> upload rate limit to single client</li>
                         <li><b>Download:</b> download rate limit to single client</li>
                         <li><b>Download quota:</b> Download quota limit to single client</li>
                        
                        
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

