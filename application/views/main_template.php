<section id="daftar" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- <div class="col-md-12 col-sm-12 wow bounceIn">
				<div class="section-title">
					<h2></h2>
					<p>Anda pemilik produk yang tertarik untuk berpromosi secara optimal dengan biaya yang efisien, silahkan klik disini.</p>
				</div>
			</div> -->

			<!-- Testimonial Owl Carousel section
			================================================== -->
			<div id="owl-speakers" class="owl-carousel">
 			<?php if(empty($all_article)){ 
                                    echo '<section id="blog" class="container">
                              <div class="row">
                              </br>
                                  <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <i class="fa fa-ban-circle"></i><strong><p align="center"><strong>DATA BELUM ADA</strong></p></strong> 
                                     </div>
                              </div>
                          </section>';
                            ?>
                        <?php 
                             }
                             else{
                              ?>  <?php foreach($all_article as $all_article){  ?>
				<p align="center">
					<!-- <div class="item wow fadeInUp col-md-12 col-sm-6" data-wow-delay="0.9s"> -->
					<div class="wow fadeInUp  col-sm-12 col-xs-12" data-wow-delay="0.3s">
			
					<div class="speakers-wrapper">
						<img src="<?php echo base_url(); ?>assets/foto/<?php echo $all_article["foto"]; ?>" class="img-responsive" alt="speakers">
							<div class="speakers-thumb">
								<h3><strong><?php echo $all_article["title"]; ?></strong></h3>
								<h6><font color="white"><?php echo $all_article["description"]; ?></font></h6>
								 <a class="btn btn-lg btn-warning smoothScroll wow fadeInUp" data-wow-delay="2.3s" href="<?php echo base_url(); ?>welcome/push/<?php echo $all_article['id_article']; ?>">DAFTAR <?php echo $all_article["title"]; ?></a>
								
							</div>
					</div>

				</div>
				<?php  } ?><?php } ?>
			</p>
			</div>

		</div>
	</div>
</section>
<section id="daftar" class="parallax-section">
	<div class="container">
		<div class="row">
<div class="wow bounceIn col-md-12 col-sm-12">
				<div class="section-title">
					<h2>Mengapa Memilih Kami ?</h2>
				</div>
			</div>
 			 <?php
                                foreach($page as $page){
                                 ?>
			<div class="wow fadeInUp col-md-4 col-sm-6 col-xs-6" data-wow-delay="0.3s">
					<i class="fa fa-group"></i><p><strong><?php echo $page["title"]; ?>.</strong></p>
					<font color="white"><?php echo $page["description"]; ?>	</font>
			</div>
			 <?php } ?>
			</div></div>
</section>
<!-- =========================
    DETAIL SECTION   
============================== -->
<section id="blog" class="parallax-section">
	<div class="container" background-color="#fff">
		<div class="row">

			<div class="wow fadeInLeft col-md-6 col-sm-6" data-wow-delay="0.3s">
				<h3><font color="white">BLOG ACCESSTRADE</font></h3>
				<p><font color="white">Halaman berita, acara kegiatan, ulasan produk dan informasi terkait bisnis afiliasi lainnya.</br></br>
				<button class="btn btn-lg btn-default smoothScroll wow fadeInUp" data-wow-delay="2.3s">KUNJUNGI BLOG</button></font></p>
			</div>

		

			<div class="wow fadeInRight col-md-6 col-sm-6" data-wow-delay="0.9s">
				<h3><font color="white">ACCESSTRADE ACADEMY</font></h3>
				<p><font color="white">Halaman panduan, informasi dan tos mengenai penggunaan sistem afiliasi ACCESSTRADE.
				</br></br>
				<button class="btn btn-lg btn-default smoothScroll wow fadeInUp" data-wow-delay="2.3s">COMING SOON</button></font></p>
			</div>
		</div>
	</div>
</section>
<section class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="wow fadeInRight col-md-12 col-sm-12" data-wow-delay="0.9s">
				<center>
				<h3><font color="black">Bergabunglah Bersama Kami </br> Dan Dapatkan keuntungannya</font></h3>
				</br>
				<button href="#daftar" class="btn btn-lg btn-warning smoothScroll wow fadeInUp" data-wow-delay="2.3s">GABUNG ACCESSTRADE</button>	
				</p></center>
			</div>
		</div>
	</div>
</section>
</hr>
<!-- =========================
    SPONSORS SECTION   
============================== -->
<section id="partnert" class="parallax-section">
	<div class="container">
		<div class="row">
<div class="wow bounceIn col-md-12 col-sm-12">
				<div class="section-title">
					<h2>PARTNER KAMI</h2>
				</div>
			</div>
 			<?php foreach($partner as $data){  ?>
			<div class="wow fadeInUp col-md-3 col-sm-6 col-xs-6" data-wow-delay="0.3s">
				<img src="<?php echo base_url(); ?>assets/foto/<?php echo $data["foto"]; ?>" class="img-responsive" alt="<?php echo $data["foto"]; ?>">	
			</div>
			<?php } ?>
			
			<div class="wow fadeInUp  col-md-8 col-sm-12" data-wow-delay="0.6s">
				<div class="contact_des">
					<h2>Lokasi Kami</h2>
					 <div class="google-map">
					 	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d495.78059789283947!2d106.827487!3d-6.231427!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2abde10c53337a20!2sMenara+Anugrah!5e0!3m2!1sen!2sid!4v1514918200107" width="700" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
				</div>
			</div>

			<div class="wow fadeInUp  col-md-4 col-sm-12" data-wow-delay="0.9s">
				<div class="contact_detail">
					<div class="section-title">
						<h2>Hubungi Kami</h2>
					</div>
					<!-- <p align="center">Kantor Taman E3.3 Unit C-6, 5th Floor
						Jl. Dr. Ide Anak Agung Gde Agung
						Lot 8.6-8.7. Kawasan Mega Kuningan
						Jakarta Selatan 12950. Indonesia
						+62 21 5790 1762
						info@accesstrade.co.id
						interspace.co.id</p> -->
					</br>  <?php echo $this->session->flashdata('message'); ?> 
					   <form  action="<?php echo site_url("welcome/commit#partnert");  ?>" method="post" entype="multipart/form-data" role="form">
                   					  <?php echo form_error('name'); ?>
						<input name="name" type="text" class="form-control" id="name" placeholder="Name">
						</br>
					  	 <?php echo form_error('email'); ?><input name="email" type="email" class="form-control" id="email" placeholder="Email">
					  	</br>
					  	<textarea name="message" rows="5" class="form-control" id="message" placeholder="Message"></textarea>
					  	</br>
							<input name="submit" type="submit" class="form-control" id="submit" value="SEND">
					  <?php echo form_error('message'); ?> </form>
				</div>
			</div>
		</div>
	</div>
</hr>
</section></hr>