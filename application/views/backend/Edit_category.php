<div class="row">                  
  <?php foreach ($single_category as $category) ?>
      <form data-validate="parsley" action="<?php echo base_url(); ?>backend/category/update_category/<?php echo $category->id_category; ?>" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="panel panel-info" id="demo">
                      <div class="panel-heading">
                          <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> category</h3>
                              <div class="panel-toolbar text-right">
                                 
                                </div>
                            </div>
                            <div class="panel-toolbar text-left"></div>
                                  <div class="btn-group"></div>
                                       <div class="col-sm-6"><?php foreach ($single_category as $category): ?>
                                       <div class="form-group">
                                      <label>category</label><input type="hidden" name="id_category" value="<?php echo set_value('id_category'); ?>"/>
                                  <input type="text" class="form-control" data-required="true" name="category" value="<?php echo $category->category; ?>">                        
                                <?php echo form_error('category'); ?></div></div>
                                 </br></br></br></br></br>
                            <footer class="panel-footer text-right bg-light lter">
                          <input type="submit" class="btn btn-success btn-s-xs" value="SAVE">
                        <button type="reset" class="btn btn-danger">RESET</button>&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-info" href="<?php echo base_url(); ?>backend/category/cek" class="btn btn-danger">Lihat Daftar</a>&nbsp;&nbsp;&nbsp;&nbsp;
                      </footer>
                    </section>
                </form>
           </div>
      </div><?php endforeach; ?>
</div>
                