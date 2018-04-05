<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a class="<?php echo $title=='Dashboard'?'active':''; ?>" href="<?php echo base_url(); ?>"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Teachers'?'active':''; ?>" href="<?php echo base('teacher','teachers_page'); ?>"><i class="fa fa-fw fa-user"></i><span> Teachers </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Notices'?'active':''; ?>" href="<?php echo base('teacher','notice_page'); ?>"><i class="fa fa-fw fa-flag-checkered"></i><span> Notices </span> </a>
                </li>
                <li class="submenu">
                    <a href="#" class="<?php echo $title=='Subject Page'?'active':''; ?>"><i class="fa fa-fw fa-table"></i> <span> Subjects </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                    <?php $subjects = $this->db->get_where('ums_assign_subject_teacher',['teacher_id'=>$_SESSION['user']['id']])->result_array();
                        if(!empty($subjects)):
                        foreach($subjects as $k=>$subject):
                    ?>
                        <li><a href="<?php echo base('teacher','subject_page').'/'.$subject['batch_id'].'/'.$subject['subject_id']; ?>"><?php $info = $this->db->get_where('ums_subject',['id'=>$subject['subject_id']])->result_array(); echo $info[0]['subject_code'] ?></a></li>
                    <?php endforeach;else: ?>
                        <li><a href="#">No Subject Found</a></li>
                    <?php endif; ?>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Report'?'active':''; ?>" href="<?php echo base('teacher','report'); ?>"><i class="fa fa-fw fa-flag-checkered"></i><span> Report </span> </a>
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
                            <li class="breadcrumb-item"><?php echo ucwords($_SESSION['user_type']); ?></li>
                            <li class="breadcrumb-item"><?php echo $this->db->get_where('ums_dept_list',['id'=>$_SESSION['user']['dept_id']])->row()->name; ?></li>
                            <li class="breadcrumb-item active"><?php echo $this->db->get_where('ums_'.$_SESSION['user_type'],['id'=>$_SESSION['user']['id']])->row()->name; ?></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>