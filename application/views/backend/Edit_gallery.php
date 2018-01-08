<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="author" content="Andre Marbun (tulisan-digital.com)">                 
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/artikel/js/plugins/cleditor/jquery.cleditor.js'></script>        
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/artikel/js/plugins/ckeditor/ckeditor.js'></script>    
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/artikel/js/plugins/select/select2.min.js"></script>
   <link href="<?=base_url('twd-theme/videojs/video-js.css');?>" rel="stylesheet">
    <script src="<?=base_url('twd-theme/videojs/video.js');?>"></script>
    <link rel="stylesheet" href="<?=base_url('twd-theme/style.css');?>">
    </head>
<body> 
<div class="row">    
  <?php foreach ($single_gallery as $gallery) ?>             
      <form data-validate="parsley" action="<?php echo site_url('backend/gallery/update_gallery');?>/<?php echo $gallery["id"]; ?>" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="panel panel-info" id="demo">
                      <div class="panel-heading">
                          <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Gallery</h3>
                              <div class="panel-toolbar text-right">
                                </div>
                                   </div>
                                   <div class="panel-toolbar text-left">
                                  <div class="btn-group">
                                     <div class="col-sm-6">
                                       <div class="form-group ">
                                      <label>Category</label>
                                      <input type="hidden" name="id" value="<?php echo set_value('id'); ?>"/>
                                  <select name="id_category_gallery" class="form-control">
                                   
                                    <option value="<?php echo $gallery["id_category_gallery"]; ?>">
                                      <?php echo $gallery["category"]; ?></option></select><?php echo form_error('id_category_gallery'); ?></div></div>
                                   <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>Author</label>
                                  <input type="text" class="form-control" data-required="true" name="author" placeholder="Author" value="<?php echo $gallery["author"]; ?>"/>
                                <?php echo form_error('author'); ?>
                              </div></div>
                                 <div class="col-sm-6"><div class="form-group">
                                        <label>Status</label></br>
                                         <?php if($gallery["status"] == 1){
                                          echo "<td><span>  
                                         <input type='radio' name='status' value='1' checked='checked'>
                                         <label value='1'>&nbsp;&nbsp;Publish</label>   
                                         </span></td></br><td><span>  
                                         <input type='radio' name='status' value='0' >
                                         <label value='0'>&nbsp;&nbsp;Draft</label>   
                                         </span></td></div></div>"; 
                                       }
                                         elseif($gallery["status"] == 0)
                                          {
                                          echo "<td><span>  
                                         <input type='radio' name='status' value='1' >
                                         <label value='1'>&nbsp;&nbsp;Publish</label>   
                                         </span></td></br><td><span>  
                                         <input type='radio' name='status' value='0' checked='checked' >
                                         <label value='0'>&nbsp;&nbsp;Draft</label>   
                                        </span></td></div></div>"; 
                                          }
                                          ?> 
                                                  </span></td><?php echo form_error('status'); ?>
                                         <div class="col-sm-6">
                                           <div class="form-group">
                                          <label>Title</label>
                                          <input type="text" class="form-control" data-required="true" name="title" value="<?php echo $gallery["title"]; ?>"/>
                                        <?php echo form_error('title'); ?></div></div>
                                     
                                         <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>File</label>
                                          <input type="file" class="form-control" data-required="true" name="file" value="<?php echo $gallery["file"]; ?>">                        
                                        
                                            <?php if($gallery["file"] == null){
                        echo "File Belum Diupload";
                      
                      ?>
                      
                      <?php 
                     }
                      elseif($gallery["category"] == 'Foto'){
                          echo '<p align="center"><img src="'.base_url().'assets/files/'.$gallery["file"].'" width="180" height="100" ></p>';
                        ?>
                      <?
                       }
                        elseif($gallery["category"] == 'Video' || $gallery["category"] == 'Audio' ){
                        ?> <?php echo $gallery["file"]; ?>
                         <video id="video1" class="video-js vjs-default-skin" width="180" height="100" poster="<?php echo base_url(); ?>site/img/logoheader.png"
                            data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
                             <source src="<?php echo base_url(); ?>assets/files/<?php echo $gallery["file"];?>" type="video/x-flv">
                            <source src="<?php echo base_url(); ?>assets/files/<?php echo $gallery["file"];?>" type='video/mp4'>
                        </video>

                        <?php
                        }
                      ?></div></div> 

                                             <div class="col-sm-12">
                                       <div class="form-group">
                                     <label>Description</label>
                                   <textarea class="ckeditor" rows="10" cols="30"  name="description" value="<?php echo set_value('description'); ?>"><?php echo $gallery["description"]; ?></textarea>
                                  <?php echo form_error('description'); ?></div></div></div>
                               
                                      
                                        
                              <footer class="panel-footer text-right bg-light lter">
                          <button type="submit" class="btn btn-success btn-s-xs">SAVE</button>
                        <button type="reset" class="btn btn-danger">RESET</button></footer>
                        </br><p align="right"> <a class="btn btn-info" href="<?php echo base_url(); ?>backend/gallery/cek" class="btn btn-danger">Lihat Daftar</a>&nbsp;&nbsp;&nbsp;&nbsp;
                      </p>
                    </section>
                </form>
            </div>
      </div></div>
</div>
<script>
    $(document).ready(function(){
      $.post('<?php echo base_url(); ?>backend/gallery/index',$("#validate").serialize(),function(data){});
      setInterval(function(){       
        $.post('<?php echo base_url(); ?>backend/gallery/index',$("#validate").serialize(),function(data){});
      },1000);
      
      $("#btnbrowse").click(function(){
        window.KCFinder = {
          callBack: function(url) {
            $('#header_post').val(url);
            window.KCFinder = null;         
          }
        };
        window.open('<?php echo base_url(); ?>assets/gallery/js/kcfinder/browse.php?type=images', 'kcfinder_textbox',
          'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
          'resizable=1, scrollbars=0, width=800, height=600'
        );
        return false;
      });
    });
        var ckeditor = CKEDITOR.replace('ckeditor',{
      height:'600px',
      filebrowserBrowseUrl : '<?php echo base_url(); ?>assets/gallery/js/kcfinder/browse.php?type=files',
      filebrowserImageBrowseUrl : '<?php echo base_url(); ?>assets/gallery/js/kcfinder/browse.php?type=images',
      filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>assets/gallery/js/kcfinder/browse.php?type=flash',
      filebrowserUploadUrl : '<?php echo base_url(); ?>assets/gallery/js/kcfinder/upload.php?type=files',
      filebrowserImageUploadUrl : '<?php echo base_url(); ?>assets/gallery/js/kcfinder/upload.php?type=images',
      filebrowserFlashUploadUrl : '<?php echo base_url(); ?>assets/gallery/js/kcfinder/upload.php?type=flash'   
    });
        CKEDITOR.disableAutoInline = true;
        CKEDITOR.inline('editable');    
    </script>                            
                                
    <div class="dialog" id="source" style="display: none;" title="Source"></div>    
    
</body>
</html>                