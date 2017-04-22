<?php
$file = $theme['folder'] . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'nav-top.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            
           
            <!-- Control Sidebar Toggle Button -->
            <li>
                <!--<a href="/logout" data-toggle="control-sidebar"><i class="fa fa-power-off"></i></a>-->
                <a href="/administrators/logout"><i class="fa fa-power-off"></i></a>
            </li>
        </ul>
    </div>
</nav>
<?php } ?>
