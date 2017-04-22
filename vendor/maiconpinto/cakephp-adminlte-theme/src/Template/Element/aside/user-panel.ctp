<?php
$file = $theme['folder'] . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'user-panel.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>

<!--<div class="user-panel">
     <div class="pull-left image">
         <img src="<?php echo $this->Url->image("small.png", ['width'=>55]);  ?>" border='0'>
    </div>
    <div class="pull-left info">
         <p>My Cafè name</p>
    </div>
</div>-->
<?php } ?>
