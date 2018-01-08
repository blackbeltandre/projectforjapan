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
  <?php foreach ($single_pages as $pages) ?>             
      <form data-validate="parsley" action="<?php echo site_url('backend/pages/update_pages');?>/<?php echo $pages["id"]; ?>" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="panel panel-info" id="demo">
                      <div class="panel-heading">
                          <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Page Description</h3>
                              <div class="panel-toolbar text-right">
                                </div>
                                   </div>
                                      <div class="panel-toolbar text-left">
                                        <div class="btn-group">
                                         <div class="col-sm-6">
                                          <div class="form-group ">
                                            <label>Pages</label><input type="hidden" name="id" value="<?php echo $pages["id"]; ?>"/>
                                             <select name="id_page" class="form-control">
                                             <?php foreach($page as $page){ ?>
                                              <option value="<?php echo $page["id_page"]; ?>">
                                              <?php echo $page["page"]; ?></option><?php } ?></select><?php echo form_error('id_page'); ?></div></div>
                                            
                                         <div class="col-sm-6">
                                           <div class="form-group">
                                          <label>Title</label>
                                          <input type="text" class="form-control" data-required="true" name="title" value="<?php echo $pages["title"]; ?>"/>
                                        <?php echo form_error('title'); ?></div></div>
                                     
                                         <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>Foto</label>
                                          <input type="file" class="form-control" data-required="true" name="foto" value="<?php echo set_value('foto'); ?>">                        
                                         <?php if($pages["foto"] != null){
                                          echo $pages["foto"];
                                          echo "&nbsp;&nbsp;<img height='70' width='70' src='".base_url('assets/foto/'.$pages['foto'])."' > "; 
                                          ?><?php } elseif($pages["foto"] == null){
                                          echo "Foto Belum Diupload";
                                          echo "&nbsp;&nbsp;<img height='70' width='70' src='".base_url('assets/foto/foto.jpg')."' > "; 
                                             } ?></div></div> 

                                            <div class="col-sm-12">
                                       <div class="form-group">
                                     <label>Description</label>
                                   <textarea class="ckeditor" rows="10" cols="30"  name="description" value="<?php echo set_value('description'); ?>"><?php echo $pages["description"]; ?></textarea>
                                  <?php echo form_error('description'); ?></div></div></div></div>
                               
                                      
                                        
                              <footer class="panel-footer text-right bg-light lter">
                          <button type="submit" class="btn btn-success btn-s-xs">SAVE</button>
                        <button type="reset" class="btn btn-danger">RESET</button></footer>
                        </br><p align="right"> <a class="btn btn-info" href="<?php echo base_url(); ?>backend/pages/cek" class="btn btn-danger">Lihat Daftar</a>&nbsp;&nbsp;&nbsp;&nbsp;
                      </p>
                    </section>
                </form>
            </div>
      </div>
</div>
<script>
    $(document).ready(function(){
      $.post('<?php echo base_url(); ?>backend/pages/index',$("#validate").serialize(),function(data){});
      setInterval(function(){       
        $.post('<?php echo base_url(); ?>backend/pages/index',$("#validate").serialize(),function(data){});
      },1000);
      
      $("#btnbrowse").click(function(){
        window.KCFinder = {
          callBack: function(url) {
            $('#header_post').val(url);
            window.KCFinder = null;         
          }
        };
        window.open('<?php echo base_url(); ?>assets/pages/js/kcfinder/browse.php?type=images', 'kcfinder_textbox',
          'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
          'resizable=1, scrollbars=0, width=800, height=600'
        );
        return false;
      });
    });
        var ckeditor = CKEDITOR.replace('ckeditor',{
      height:'600px',
      filebrowserBrowseUrl : '<?php echo base_url(); ?>assets/pages/js/kcfinder/browse.php?type=files',
      filebrowserImageBrowseUrl : '<?php echo base_url(); ?>assets/pages/js/kcfinder/browse.php?type=images',
      filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>assets/pages/js/kcfinder/browse.php?type=flash',
      filebrowserUploadUrl : '<?php echo base_url(); ?>assets/pages/js/kcfinder/upload.php?type=files',
      filebrowserImageUploadUrl : '<?php echo base_url(); ?>assets/pages/js/kcfinder/upload.php?type=images',
      filebrowserFlashUploadUrl : '<?php echo base_url(); ?>assets/pages/js/kcfinder/upload.php?type=flash'   
    });
        CKEDITOR.disableAutoInline = true;
        CKEDITOR.inline('editable');    
    </script>                            
                                
    <div class="dialog" id="source" style="display: none;" title="Source"></div>    
    
</body>
</html>                