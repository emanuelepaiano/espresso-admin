<?php
$file = $theme['folder'] . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<ul class="sidebar-menu">
    <li class="header">FRONTEND</li>
    
    <li><a href="<?php echo $this->Url->build('/sessions'); ?>"><i class="fa fa-mobile"></i> <span>Sessions</span></a></li>
    
    <li class="treeview">
        <a href="#">
            <i class="fa fa-user"></i>
            <span>Accounts</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/users'); ?>"><i class="fa  fa-bars"></i> Users list</a></li>
            <li><a href="<?php echo $this->Url->build('/users/add'); ?>"><i class="fa  fa-plus-square-o"></i> New user</a></li>
        </ul>
    </li>
    
    <li class="treeview">
        <a href="#">
            <i class="fa fa-users"></i>
            <span>Groups</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/groups'); ?>"><i class="fa  fa-bars"></i> Groups list</a></li>
            <li><a href="<?php echo $this->Url->build('/groups/add'); ?>"><i class="fa  fa-plus-square-o"></i> New group</a></li>
        </ul>
    </li>
    
    
    <li class="header">BACKEND</li>
    <li><a href="<?php echo $this->Url->build('/'); ?>"><i class="fa fa-dashboard"></i> <span>Status</span></a></li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-lock"></i>
            <span>Administrators</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/administrators'); ?>"><i class="fa  fa-lock"></i>Administrators list</a></li>
            <li><a href="<?php echo $this->Url->build('/administrators/add'); ?>"><i class="fa  fa-plus"></i>Add administrators</a></li>
            
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-wifi"></i>
            <span>Wifi tools</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/pages/wifiqr'); ?>"><i class="fa  fa-qrcode"></i>QR Generator</a></li>
            
        </ul>
    </li>
    
    <li class="header">PROFILE</li>
    
    <li><a href="<?php echo $this->Url->build('/administrators/logout'); ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
</ul>
<?php } ?>
