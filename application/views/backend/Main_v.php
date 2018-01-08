<!DOCTYPE html>
<html lang="en">
<head>
    <title>ZONA ADMINISTRATOR</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/foto/index.png">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>path/images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>path/images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>path/images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/animate.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/all.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/main.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/pace.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/jquery.news-ticker.css">

<script src="<?php echo base_url('assets/theme');?>/js/jquery.min.js"></script>
</head>
<body>
    <div>
        <!--BEGIN THEME SETTING-->
      
        </div>
        <!--END THEME SETTING-->
        <!--BEGIN BACK TO TOP-->
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <!--END BACK TO TOP-->
        <!--BEGIN TOPBAR-->
        <div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="<?php echo base_url("backend/kontent"); ?>" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text"><font size="3">ZONA ADMINISTRATOR</font></span><span style="display: none" class="logo-text-icon">µ</span></a></div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                
                
              
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                  <font color="white"><?php echo date("d/m/Y h:i:s"); ?></font>
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="<?php echo base_url("assets/foto"); ?>/<?php echo $pengguna->foto; ?>" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs"><?php echo  $pengguna->nama; ?></span>&nbsp;</a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                         
                            <li><a href="<?php echo base_url('backend/login/logout'); ?>" onClick="return confirm('Apakah anda ingin keluar dari aplikasi ?');"><i class="fa fa-key"></i>Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
          
        </div>
        <!--END TOPBAR-->
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    
                     <div class="clearfix"></div>
                    <li class="active"><a href="<?php echo base_url("backend/kontent"); ?>"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Dashboard</span></a></li>
                    <li><a href="<?php echo base_url("backend/page"); ?>"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Main Page</span></a>
                       
                    </li>
                    <li><a href="<?php echo base_url("backend/pages"); ?>"><i class="fa fa-send-o fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">Page Description</span></a>
                       
                    </li>
                    <li><a href="<?php echo base_url("backend/category"); ?>"><i class="fa fa-edit fa-fw">
                        <div class="icon-bg bg-violet"></div>
                    </i><span class="menu-title">Category Article</span></a>
                      
                    </li>
                    <li><a href="<?php echo base_url("backend/article"); ?>"><i class="fa fa-th-list fa-fw">
                        <div class="icon-bg bg-blue"></div>
                    </i><span class="menu-title">Article's</span></a>
                          
                    </li>
                    <li><a href="<?php echo base_url("backend/webmaster"); ?>"><i class="fa fa-user fa-fw">
                        <div class="icon-bg bg-red"></div>
                    </i><span class="menu-title">User</span></a>
                      
                    </li>
                    <li><a href="<?php echo base_url("backend/slide"); ?>"><i class="fa fa-file-o fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Slide</span></a>
                       
                    </li>
                    <li><a href="<?php echo base_url("backend/faq"); ?>"><i class="fa fa-database fa-fw">
                        <div class="icon-bg bg-grey"></div>
                    </i><span class="menu-title">Faq</span></a>
                      
                    </li>
                     <li><a href="<?php echo base_url("backend/category_gallery"); ?>"><i class="fa fa-sitemap fa-fw">
                        <div class="icon-bg bg-dark"></div>
                    </i><span class="menu-title">Category Gallery</span></a>
                      
                    </li>
                    <li><a href="<?php echo base_url("backend/gallery"); ?>"><i class="fa fa-envelope-o">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Gallery</span></a>
                      
                    </li>
                     <li><a href="<?php echo base_url("backend/category_portfolio"); ?>"><i class="fa fa-users">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Category Portfolio</span></a>
                      
                    </li>
                     <li><a href="<?php echo base_url("backend/portfolio"); ?>"><i class="fa fa-pencil">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Portfolio</span></a>
                      
                    </li>
                      <li><a href="<?php echo base_url("welcome"); ?>" target="_blank"><i class="fa fa-globe">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">BUKA WEBSITE</span></a>
                      
                    </li>

                    <!--
                    <li><a href="Charts.html"><i class="fa fa-bar-chart-o fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Charts</span></a>
                       
                    </li> -->
                    <li><a href="<?php echo base_url('backend/login/logout'); ?>" onClick="return confirm('Apakah anda ingin keluar dari aplikasi ?');">
                        <i class="fa fa-slack fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">Keluar</span></a></li>
                </ul>
            </div>
        </nav>
            <!--END SIDEBAR MENU-->
            <!--BEGIN CHAT FORM-->
            
            <!--END CHAT FORM-->
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Dashboard</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="<?php echo base_url("backend/kontent"); ?>">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Dashboard</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="page-content"> 
                    <?php $this->load->view($main); ?>
                     </div>
                    </div>
                 </div>
                       
                <!--END CONTENT-->
                <!--BEGIN FOOTER-->
                <div id="footer">
                    <div class="copyright">
                        <a href="#"><?php echo date("Y"); ?> © I-Tech Dev .All right reserved.</a></div>
                </div>
                <!--END FOOTER-->
            </div>
            <!--END PAGE WRAPPER-->
        </div>
    </div>
      <script src="<?php echo base_url(); ?>path/script/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>path/script/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>path/script/bootstrap-hover-dropdown.js"></script>
    <script src="<?php echo base_url(); ?>path/script/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>path/script/respond.min.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery.cookie.js"></script>
    <script src="<?php echo base_url(); ?>path/script/icheck.min.js"></script>
    <script src="<?php echo base_url(); ?>path/script/custom.min.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery.news-ticker.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery.menu.js"></script>
    <script src="<?php echo base_url(); ?>path/script/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>path/script/holder.js"></script>
    <script src="<?php echo base_url(); ?>path/script/responsive-tabs.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery.flot.tooltip.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery.flot.fillbetween.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url(); ?>path/script/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url(); ?>path/script/zabuto_calendar.min.js"></script>
    <script src="<?php echo base_url(); ?>path/script/index.js"></script>
    <!--LOADING SCRIPTS FOR CHARTS-->
    <script src="<?php echo base_url(); ?>path/script/highcharts.js"></script>
    <script src="<?php echo base_url(); ?>path/script/data.js"></script>
    <script src="<?php echo base_url(); ?>path/script/drilldown.js"></script>
    <script src="<?php echo base_url(); ?>path/script/exporting.js"></script>
    <script src="<?php echo base_url(); ?>path/script/highcharts-more.js"></script>
    <script src="<?php echo base_url(); ?>path/script/charts-highchart-pie.js"></script>
    <script src="<?php echo base_url(); ?>path/script/charts-highchart-more.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="<?php echo base_url(); ?>path/script/main.js"></script>
    <script>        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-145464-12', 'auto');
        ga('send', 'pageview');


</script>
</body>
</html>
