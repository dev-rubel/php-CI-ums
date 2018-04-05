     <!-- BR FOR MOBILE VIEW -->
    <br><br> 
     <!-- end row -->
        </div>
        <!-- END container-fluid -->
    </div>
    <!-- END content -->
</div>
<footer class="footer text-center">
    <span class="text-center">
        Copyright <a target="_blank" href="#">Dhaka International University</a> (beta-0.9.0)
    </span>
</footer>
</div>

    
    <?php if(!empty($js_files)): foreach($js_files as $file): ?>
<script src="<?php echo $file; ?>"></script>
    <?php endforeach; endif;?>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="<?php echo base_url();?>assets/js/modernizr.min.js"></script>
    <?php if(empty($output)): ?>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <?php endif; ?>
<script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/detect.js"></script>
    <script src="<?php echo base_url();?>assets/js/fastclick.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.blockUI.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js"></script>
    <!-- App js -->
    <script src="<?php echo base_url();?>assets/js/pikeadmin.js"></script>
    <!-- BEGIN Java Script for this page -->
    <!-- Counter-Up-->
    <script src="<?php echo base_url();?>assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/counterup/jquery.counterup.min.js"></script>
    
    <script>
    
        $(document).ready(function() {
            // counter-up
            $('.counter').counterUp({
                delay: 10,
                time: 600
                });
        });
    </script>

    <script>
        $('#stdAtt').ajaxForm({
            beforeSend: function() {
                $('#tblStdAttSubmit').val('Sending...');
            },
            success: function (data) {
                var jData = JSON.parse(data);
                if(!jData.type) {
                    console.log(jData.msg);
                } else {
                    console.log(jData.msg);
                }
                $('#tblStdAttSubmit').val('Submit');
            }
        });
        jQuery(function () {
            show_hide_column(0,false);
            $('#tblStdAttSubmit').hide();
            $('#check').change(function () {
                if(this.checked) {
                    show_hide_column(0,true);
                    $('#tblStdAttSubmit').show();            
                } else {
                    $('#tblStdAttSubmit').hide();
                    show_hide_column(0,false);            
                }
            }); //to set the initial state

            function show_hide_column(col_no, do_show) {
                var tbl = document.getElementById('tblTeacherStudent');
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
    <!-- END Java Script for this page -->
    </body>
</html>