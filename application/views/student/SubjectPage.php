<?php if(!empty($css_files)): foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; endif;?>

   <div class="alert alert-primary text-center" role="alert">
    <?php $assign_id = $this->uri->segment(3); $subject_id = $this->db->get_where('ums_assign_subject_teacher',['id'=>$assign_id])->row()->subject_id; ?>
        <h4 class="alert-heading">Subject Name: <?php $subject = $this->db->get_where('ums_subject',['id'=>$subject_id])->result_array(); echo $subject[0]['name'].' | Code: '.$subject[0]['subject_code']; ?></h4>
        <h5>Teacher: <?php $teacher_id = $this->db->get_where('ums_assign_subject_teacher',['id'=>$assign_id])->row()->teacher_id; ?>
         <a href="<?php echo base('student','teacher_profile').'/'.$teacher_id;?>"><?php echo $this->db->get_where('ums_teacher',['id'=>$teacher_id])->row()->name;?></a>
        </h5>
    </div>

    <?php echo $output ; ?>
   
<?php if(!empty($js_files)): foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; endif;?>

