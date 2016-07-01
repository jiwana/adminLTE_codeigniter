<?php

?>
<ul class="sidebar-menu">
    <li class="header">LABELS</li>
    <li>
        <a href="<?php echo  site_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="#" target="_blank">
            <i class="fa fa-globe"></i>
            <span>View Webs</span>
        </a>
    </li>
    <li class="header">MENU</li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Post Images / Video</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo  site_url('post') ?>"><i class="fa fa-circle-o"></i> Data Post </a></li>
            <li><a href="<?php echo  site_url('post/add') ?>"><i class="fa fa-circle-o"></i> Tambah Post </a></li>
        </ul>
    </li>
</ul>