<!DOCTYPE html>
<html>
<head>
<style type="text/css">

.copy_me{
  border:2px white dashed;
  padding:5px 10px 5px 10px;
  float:left;
  cursor:pointer;
  margin-right:3px;
  margin-bottom:3px;
}
.breaker{
  clear:both;
}

</style>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/source/path/js/jquery.min1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/source/path/js/ZeroClipboard.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  var client = new ZeroClipboard(document.getElementById('copy_me'));
    client.on("aftercopy", function(e) {
    alert('PARAMETER ID BERHASIL DICOPY ');
  });
});
</script>  

 <script type="text/javascript">
    $(document).ready(function() {
      $("input[name='checkAll']").click(function() {
        var checked = $(this).attr("checked");
        $("#myTable tr th input:checkbox").attr("checked", checked);
      });
    });
  </script>
<form action="<?php echo base_url(); ?>backend/pages/cek" method="post">

      <?php echo $this->session->flashdata('message'); ?>
         <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info" id="demo">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Page Description</h3>
                                <div class="panel-toolbar text-right">
                                   
                                </div>
                            </div>
                                <div class="panel-toolbar text-right">
                                    <div class="btn-group">
                                   <a type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="left" title="Add data?" href="<?php echo base_url('backend/pages');?>"><i class="icon ico-pencil"></i> Add Data ?</a>
                                </div>
                            </div>
                            <div class="table-responsive panel-collapse pull out">
                               <div class="col-md-4">
                                  <select class="form-control mt4" name="action">
                                     <option value="delete">MULTIPLE DELETE</option>
                                        </select></div>
                                    <input type="submit" id="selected" name="selected" class="btn btn-s-md btn-info" formaction="<?php echo base_url(); ?>backend/pages/delete_multiple" value="ACTION"><p align="right"></p>
       <!--<input type="submit" name="submit" formaction="<?php echo site_url('backend/label/edit_multiple'); ?>" formtarget="_blank" class="btn btn-s-md btn-info" value="MULTIPLE EDIT">
          <input type="submit" name="submit" formaction="<?php echo site_url('backend/label/export_to_pdf'); ?>" formtarget="_blank" class="btn btn-s-md btn-info" value="MULTIPLE GENERATE TO PDF">
            <input type="submit" name="submit" formaction="<?php echo site_url('backend/label/export_to_csv'); ?>"  formtarget="_blank"" class="btn btn-s-md btn-info" value="MULTIPLE GENERATE TO CSV">
               <a class="btn btn-sm btn-info" href="<?php echo site_url('backend/label/export_all_to_pdf'); ?>"target="_blank">GENERATE ALL TO PDF</a>&nbsp;&nbsp;&nbsp;             
                  <a class="btn btn-sm btn-info" href="<?php echo site_url('backend/label/export_all_to_csv'); ?>"target="_blank">GENERATE ALL TO CSV</a>&nbsp;&nbsp;&nbsp;             
                  <div class="col-sm-3 text-left">Cari Berdasarkan :
            <select class="input-sm form-control input-s-sm inline v-middle" id="jenis">
                 <option value="null">customradio1</option>
                  <option value="pages">label</option>
                  <option value="tags">TAGS</option>
                  <option value="label">label & TAGS</option>
                 </select></form></form></div><div class="col-sm-3">
            <form action="<?php echo base_url('backend/label/search_by_label');?>" method="post">    
            <font id="pages" class="drop-down-show-hide">
            <input type="text" class="input-sm form-control" placeholder="label" name="search">
               <span class="input-group-btn"><button class="btn btn-sm btn-info" type="submit">Go!</button>
                  </span>
                      </font>
                  </form>
                     <form action="<?php echo base_url('backend/label/search_by_tags');?>" method="post">    
               <font id="tags" class="drop-down-show-hide">
             <input type="text" class="input-sm form-control" placeholder="Tags" name="search">
                    <span class="input-group-btn"><button class="btn btn-sm btn-info" type="submit">Go!</button>
                      </span>
                </font>
                 </form>
              <form action="<?php echo base_url('backend/label/search_by_label_dan_tags');?>" method="post">   
                 <font  id="label" class="drop-down-show-hide">
                  <input type="text" class="col-sm-3 input-sm form-control" placeholder="label" name="search">
                    <input type="text" class="input-sm form-control" placeholder="Tags" name="search">
                  <span class="input-group-btn"><button class="btn btn-sm btn-info" type="submit">Go!</button>
             </span>
    </font>
</form> 
</div>
      <script type="text/javascript">    
           $('.drop-down-show-hide').hide();
              $('#jenis, #label').change(function(){
                   $(this).find('option').each(function(){
                     $('#'+$(this).val()).hide();
                     }
                   );
                  $('#' + this.value).show();
                 }
             )
          ;
       </script> -->
                           <script>
                                  jQuery(function ($) {
                           
                                      var $checks = $('input[name="selected[]"]');
                                      $("#selected").click(function () {
                                          if ($checks.filter(':checked').length == 0) {
                                              alert('DATA BELUM DIPILIH !');
                                              return false;
                                          }  else {
                                              return confirm('APAKAH DATA YANG DI CONTRENG SUDAH BENAR ???');
                                          }
                                      });
                                  }); 
                            </script>
                  <table class="table table-striped table-bordered table-hover" id="row-detail">
                    <thead>
                      <tr>
                        <th style="width:20px;"></th>
                        <th class="th-sortable" data-toggle="class" style="width:10%">No
                          <span class="th-sort">
                          </span>
                        </th>
                           <th class="th-sortable" data-toggle="class"  style="width:30%">Category<span class="th-sort">
                          </span></th>
                          <th class="th-sortable" data-toggle="class"  style="width:30%">Title<span class="th-sort">
                          </span></th>
                          <th class="th-sortable" data-toggle="class"  style="width:30%">Datepost<span class="th-sort">
                          </span></th>
                          <th class="th-sortable" data-toggle="class"  style="width:30%">Description<span class="th-sort">
                          </span></th>
                           <th class="th-sortable" data-toggle="class"  style="width:30%">Picture<span class="th-sort">
                          </span></th>
                        
                        <th  style="width:35%">Action</th>
                      </tr>
                    </thead>
                      <tbody>
                         <?php
                          $selected=1;
                                             
                    if(empty($pages))
                     {
                     echo " <div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <i class='fa fa-ban-circle'></i><strong><p align='center'>Xory gan ,datanya belum ane input :P</p></strong> 
                                      </div>"; }else
                     {

                         for ($i = 0; $i < count($pages); ++$i) {
                          ?>
                            <?php
                        if(isset($_POST['submit']))
                          {
                          if(!empty($_POST['selected'])) 
                            {  
                               $checked_count = count($_POST['selected']);
                                  foreach($_POST['selected'] as $selected) 
                                    {
                                    echo ""; 
                                   }
                                  echo " </br>";  }
                                  else
                                    {
                                   echo " <script>
                                       alert('CHECKBOX BELUM DICENTANG!');
                                     window.location = window.location.pathname;
                                </script>"; 
                               }
                            }
                       ?>
                     <tr>
                  <th>
               <input type="checkbox" name="selected[]" id="selected-<?php echo $selected; ?>" class="selected" value="<?php echo $pages[$i]["id"]; ?>" data-toggle="checkall" data-target="#table1">  
                   <th  style="width:10%"><?php echo ($page+$i+1); ?></th>
                       <th  style="width:30%"><?php echo $pages[$i]["page"]; ?></th>
                       <th  style="width:30%"><?php echo word_limiter($pages[$i]["title"],5); ?></th>
                       <th  style="width:30%"><?php echo $pages[$i]["date_post"]; ?></th>
                       <th  style="width:30%"><?php echo word_limiter($pages[$i]["description"], 10); ?></th>
                          <th  style="width:30%"><img src="<?php echo base_url();?>assets/foto/<?php echo $pages[$i]["foto"];?>" width="60" height="60" onError="this.onerror=null;this.src='<?php echo base_url();?>assets/foto/foto.jpg';" width="60" height="60" /></th>
                       <th  style="width:30%">   <a type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="left" title="Update data?" href="<?php echo base_url('backend/pages/edit_pages');?>/<?php echo $pages[$i]["id"] ?>">Update</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Data?" href="<?php echo base_url('backend/pages/delete');?>/<?php echo $pages[$i]["id"] ?>"onClick="return confirm('Anda Yakin Akan Menghapus Data Ini?');">Delete</a></th>
                   </tr> 
                   <?php
                    $selected++;
                       $selected = $selected++;
                       }
                    ?> 
                </tbody>
            </table>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-2">   
                  <span class="radio custom-radio custom-radio-primary">  
                      <input type='radio' id='customradio1' name="customradio1" onClick='for (i=1;i<<?php echo $selected; ?>;i++){document.getElementById("selected-"+i).checked=true;}'>
                          <label for="customradio1">&nbsp;&nbsp;Select All</label></span></div>
                               <div class="col-sm-2"><span class="radio custom-radio custom-radio-primary">  
                                    <input type='radio' id='nopilih' name="customradio1" onClick='for (i=1;i<<?php echo $selected; ?>;i++){document.getElementById("selected-"+i).checked=false;}'>
                                        <label for="nopilih">&nbsp;&nbsp;Cancel</label></span></div>
                                           <div class="col-sm-4 text-right text-center-xs">                
                                              <ul class="pagination pagination-sm m-t-none m-b-none">
                                        <?php echo $pagination; ?>
                                      </ul>
                                      </div>
                                  </div>
                               <?php 
                              }
                          ?>  
                  </footer>
            </div>
       </div>
</form>  
