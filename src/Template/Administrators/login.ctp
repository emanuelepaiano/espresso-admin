<?php $this->layout = 'AdminLTE.login'; ?>

<form action="<?php echo $this->Url->build(array('controller' => 'administrators', 'action' => 'login')); ?>" method="post">
  <div class="form-group has-feedback">
  <?= $this->Form->control('email', ['label' => 'Email', 'placeholder'=>"example@mydomain.com"]) ?>
  </div>
  <div class="form-group has-feedback">
   <?= $this->Form->control('password', ['label' => 'Password', 'placeholder'=>"my password"]) ?> 
  </div>
  <div class="row">
    <div class="col-xs-8">
      
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
    </div>
    <!-- /.col -->
  </div>
</form>


