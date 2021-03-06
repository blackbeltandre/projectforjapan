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
  <?php foreach ($single_portfolio as $portfolio) ?>             
      <form data-validate="parsley" action="<?php echo site_url('backend/portfolio/update_portfolio');?>/<?php echo $portfolio["id_portfolio"]; ?>" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="panel panel-info" id="demo">
                      <div class="panel-heading">
                          <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Portfolio</h3>
                              <div class="panel-toolbar text-right">
                                </div>
                                   </div>
                                      <div class="panel-toolbar text-left"></div>
                                        <div class="btn-group"></div>
                                         <div class="col-sm-6">
                                       <div class="form-group ">
                                      <label>Category Portfolio</label><input type="hidden" name="id_portfolio" value="<?php echo set_value('id_portfolio'); ?>"/>
                                  <select name="id_category_portfolio" class="form-control">
                                   <?php foreach($get_category_portfolio as $list_category_portfolio){ ?>
                                              <option value="<?php echo $list_category_portfolio["id_category_portfolio"]; ?>">
                                              <?php echo $list_category_portfolio["category"]; ?></option><?php } ?></select><?php echo form_error('id_category_portfolio'); ?></div></div>
                                               
                                         <div class="col-sm-6">
                                           <div class="form-group">
                                          <label>Title</label>
                                          <input type="text" class="form-control" data-required="true" name="title" value="<?php echo $portfolio["title"]; ?>"/>
                                        <?php echo form_error('title'); ?></div></div>
                                     
                                         <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>Foto</label>
                                          <input type="file" class="form-control" data-required="true" name="foto" value="<?php echo set_value('foto'); ?>">                        
                                         <?php if($portfolio["foto"] != null){
                                          echo $portfolio["foto"];
                                          echo "&nbsp;&nbsp;<img height='70' width='70' src='".base_url('assets/foto/'.$portfolio['foto'])."' > "; 
                                          ?><?php } elseif($portfolio["foto"] == null){
                                          echo "Foto Belum Diupload";
                                          echo "&nbsp;&nbsp;<img height='70' width='70' src='".base_url('assets/foto/foto.jpg')."' > "; 
                                             } ?></div></div> 

                                           </br></br></br></br></br> </br></br></br></br>
                                             <div class="col-sm-12">
                                       <div class="form-group">
                                     <label>Description</label>
                                   <textarea class="ckeditor" rows="10" cols="30"  name="description" value="<?php echo set_value('description'); ?>"><?php echo $portfolio["description"]; ?></textarea>
                                  <?php echo form_error('description'); ?></div></div>
                               
                                      
                                        
                              <footer class="panel-footer text-right bg-light lter">
                          <button type="submit" class="btn btn-success btn-s-xs">SAVE</button>
                        <button type="reset" class="btn btn-danger">RESET</button></footer>
                        </br><p align="right"> <a class="btn btn-info" href="<?php echo base_url(); ?>backend/portfolio/cek" class="btn btn-danger">Lihat Daftar</a>&nbsp;&nbsp;&nbsp;&nbsp;
                      </p>
                    </section>
                </form>
            </div>
      </div>
</div>
<script>
    $(document).ready(function(){
      $.post('<?php echo base_url(); ?>backend/portfolio/index',$("#validate").serialize(),function(data){});
      setInterval(function(){       
        $.post('<?php echo base_url(); ?>backend/portfolio/index',$("#validate").serialize(),function(data){});
      },1000);
      
      $("#btnbrowse").click(function(){
        window.KCFinder = {
          callBack: function(url) {
            $('#header_post').val(url);
            window.KCFinder = null;         
          }
        };
        window.open('<?php echo base_url(); ?>assets/portfolio/js/kcfinder/browse.php?type=images', 'kcfinder_textbox',
          'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
          'resizable=1, scrollbars=0, width=800, height=600'
        );
        return false;
      });
    });
        var ckeditor = CKEDITOR.replace('ckeditor',{
      height:'600px',
      filebrowserBrowseUrl : '<?php echo base_url(); ?>assets/portfolio/js/kcfinder/browse.php?type=files',
      filebrowserImageBrowseUrl : '<?php echo base_url(); ?>assets/portfolio/js/kcfinder/browse.php?type=images',
      filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>assets/portfolio/js/kcfinder/browse.php?type=flash',
      filebrowserUploadUrl : '<?php echo base_url(); ?>assets/portfolio/js/kcfinder/upload.php?type=files',
      filebrowserImageUploadUrl : '<?php echo base_url(); ?>assets/portfolio/js/kcfinder/upload.php?type=images',
      filebrowserFlashUploadUrl : '<?php echo base_url(); ?>assets/portfolio/js/kcfinder/upload.php?type=flash'   
    });
        CKEDITOR.disableAutoInline = true;
        CKEDITOR.inline('editable');    
    </script>                            
                                
    <div class="dialog" id="source" style="display: none;" title="Source"></div>    
    
</body>
</html>                