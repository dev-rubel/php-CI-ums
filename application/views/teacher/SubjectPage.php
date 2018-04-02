<?php if(!empty($css_files)): foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; endif;?>

   <div class="alert alert-primary text-center" role="alert">
    <?php $subject_id = $this->uri->segment(4); ?>
        <h4 class="alert-heading">Subject Name: <?php $subject = $this->db->get_where('ums_subject',['id'=>$subject_id])->result_array(); echo $subject[0]['name'].' | Code: '.$subject[0]['subject_code']; ?></h4>
    </div>

    <?php echo $output ; ?>
   
<?php if(!empty($js_files)): foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; endif;?>



<?php $list = $this->uri->segment(5);
if($list == 'success' || $list == ''):
?>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>

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
        <table class="table table-striped" id="tbl">
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
            foreach($students as $k=>$student):
        ?>
            <input type="hidden" name="std_id[]" value="<?php echo $student['id'];?>" />
            <input type="hidden" name="subject_id" value="<?php echo $subject_id;?>" />
            <tr class="<?php echo $student['status'] != 2?'inactive-student':''; ?>">
                <td><input type="checkbox" checked data-toggle="toggle" data-on="Present" data-off="Absent" data-onstyle="success" data-offstyle="danger" name="status[]" value="<?php echo $student['id'];?>"></td>
                <td scope="row"><?php echo $student['roll']; ?></td>
                <td><?php echo $student['name']; ?></td>
                <td><?php echo $student['address']; ?></td>
                <td><?php if($student['cr']){
                    echo 'CR-'.$student['phone'];
                } else {
                    echo 'Student';
                } ?></td>
                <td><?php echo $student['email']; ?></td>
                <td><?php echo $this->db->get_where('ums_attendance',['batch_id'=>$batch_id,'subject_id'=>$subject_id,'student_id'=>$student['id'],'status'=>1])->num_rows(); ?></td>
            </tr>
            <?php endforeach; ?>

        </table>
    </div>

    <div class="row">
        <div class="col-md-4 mx-auto text-center">
            <input type="submit" class="btn btn-info btn-sm" id="tblSubmit" value="Submit" />
        </div>
    </div>
</form>

<?php endif; ?>

<script>
$('#stdAtt').ajaxForm({
    beforeSend: function() {
        $('#tblSubmit').val('Sending...');
    },
    success: function (data) {
        var jData = JSON.parse(data);
        if(!jData.type) {
            console.log(jData.msg);
        } else {
            console.log(jData.msg);
        }
        $('#tblSubmit').val('Submit');
    }
});
jQuery(function () {
    show_hide_column(0,false);
    $('#tblSubmit').hide();
    $('#check').change(function () {
        if(this.checked) {
            show_hide_column(0,true);
            $('#tblSubmit').show();            
        } else {
            $('#tblSubmit').hide();
            show_hide_column(0,false);            
        }
    }); //to set the initial state

    function show_hide_column(col_no, do_show) {
        var tbl = document.getElementById('tbl');
        var rows = tbl.getElementsByTagName('tr');

        for (var row = 0; row < rows.length; row++) {
            var cols = rows[row].children;
            if (col_no >= 0 && col_no < cols.length) {
                var cell = cols[col_no];
                if (cell.tagName == 'TD' || cell.tagName == 'TH') cell.style.display = do_show ? 'block' : 'none';
            }
        }
    }
});


</script>

