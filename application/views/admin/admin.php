<?php if(!empty($css_files)): foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; endif;?>

    <!-- end row -->
    <div class="alert alert-primary text-center" role="alert">
        <h4 class="alert-heading">Admin Manage Section</h4>
    </div>

    <?php echo $output ; ?>
            
<?php if(!empty($js_files)): foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; endif;?>