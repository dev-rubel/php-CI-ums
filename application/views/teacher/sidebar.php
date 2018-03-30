<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a class="<?php echo $title=='Dashboard'?'active':''; ?>" href="<?php echo base_url(); ?>"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Notices'?'active':''; ?>" href="<?php echo base('teacher','notice_page'); ?>"><i class="fa fa-fw fa-flag-checkered"></i><span> Notices </span> </a>
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
                            <li class="breadcrumb-item"><?php echo $_SESSION['user_type'] ?></li>
                            <li class="breadcrumb-item active"><?php echo $this->db->get_where('ums_'.$_SESSION['user_type'],['id'=>$_SESSION['user']['id']])->row()->name; ?></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>