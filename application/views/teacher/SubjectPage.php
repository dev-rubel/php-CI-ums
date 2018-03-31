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
<br><br>
<div class="alert alert-primary text-center" role="alert">
<?php $batch_id = $this->uri->segment(3); ?>
    <h4 class="alert-heading"><?php echo $this->db->get_where('ums_batch',['id'=>$batch_id])->row()->name; ?> Batch Students</h4>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Roll</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Represent</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
  <?php $students = $this->db->get_where('ums_student',['batch_id'=>$batch_id])->result_array(); 
    foreach($students as $k=>$student):
  ?>
    <tr>
      <th scope="row"><?php echo $student['roll']; ?></th>
      <td><?php echo $student['name']; ?></td>
      <td><?php echo $student['address']; ?></td>
      <td><?php if($student['cr']){
          echo 'CR-'.$student['phone'];
      } else {
          echo 'Student';
      } ?></td>
      <td><?php echo $student['email']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php endif; ?>

