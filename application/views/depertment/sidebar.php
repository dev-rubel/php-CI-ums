<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a class="<?php echo $title=='Dashboard'?'active':''; ?>" href="<?php echo base_url(); ?>"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Teachers'?'active':''; ?>" href="<?php echo base('depertment','teachers_page'); ?>"><i class="fa fa-fw fa-user"></i><span> Teacher Manage </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Students'?'active':''; ?>" href="<?php echo base('depertment','students_page'); ?>"><i class="fa fa-fw fa-user-circle"></i><span> Student Manage </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Subjects'?'active':''; ?>" href="<?php echo base('depertment','subjects_page'); ?>"><i class="fa fa-bars"></i><span> Subject Manage </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Assign Subject'?'active':''; ?>" href="<?php echo base('depertment','assign_subject_page'); ?>"><i class="fa fa-plus"></i><span> Assign Subject </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Notices'?'active':''; ?>" href="<?php echo base('depertment','notice_page'); ?>"><i class="fa fa-fw fa-rss-square"></i><span> Notice Manage </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Teacher Report'?'active':''; ?>" href="<?php echo base('depertment','teacher_report'); ?>"><i class="fa fa-fw fa-flag-checkered"></i><span> Teacher Report </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Student Report'?'active':''; ?>" href="<?php echo base('depertment','student_report'); ?>"><i class="fa fa-fw fa-flag-checkered"></i><span> Student Report </span> </a>
                </li>
                <!-- <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-table"></i> <span> Settings </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="#">Profile Setting</a></li>
                        <li><a href="#">Change Password</a></li>
                    </ul>
                </li> -->
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
                            <li class="breadcrumb-item"><?php echo ucwords($_SESSION['user_type']); ?></li>
                            <li class="breadcrumb-item active"><?php $dept = $this->db->get_where('ums_'.$_SESSION['user_type'],['id'=>$_SESSION['user']['id']])->row()->name; echo strtoupper($dept);?></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>