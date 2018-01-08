<div class="row">                  
      <form data-validate="parsley" action="<?php echo base_url(); ?>backend/webmaster/proses" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="panel panel-info" id="demo">
                      <div class="panel-heading">
                          <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Users</h3>
                              <div class="panel-toolbar text-right">
                                 
                                </div>
                            </div>
                            <div class="panel-toolbar text-left">
                                  <div class="btn-group">
                                       <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>Username</label><input type="hidden" name="id" value="<?php echo set_value('id'); ?>"/>
                                  <input type="text" class="form-control" data-required="true" name="username" value="<?php echo set_value('username'); ?>">                        
                                <?php echo form_error('username'); ?></div></div>

                                 <div class="col-sm-6"><div class="form-group">
                                   <label>Password</label>
                                    <input type="password" class="form-control" data-required="true" name="password" value="<?php echo set_value('password'); ?>">                         
                                  <?php echo form_error('password'); ?></div></div>

                              <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Level Login</label>
                                    <select name="level_login"  class="form-control" value="<?php echo set_value('level_login'); ?>">
                                    <option value="">PILIH</option>
                                    <option value="1">ADMINISTRATOR</option>
                                   <!--  <option value="2">WEBMASTER</option>
                                  <option value="3">USER</option> -->
                               </select><?php echo form_error('level_login'); ?></div></div>

                                 <div class="col-sm-6"><div class="form-group">
                                 <label>Nama</label>
                                  <input type="text" class="form-control" data-required="true" name="nama" value="<?php echo set_value('nama'); ?>">                         
                                  <?php echo form_error('nama'); ?></div></div>

                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                         <input type='radio' name="status" placeholder="status" value="1" >
                                        Aktif
                                         <input type='radio' name="status" placeholder="status" value="0" >
                                       Tidak Aktif
                                  <?php echo form_error('status'); ?></div></div>
                                  <div class="col-sm-6"><div class="form-group">
                                        <label>Foto</label>
                                         <input type="file" class="form-control" name="foto" size="10px">
                                  </div></div>
                              </div>
                            <footer class="panel-footer text-right bg-light lter">
                          <input type="submit" class="btn btn-success btn-s-xs" value="SAVE">
                        <button type="reset" class="btn btn-danger">RESET</button>&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-info" href="<?php echo base_url(); ?>backend/webmaster/cek" class="btn btn-danger">Lihat Daftar</a>&nbsp;&nbsp;&nbsp;&nbsp;
                      </footer>
                    </section>
                </form>
           </div>
      </div>
</div>
</div></div>