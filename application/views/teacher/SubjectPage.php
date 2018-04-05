
<div class="alert alert-primary text-center" role="alert">
<?php $subject_id = $this->uri->segment(4); ?>
    <h4 class="alert-heading">Subject Name: <?php $subject = $this->db->get_where('ums_subject',['id'=>$subject_id])->result_array(); echo $subject[0]['name'].' | Code: '.$subject[0]['subject_code']; ?></h4>
</div>

<?php echo $output ; ?>
   
<?php $list = $this->uri->segment(5);
if($list == 'success' || $list == ''):
?>


<style>
    span.toggle-handle.btn.btn-default {
        background-color: #fff;
        border-color: #fff;
    }
    .inactive-student {
        background-color: lightsalmon;
    }
</style>

<br><br>
<div class="alert alert-primary text-center" role="alert">
<?php $batch_id = $this->uri->segment(3); ?>
    <h4 class="alert-heading"><?php echo $this->db->get_where('ums_batch',['id'=>$batch_id])->row()->name; ?> Batch Students</h4>
</div>
<div class="row">
    <div class="col-md-4 mx-auto text-center">
        <input type="checkbox" data-toggle="toggle" data-on="Present On" data-off="Present Off" data-onstyle="info" data-offstyle="danger" id="check"/>
    </div>
</div>
<br>
<!-- stdAtt -->
<form id="stdAtt" action="<?php echo base('teacher','student_attendance');?>" method="post">

    <div class="table-responsive">
        <table class="table table-striped" id="tblTeacherStudent">
            <tr>
                <th scope="col">Check</th>
                <th scope="col">Roll</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Represent</th>
                <th scope="col">Email</th>
                <th scope="col">Total Attend</th>
            </tr>
        <?php $students = $this->db->get_where('ums_student',['batch_id'=>$batch_id])->result_array(); 
        if(!empty($students)):
            foreach($students as $k=>$student):
        ?>
            <input type="hidden" name="std_id[]" value="<?php echo $student['id'];?>" />
            <input type="hidden" name="subject_id" value="<?php echo $subject_id;?>" />
            <tr class="<?php echo $student['status'] != 2?'inactive-student':''; ?>">
                <td><input type="checkbox" checked data-toggle="toggle" data-on="Present" data-off="Absent" data-onstyle="success" data-offstyle="danger" name="status[]" value="<?php echo $student['id'];?>"></td>
                <td><?php echo $student['roll']; ?></td>
                <td>
                <a href="<?php echo base('teacher','student_subject_attendance_report').'/'.$batch_id.'/'.$subject_id.'/'.$student['id'];?>" target="_blank">
                    <?php echo $student['name']; ?>
                </a>
                </td>
                <td><?php echo $student['address']; ?></td>
                <td><?php if($student['cr']){
                    echo 'CR-'.$student['phone'];
                } else {
                    echo 'Student';
                } ?></td>
                <td><?php echo $student['email']; ?></td>
                <td><?php echo $this->db->get_where('ums_attendance',['batch_id'=>$batch_id,'subject_id'=>$subject_id,'student_id'=>$student['id'],'status'=>1])->num_rows(); ?></td>
            </tr>
            <?php endforeach; else:?>
                <tr>
                    <td colspan="7" class="text-center">No Record Found</td>
                </tr>
            <?php endif; ?>

        </table>
    </div>

    <div class="row">
        <div class="col-md-4 mx-auto text-center">
            <input type="submit" class="btn btn-info btn-sm" id="tblStdAttSubmit" value="Submit" />
        </div>
    </div>
</form>

<?php endif; ?>

