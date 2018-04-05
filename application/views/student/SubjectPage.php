<?php $session = $_SESSION['user']; ?>

<div class="alert alert-primary text-center" role="alert">
<?php $assign_id = $this->uri->segment(3); $subject_id = $this->db->get_where('ums_assign_subject_teacher',['id'=>$assign_id])->row()->subject_id; ?>
    <h4 class="alert-heading">Subject Name: <?php $subject = $this->db->get_where('ums_subject',['id'=>$subject_id])->result_array(); echo $subject[0]['name'].' | Code: '.$subject[0]['subject_code']; ?></h4>
    <h5>Teacher: <?php $teacher_id = $this->db->get_where('ums_assign_subject_teacher',['id'=>$assign_id])->row()->teacher_id; ?>
        <a href="<?php echo base('student','teacher_profile').'/'.$teacher_id;?>"><?php echo $this->db->get_where('ums_teacher',['id'=>$teacher_id])->row()->name;?></a>
    </h5>
</div>

<?php echo $output ; ?>
 
<br>
<div class="alert alert-primary text-center" role="alert">
    <h4 class="alert-heading"><?php echo $subject[0]['name']; ?> Attendance</h4>
</div>

<div class="table-responsive">
    <table class="table table-striped" id="tbl">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
        </tr>
        
    <?php 
    $where = ['shift_id'=>$session['shift_id'],
                'dept_id'=>$session['dept_id'],
                    'batch_id'=>$session['batch_id'],
                        'semester_id'=>$session['semester_id'],
                            'student_id'=>$session['id']];
    $attendances = $this->db->get_where('ums_attendance',$where)->result_array(); 
    if(!empty($attendances)): 
        foreach($attendances as $k=>$attendance):
    ?>
        <tr>
            <td><?php echo $k + 1; ?></td>
            <td><?php echo $attendance['status']==1?'<div style="color: green !important; font-weight: bold;">Present</div>':'<div style="color: red !important; font-weight: bold;">Absent</div>'; ?></td>
            <td><?php echo date('l-d-F-Y',strtotime($attendance['created_at'])); ?></td>
        </tr>
        <?php endforeach; else:?>
            <tr>
                <td colspan="3" class="text-center">No Record Found</td>
            </tr>
        <?php endif; ?>

    </table>
</div>

