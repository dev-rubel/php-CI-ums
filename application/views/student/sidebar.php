<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a class="<?php echo $title=='Dashboard'?'active':''; ?>" href="<?php echo base_url(); ?>"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                </li>                
                <li class="submenu">
                    <a class="<?php echo $title=='Students'?'active':''; ?>" href="<?php echo base('student','students_page'); ?>"><i class="fa fa-fw fa-user-circle"></i><span> Students </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Notices'?'active':''; ?>" href="<?php echo base('student','notice_page'); ?>"><i class="fa fa-fw fa-flag-checkered"></i><span> Notices </span> </a>
                </li>
                <li class="submenu">
                    <a class="<?php echo $title=='Batch Notices'?'active':''; ?>" href="<?php echo base('student','batch_notice_page'); ?>"><i class="fa fa-fw fa-flag-checkered"></i><span> Batch Notices </span> </a>
                </li>
                <li class="submenu">
                    <a href="#" class="<?php echo $title=='Subject Page'?'active':''; ?>"><i class="fa fa-fw fa-table"></i> <span> Subjects </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                    <?php $subjects = $this->db->get_where('ums_assign_subject_teacher',['dept_id'=>$_SESSION['user']['dept_id'],'batch_id'=>$_SESSION['user']['batch_id'],'semester_id'=>$_SESSION['user']['semester_id']])->result_array();
                        if(!empty($subjects)):
                        foreach($subjects as $k=>$subject):
                    ?>
                        <li><a href="<?php echo base('student','subject_page').'/'.$subject['id']; ?>"><?php $info = $this->db->get_where('ums_subject',['id'=>$subject['id']])->result_array(); echo $info[0]['subject_code'] ?></a></li>
                    <?php endforeach;else: ?>
                        <li><a href="#">No Subject Found</a></li>
                    <?php endif; ?>
                    </ul>
                </li>
                <?php if($_SESSION['user']['cr']): ?>
                    <li class="submenu">
                        <a class="<?php echo $title=='Report'?'active':''; ?>" href="<?php echo base('student','report'); ?>"><i class="fa fa-fw fa-flag-checkered"></i><span> Report </span> </a>
                    </li>
                <?php endif; ?>
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
                            <li class="breadcrumb-item"><?php echo $this->db->get_where('ums_shift',['id'=>$_SESSION['user']['shift_id']])->row()->name; ?></li>
                            <li class="breadcrumb-item"><?php echo $this->db->get_where('ums_dept_list',['id'=>$_SESSION['user']['dept_id']])->row()->name; ?></li>
                            <li class="breadcrumb-item"><?php echo $this->db->get_where('ums_batch',['id'=>$_SESSION['user']['batch_id']])->row()->name; ?></li>
                            <li class="breadcrumb-item">S-<?php echo $this->db->get_where('ums_semester',['id'=>$_SESSION['user']['semester_id']])->row()->name; ?></li>
                            <li class="breadcrumb-item active"><?php echo $this->db->get_where('ums_'.$_SESSION['user_type'],['id'=>$_SESSION['user']['id']])->row()->name; ?></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>