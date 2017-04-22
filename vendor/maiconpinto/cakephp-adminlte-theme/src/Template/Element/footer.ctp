<?php
$file = $theme['folder'] . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'footer.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong><a href="https://github.com/emanuelepaiano/espresso-portal">Espresso Admin</a> - </strong> PHP Backend for Espresso Captive Portal - Distribuited under GPL terms
</footer>
<?php } ?>
