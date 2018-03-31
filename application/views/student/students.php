<?php if(!empty($css_files)): foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; endif;?>

    <div class="alert alert-primary text-center" role="alert">
        <h4 class="alert-heading"><?php echo $this->db->get_where('ums_batch',['id'=>$_SESSION['user']['batch_id']])->row()->name; ?> Batch Students</h4>
    </div>

    <?php echo $output ; ?>
   
<?php if(!empty($js_files)): foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; endif;?>
