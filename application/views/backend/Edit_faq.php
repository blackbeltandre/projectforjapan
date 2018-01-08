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
    </head>
<body> 
<div class="row">    
  <?php foreach ($single_faq as $faq) ?>             
      <form data-validate="parsley" action="<?php echo site_url('backend/faq/update_faq');?>/<?php echo $faq["id_faq"]; ?>" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="panel panel-info" id="demo">
                      <div class="panel-heading">
                          <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Frequently Asked Question</h3>
                              <div class="panel-toolbar text-right">
                                </div>
                                   </div>
                                      <div class="panel-toolbar text-left">
                                        <div class="btn-group">
                                         
                                         <div class="col-sm-6">
                                           <div class="form-group">
                                          <label>Pengirim</label>
                                          <input type="text" class="form-control" data-required="true" name="name" value="<?php echo $faq["name"]; ?>"/>
                                        <?php echo form_error('name'); ?></div></div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Email</label>
                                              <input type="text" class="form-control" data-required="true" name="email" value="<?php echo $faq["email"]; ?>">                        
                                             <?php echo form_error('email'); ?></div></div>
                                        
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Moderator</label>
                                              <input type="text" class="form-control" data-required="true" name="author" value="<?php echo $faq["author"]; ?>">                        
                                             <?php echo form_error('author'); ?></div></div>
                                       
                                        
                                           <?php if($faq["status"] == 1){
                                          echo' <div class="col-sm-6"><div class="form-group">
                                        <label>Status</label></br>';
                                          echo "<td><span>  
                                         <input type='radio' name='status' value='1' checked='checked>
                                         <label value='1'>&nbsp;&nbsp;Publish</label>   
                                         </span></td></br><td><span>  
                                         <input type='radio' name='status' value='0' >
                                         <label value='0'>&nbsp;&nbsp;Draft</label>   
                                         </span></td><?php echo form_error('status'); ?></div></div>"; ?>
                                        <?php 
                                        } 
                                        elseif($faq["status"] == 0)
                                          {
                                             echo' <div class="col-sm-6"><div class="form-group">
                                        <label>Status</label></br>';
                                          echo "<td><span>  
                                         <input type='radio' name='status' value='1' >
                                         <label value='1'>&nbsp;&nbsp;Publish</label>   
                                         </span></td></br><td><span>  
                                         <input type='radio' name='status' value='0' checked='checked >
                                         <label value='0'>&nbsp;&nbsp;Draft</label>   
                                        </span></td><?php echo form_error('status'); ?></div></div>"; 
                                          }
                                          ?> <div class="col-sm-12">
                                       <div class="form-group"> 
                                        <label>Komentar</label>
                                     <textarea class="form-control" name="message" data-required="true" rows="6" value="<?php echo $faq["message"]; ?>"><?php echo $faq["message"]; ?></textarea>
                                        </div></div> </div> 
                                        <div class="col-sm-12">
                                       <div class="form-group">
                                     <label>Replay</label>
                                   <textarea class="ckeditor" rows="10" cols="30"  name="message_replay" value="<?php echo set_value('message_replay'); ?>"><?php echo $faq["message_replay"]; ?></textarea>
                                  <?php echo form_error('message_replay'); ?></div></div>
                              
                                    

                                         
                                       
                              <footer class="panel-footer text-right bg-light lter">
                          <button type="submit" class="btn btn-success btn-s-xs">SAVE</button>
                        <button type="reset" class="btn btn-danger">RESET</button></footer>
                        </br><p align="right"> <a class="btn btn-info" href="<?php echo base_url(); ?>backend/faq" class="btn btn-danger">Lihat Daftar</a>&nbsp;&nbsp;&nbsp;&nbsp;
                      </p>
                    </section>
                </form>
            </div>
      </div>
</div>
<script>
    $(document).ready(function(){
      $.post('<?php echo base_url(); ?>backend/faq/index',$("#validate").serialize(),function(data){});
      setInterval(function(){       
        $.post('<?php echo base_url(); ?>backend/faq/index',$("#validate").serialize(),function(data){});
      },1000);
      
      $("#btnbrowse").click(function(){
        window.KCFinder = {
          callBack: function(url) {
            $('#header_post').val(url);
            window.KCFinder = null;         
          }
        };
        window.open('<?php echo base_url(); ?>assets/faq/js/kcfinder/browse.php?type=images', 'kcfinder_textbox',
          'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
          'resizable=1, scrollbars=0, width=800, height=600'
        );
        return false;
      });
    });
        var ckeditor = CKEDITOR.replace('ckeditor',{
      height:'600px',
      filebrowserBrowseUrl : '<?php echo base_url(); ?>assets/faq/js/kcfinder/browse.php?type=files',
      filebrowserImageBrowseUrl : '<?php echo base_url(); ?>assets/faq/js/kcfinder/browse.php?type=images',
      filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>assets/faq/js/kcfinder/browse.php?type=flash',
      filebrowserUploadUrl : '<?php echo base_url(); ?>assets/faq/js/kcfinder/upload.php?type=files',
      filebrowserImageUploadUrl : '<?php echo base_url(); ?>assets/faq/js/kcfinder/upload.php?type=images',
      filebrowserFlashUploadUrl : '<?php echo base_url(); ?>assets/faq/js/kcfinder/upload.php?type=flash'   
    });
        CKEDITOR.disableAutoInline = true;
        CKEDITOR.inline('editable');    
    </script>                            
                                
    <div class="dialog" id="source" style="display: none;" title="Source"></div>    
    
</body>
</html>                