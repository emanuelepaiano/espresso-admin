<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb" style="padding-right: 18px">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/users">Administrators</a></li>
        <li class="active">Add</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row" style="padding-top:20px">
        <!-- left column -->
        <div class="col-md-6" style="padding-top:10px">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Add Administrator') ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
              <div class="box-body">
                <div class="form-group">
                     <?= $this->Form->create($administrator) ?>
                    <fieldset>
                        <?php
                            echo $this->Form->control('name', ['label'=>'Name']);
                            echo $this->Form->control('email', ['label'=>'Email (Username)']);
                            echo $this->Form->control('password', ['label'=>'Password']);
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
                            
                            <div class="col-md-12">  
                                <abbr title="Abort changes">
                                    <?= $this->Form->postLink(__("<button type='button' class='btn btn-success btn-block'><i class='fa fa-undo'></i></button>"), ['controller'=>'Administrators', 'action' => 'index'],  ['escape' => false, 'style' => 'color:#fff']) 
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
                        <li><b>Name:</b> Administrator's name;</li>
                        <li><b>Email:</b>Email, used as username to log in</li>
                        <li><b>Password:</b> Administrator's password</li>          
                        
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

