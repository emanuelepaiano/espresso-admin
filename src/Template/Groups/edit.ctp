<?php
/**
  * @var  \App\View\AppView $this
  */
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb" style="padding-right: 18px">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/groups">Groups</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row" style="padding-top:20px">
        <!-- left column -->
        <div class="col-md-6 col-xs-12" style="padding-top:10px;">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Group info') ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="row">
                <!-- left column -->
                
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="box-body">
                                 <?= $this->Form->create($group) ?>
                                <fieldset>
                                    <?php
                                        echo $this->Form->control('name', ['label' => 'Name', 'value' => h($group->name)]);
                                        echo $this->Form->control('minutes', ['label' => 'Surfing minutes', 'value' => h($group->minutes)]);
                                        echo $this->Form->control('blockInterval', ['label' => 'Block after expire', 'value' => h($group->blockInterval)]);
                                        echo $this->Form->control('fakeminutesoffset', ['label' => 'Hidden minutes', 'value' => h($group->fakeminutesoffset)]);
                                        echo $this->Form->control('upload', ['label' => 'Upload rate limit (kbps)', 'value' => h($group->upload)]);
                                        echo $this->Form->control('download', ['label' => 'Download rate limit (kbps)', 'value' => h($group->download)]);
                                        echo $this->Form->control('quota', ['label' => 'Download quota (megabytes)', 'value' => h($group->quota)]);

                                    ?>
                                </fieldset>
                                <?= $this->Form->button(__('Save')) ?>
                               <?= $this->Form->end() ?>
                            </div>
                        </div>
                </div>
              </div>
              

              <div class="box-footer">
               
              </div>
           
          </div>

        </div>
        
          <div class="col-md-6 col-xs-12">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                
                <div class="panel box box-secondary">
                  <div class="box-header with-border">
                   <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                      <h3 class="box-title">Actions</h3>
                  </div>
                  <!--<div id="collapseTwo" class="panel-collapse collapse in">-->
                    <div class="box-body">
                        <div class="row">
                            <?php 
                                if($group->name!='guest' && $group->id!=3)
                                    $colNum=3;
                                else
                                    $colNum=4;
                            
                            ?>
                            <div class="col-md-<?php echo $colNum ?>">
                                 <abbr title="Abort changes">
                                     <?= $this->Html->link(__('<button type="button" class="btn btn-success btn-block"><i class="fa fa-undo"></i></button>'), ['action' => 'view', $group->id], ['escape' => false, 'style' => 'color:#fff']) 
                                     ?>
                                </abbr>
                             </div> 
                            
                            <?php if($group->name!='guest' && $group->id!=3): ?>
                                <div class="col-md-<?php echo $colNum ?>">
                                     <abbr title="delete this group">
                                         <?= $this->Form->postLink(__("<button type='button' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i></button>"), ['action' => 'delete', $group->id], ['escape' => false, 'style' => 'color:#fff', 'confirm' => __('Are you sure you want to delete {0}?', $group->name)])
                                         ?>
                                    </abbr>
                                </div>
                            <?php endif ?>
                            
                            <div class="col-md-<?php echo $colNum ?>">
                                 <abbr title="Create a new group">
                                     <?= $this->Html->link(__('<button type="button" class="btn btn-info btn-block"><i class="fa fa-plus"></i></button>'), ['controller' => 'Groups', 'action' => 'add'], ['escape' => false, 'style' => 'color:#fff']) 
                                     ?>
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
                 <!-- </div> -->
                </div>                
                <div class="panel box box-secondary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Quick Help</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                 <!-- <div id="collapseOne" class="panel-collapse collapse in">-->
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
                 <!-- </div>-->
                </div>
                  
              </div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <!-- /.row -->
   
    </section>
    <!-- /.content -->

