<?php
$file = $theme['folder'] . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'form.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>

<?php } ?>
