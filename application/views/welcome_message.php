<!DOCTYPE html>
<html lang="en">
<head>
<!--
New Event
http://www.templatemo.com/tm-486-new-event
-->
<title>ACCESSTRADE Indonesia</title>
<meta name="description" content="">
<meta name="author" content="">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/foto/index.png">
<!-- Main css -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
 <link href="<?=base_url('twd-theme/videojs/video-js.css');?>" rel="stylesheet">
    <script src="<?=base_url('twd-theme/videojs/video.js');?>"></script>

<!-- Google Font -->
<link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">

<!-- =========================
     PRE LOADER       
============================== -->
<div class="preloader">

	<div class="sk-rotating-plane"></div>

</div>


<!-- =========================
     NAVIGATION LINKS     
============================== -->
<div class="navbar navbar-fixed-top custom-navbar" role="navigation">
	<div class="container">

		<!-- navbar header -->
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="<?php echo base_url(); ?>" class="navbar-brand"><img src="<?php echo base_url("assets/foto/logonew.png");?>" width="100" height="50"> </a>
		</div>

		<div class="collapse navbar-collapse">

			<ul class="nav navbar-nav navbar-right">
				<li><a href="#intro" class="smoothScroll"><strong><font color="white">BERANDA</font></strong></a></li>
				<li><a href="#daftar" class="smoothScroll"><strong><font color="white">DAFTAR</font></strong></a></li>
				<li><a href="#blog" class="smoothScroll"><strong><font color="white">BLOG</font></strong></a></li>
				<li><a href="#partnert" class="smoothScroll"><strong><font color="white">PARTNER</font></strong></a></li>
				<li><a  href="#" data-toggle="modal" data-target="#myModal" class="smoothScroll"><strong><font color="white">LOGIN</font></strong></a></li>
			</ul>

		</div>

	</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" background="gray">Login</h4>
      </div>
        <p><div class="login-clean" class="col-md-6 col-sm-6">
					<form action="<?php echo base_url(); ?>backend/login/login_form" method="post" enctype="multipart/form-data" class="form-horizontal">
              							 <?php echo $this->session->flashdata('message');?>
							<div class="col-md-6 col-sm-6"><strong>Username</strong></br>
							</div>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="text" name="username" id="uname" value="<?php echo set_value('username'); ?>" placeholder="Username" required>
							</div></br>
							<div class="col-md-6 col-sm-6"><strong>Password</strong></br>
							</div></br>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="password" name="password" id="passwd" value="<?php echo set_value('password'); ?>" placeholder="Password" required>
							</div>
								</br>
							<div class="form-group "></br></br></br>
								<center> <input type="submit" class="btn btn-success" value="Login"> &nbsp;&nbsp;  <button type="reset" class="btn btn-info">Reset</button>&nbsp;&nbsp;  <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button></center>
							</div>
							<!-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#facebookModal"><font size="1">Facebook</font></a>&nbsp;<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#googleModal"><font size="1">Google</font></a>
							&nbsp;<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#linkedModal"><font size="1">Linked</font></a>
							&nbsp; -->
							<!--<a href="<?php echo base_url().'login/forgot';?>" class="forgot">Forgot your password?</a>-->
							<!-- <a href="<?php echo base_url().'login/register';?>"><div class="publicreg">For Public,<br/>Register here</div></a>
							<a href="<?php echo base_url().'login/referralreg';?>"><div class="referralreg">For Referral,<br/>Register here</div></a> -->
						</form>
		    </p>
      </div>
      <div class="modal-footer"><p align="right">
      </p>
      </div>
    </div>
</div>
  </div>
</div>

<!-- =========================
    INTRO SECTION   
============================== -->
<section id="intro" class="parallax-section">
	<div class="container">
		<div class="row">
 
    <div id="myCarousel" class="carousel slide" style="position: relative;width: 100%; height: 360px; overflow: hidden;" data-ride="carousel">
    <!-- Starting Indicators -->
	    <ol class="carousel-indicators">
	    	 <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	       <?php foreach($slider as $sliders){ ?>
	      <li data-target="#myCarousel" data-slide-to="<?php echo $sliders["id"]; ?>"></li>
	     
	       <?php } ?>
	        <p><strong><font color="white" size="4"><?php echo $sliders["title"]; ?> </font></strong></p>
				<p class="wow fadeInUp" data-wow-delay="1.6s"><font color="white" size="2"><?php echo $sliders["description"]; ?></font></p>
				
				<a class="btn btn-lg btn-warning smoothScroll wow fadeInUp" data-wow-delay="2.3s" href="#daftar">Mulai Sekarang</a>
	    </ol>
	<!-- End indticators -->

    <!-- load image's on div slide by slide -->
    	<div class="carousel-inner">
	      <div class="item active">

	        <img src="<?php echo base_url(); ?>assets/images/overview-img.jpg" alt="Los Angeles" style="width:100%;">
	      </div>
	<?php foreach($slider as $slider){ ?>
	      <div class="item">
	        <img src="<?php echo base_url(); ?>assets/foto/<?php echo $slider["foto"]; ?>" alt="Chicago" style="width:100%;">
	      </div>
	    <?php } ?>
  	  </div>
    <!-- end of slide -->

    	<!-- control slide for left nd right button -->
	    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right"></span>
	      <span class="sr-only">Next</span>
	    </a>
	  </div>
	<hr>
	</div>
	</div>
</section>


<!-- =========================
    OVERVIEW SECTION   
============================== -->
<section id="intro" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.9s">
				  <?php foreach($video as $video){ ?>
				   <video id="video1" class="video-js vjs-default-skin" width="400" height="300" poster="<?php echo base_url(); ?>assets/foto/header_logo.png" 
                            data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
                             <source src="<?php echo base_url(); ?>assets/files/<?php echo $video["file"];?>" type="video/x-flv">
                            <source src="<?php echo base_url(); ?>assets/files/<?php echo $video["file"];?>" type='video/mp4'>
                        </video>
                       <!--  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/2aW9_uMwJDo" width="400" height="300" allowfullscreen></iframe>
                         --><!-- 
				<img src="<?php echo base_url(); ?>assets/images/overview-img.jpg" class="img-responsive" alt="Overview"> -->
			</div>
			<div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.6s">
				<h3><?php echo $video["title"];?></h3>
				<p><?php echo $video["description"];?></p>
			</div>
			<?php }?>
		</div>
	</div>
</section>

 <?php $this->load->view($main_template); ?>
<!-- =========================
    SPEAKERS SECTION   
============================== -->

<!-- =========================
    CONTACT SECTION   
============================== -->

<!-- =========================
    FOOTER SECTION   
============================== -->
<footer>
	<div class="container">
		<div class="row">
 <div class="col-md-4 col-sm-6">
                    <h4><strong>Sitemap</strong></h4>
                  			<center><p><a href="#intro"><strong><font color="gray">BERANDA</font></strong></a></p></br>
				<p><a href="#daftar"><strong><font color="gray">DAFTAR</font></strong></a></p></br>
				<p><a href="#blog"><strong><font color="gray">BLOG</font></strong></a></p></br>
				<p><a href="#partnert" ><strong><font color="gray">PARTNER</font></strong></a></p></br>
				<p><a  href="#" data-toggle="modal" data-target="#myModal" ><strong><font color="gray">LOGIN</font></strong></a></p></br></center>
			
            </div> <div class="col-md-4 col-sm-6">
                    <h4><strong>Other Informations</strong></h4><font color="white">Kantor Taman E3.3 Unit C-6, 5th Floor Jl. Dr. Ide Anak Agung Gde Agung Lot 8.6-8.7. Kawasan Mega Kuningan Jakarta Selatan 12950. Indonesia +62 21 5790 1762 info@accesstrade.co.id interspace.co.id</font>
                  <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: 'c48f280a-fb71-454f-a330-0ec49d0e03d4', f: true }); done = true; } }; })();</script>
            </div> <div class="col-md-4 col-sm-6">
                    <h4><strong>Facebook Fanspage</strong></h4>
                   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-page" data-href="https://www.facebook.com/accesstradeID/" data-width="300" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
            </div>

			<div class="col-md-12 col-sm-12"></br> </br> </br>
				<p class="wow fadeInUp" data-wow-delay="0.6s"><strong>ACCESSTRADE <?php echo date("Y"); ?>  | Copyright &copy; 
                  				   by : <font color="gray"><i><u>I-Tech Dev</u></i></font></strong></p>
				<ul class="social-icon">
					<li><a href="#" class="fa fa-facebook wow fadeInUp" data-wow-delay="1s"></a></li>
					<li><a href="#" class="fa fa-twitter wow fadeInUp" data-wow-delay="1.3s"></a></li>
					<li><a href="#" class="fa fa-dribbble wow fadeInUp" data-wow-delay="1.6s"></a></li>
					<li><a href="#" class="fa fa-behance wow fadeInUp" data-wow-delay="1.9s"></a></li>
					<li><a href="#" class="fa fa-google-plus wow fadeInUp" data-wow-delay="2s"></a></li>
				</ul>

			</div>
			
		</div>
	</div>
</footer>


<!-- Back top -->
<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>


<!-- =========================
     SCRIPTS   
============================== -->
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.parallax.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/smoothscroll.js"></script>
<script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

</body>
</html>