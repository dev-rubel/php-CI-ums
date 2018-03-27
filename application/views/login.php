<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <base href="<?php echo base_url();?>">
        <title>Dhaka International University | System Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="assets/login/css/login.css" rel="stylesheet" />
        <script src="assets/login/js/modernizr.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" />
        <link rel="shortcut icon" href="assets/images/favicon.png">
    </head>
    <body class="eternity-form">
        <section class="colorBg1 colorBg" id="demo1" data-panel="first">
            <div class=" container">

                
                <div class="login-form-section">
                    <?php if (!empty(validation_errors())) : ?>
                        <div class="login-form-links link1 ">
                            <h4 class="blue text-center"><?= validation_errors() ?></h4>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($error)) : ?>                    
                        <div class="login-form-links link1 ">
                            <h4 class="blue text-center"><?= $error ?></h4>
                        </div>
                    <?php endif; ?>
                    <div class="login-form-links link1 ">
                        <h3 class="text-center">Dhaka International University</h3>
                        <h4 class="blue text-center">UMS System Login</h4>
                    </div>
                    <form action="<?php echo base_url(); ?>login" method="post">
                        <div class="login-content ">
                            <div class="textbox-wrap">
                                <div class="input-group">
                                    <span class="input-group-addon "><i class="icon-user icon-color"></i></span>
                                    <input type="text" name="username" class="form-control" placeholder="Username" autofocus/>
                                </div>
                            </div>
                            <div class="textbox-wrap">
                                <div class="input-group">
                                    <span class="input-group-addon "><i class="icon-key icon-color"></i></span>
                                    <input type="password" name="password" class="form-control " placeholder="Password" />
                                </div>
                            </div>
                            <div class="login-form-action clearfix">
                                <button type="submit" class="btn btn-success pull-right green-btn">LogIn &nbsp; <i class="icon-chevron-right"></i></button>
                            </div>
                            
                        </div>
                        <div class="login-form-links link1 ">
                            <div class="form-group">
                                <label>Please select usertype</label>
                                <select class="form-control" name="user_type">
                                    <option value="admin">Admin</option>
                                    <option value="depertment">Depertment</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                    <option value="accountant">Accountant</option>
                                    <option value="librarian">Librarian</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script src="assets/login/js/jquery-1.9.1.js"></script>
        <script src="assets/login/js/bootstrap.js"></script>
        <script src="assets/login/js/respond.src.js"></script>
        <script src="assets/login/js/jquery.icheck.js"></script>
        <script src="assets/login/js/placeholders.min.js"></script>
        <script src="assets/login/js/waypoints.min.js"></script>
        <script src="assets/login/js/jquery.panelSnap.js"></script>
        <script type="text/javascript">
        $(function() {
        $("input").iCheck({
        checkboxClass: 'icheckbox_square-blue',
        increaseArea: '20%' // optional
        });
        $(".dark input").iCheck({
        checkboxClass: 'icheckbox_polaris',
        increaseArea: '20%' // optional
        });
        $(".form-control").focus(function() {
        $(this).closest(".textbox-wrap").addClass("focused");
        }).blur(function() {
        $(this).closest(".textbox-wrap").removeClass("focused");
        });
        //On Scroll Animations
        if ($(window).width() >= 968 && !Modernizr.touch && Modernizr.cssanimations) {
        $("body").addClass("scroll-animations-activated");
        $('[data-animation-delay]').each(function() {
        var animationDelay = $(this).data("animation-delay");
        $(this).css({
        "-webkit-animation-delay": animationDelay,
        "-moz-animation-delay": animationDelay,
        "-o-animation-delay": animationDelay,
        "-ms-animation-delay": animationDelay,
        "animation-delay": animationDelay
        });
        });
        $('[data-animation]').waypoint(function(direction) {
        if (direction == "down") {
        $(this).addClass("animated " + $(this).data("animation"));
        }
        }, {
        offset: '90%'
        }).waypoint(function(direction) {
        if (direction == "up") {
        $(this).removeClass("animated " + $(this).data("animation"));
        }
        }, {
        offset: $(window).height() + 1
        });
        }
        //End On Scroll Animations
        $(".main-nav a[href]").click(function() {
        var scrollElm = $(this).attr("href");
        $("html,body").animate({
        scrollTop: $(scrollElm).offset().top
        }, 500);
        $(".main-nav a[href]").removeClass("active");
        $(this).addClass("active");
        });
        if ($(window).width() > 1000 && !Modernizr.touch) {
        var options = {
        $menu: ".main-nav",
        menuSelector: 'a',
        panelSelector: 'section',
        namespace: '.panelSnap',
        onSnapStart: function() {},
        onSnapFinish: function($target) {
        $target.find('input:first').focus();
        },
        directionThreshold: 50,
        slideSpeed: 200
        };
        $('body').panelSnap(options);
        }
        $(".colorBg a[href]").click(function() {
        var scrollElm = $(this).attr("href");
        $("html,body").animate({
        scrollTop: $(scrollElm).offset().top
        }, 500);
        return false;
        });
        });
        </script>
    </body>
</html>