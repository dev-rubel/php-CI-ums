<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a class="<?php echo $title=='Dashboard'?'active':''; ?>" href="<?php echo base_url(); ?>"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Teachers'?'active':''; ?>" href="<?php echo base('admin','teachers_page'); ?>"><i class="fa fa-black-tie"></i><span> Teacher Manage </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Students'?'active':''; ?>" href="<?php echo base('admin','students_page'); ?>"><i class="fa fa-user-circle"></i><span> Student Manage </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Depertment'?'active':''; ?>" href="<?php echo base('admin','depertments_page'); ?>"><i class="fa fa-align-justify"></i><span> Depertment Manage </span> </a>
                </li>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Depertment Account'?'active':''; ?>" href="<?php echo base('admin','depertments_account_page'); ?>"><i class="fa fa-align-justify"></i><span> Dept. Account Manage </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Subjects'?'active':''; ?>" href="<?php echo base('admin','subjects_page'); ?>"><i class="fa fa-bars"></i><span> Subjects Manage </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Batch'?'active':''; ?>" href="<?php echo base('admin','batchs_page'); ?>"><i class="fa fa-calendar"></i><span> Batch Manage </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Admins'?'active':''; ?>" href="<?php echo base('admin','admins_page'); ?>"><i class="fa fa-database"></i><span> Admin Manage </span> </a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-table"></i> <span> Settings </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="blank.html">Profile Setting</a></li>
                        <li><a href="blank.html">Change Password</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">University Management System (UMS)</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><?php echo $_SESSION['user_type'] ?></li>
                            <li class="breadcrumb-item active"><?php echo $this->db->get_where('ums_'.$_SESSION['user_type'],['id'=>$_SESSION['user']['id']])->row()->name; ?></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>