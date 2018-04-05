<div class="alert alert-primary text-center" role="alert">
    <h4 class="alert-heading"><?php echo $this->db->get_where('ums_batch',['id'=>$_SESSION['user']['batch_id']])->row()->name; ?> Batch Students</h4>
</div>

<?php echo $output ; ?>
