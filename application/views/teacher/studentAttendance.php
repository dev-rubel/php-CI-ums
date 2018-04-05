<div class="alert alert-primary text-center" role="alert">
    <h5 class="alert-heading">Subject Name: <?php $subject = $this->db->get_where('ums_subject',['id'=>$subject_id])->result_array(); echo $subject[0]['name'].' | Code: '.$subject[0]['subject_code'].' | '.'Attendance Report'; ?></h5>
</div>
<div class="alert alert-primary text-center" role="alert">
    <h6 class="alert-heading"><?php $info = $this->db->get_where('ums_student',['id'=>$student_id])->result_array();  
        echo 'Student Name: '.$info[0]['name'];
        echo ' | Roll: '.$info[0]['roll'];
        echo ' | Reg: '.$info[0]['registration_no'];
    ?></h6>
</div>
<div class="table-responsive">
    <table class="table table-striped" id="tbl">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
        </tr>
    <?php 
    $where = ['shift_id'=>$shift_id,
                'dept_id'=>$dept_id,
                    'batch_id'=>$batch_id,
                        'student_id'=>$student_id];
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