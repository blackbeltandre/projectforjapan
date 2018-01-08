<div class="row">
      <?php foreach ($single_user as $user) ?>
          <form action="<?php echo site_url('backend/webmaster/update_user');?>/<?php echo $user->id; ?>" method="post" accept-charset="utf-8" role="form" enctype="multipart/form-data">
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
                                       <div class="form-group"><?php foreach ($single_user as $user): ?>
                                     <label>Username</label><input type="hidden" name="id" value="<?php echo set_value('id'); ?>"/>
                                   <input type="text" class="form-control" data-required="true" name="username" value="<?php echo $user->username; ?>">                        
                                <?php echo form_error('username'); ?></div></div>
                             <div class="col-sm-6"><div class="form-group">
                          <label>Password</label>
                      <input type="password" class="form-control" data-required="true" name="password" value="<?php echo $user->password; ?>">                         
                    <?php echo form_error('password'); ?></div></div>
                        <div class="col-sm-6"><div class="form-group">
                          <label>Level Login</label>
                          <?php if($user->level_login == 1){
                            echo '<select name="level_login" class="form-control">
                            <option value="1">Administrator</option>
                         
                            </select>';
                          }
                          elseif($user->level_login == 2){
                            echo '<select name="level_login" class="form-control">
                         
                            <option value="1">Administrator</option>
                            </select>';
                          }elseif($user->level_login == 3){
                            echo '<select name="level_login" class="form-control">
                          
                            <option value="2">Administrator</option>
                            </select>';
                          }
                          ?>
                           <?php echo form_error('level_login'); ?></div></div>
                              <div class="col-sm-6"><div class="form-group">
                                <label>Nama</label>
                                       <input type="text" class="form-control" data-required="true" name="nama" value="<?php echo $user->nama; ?>">                         
                                     <?php echo form_error('nama'); ?></div></div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>Foto</label>
                                          <input type="file" class="form-control" data-required="true" name="foto" value="<?php echo set_value('foto'); ?>">                        
                                         <?php if($user->foto != null){
                                          echo $user->foto;
                                          echo "&nbsp;&nbsp;<img height='70' width='70' src='".base_url('assets/foto/'.$user->foto)."' > "; 
                                          ?><?php } elseif($user->foto == null){
                                          echo "Foto Belum Diupload";
                                          echo "&nbsp;&nbsp;<img height='70' width='70' src='".base_url('assets/foto/foto.jpg')."' > "; 
                                             } ?></div></div>
                                    <div class="col-sm-6"><div class="form-group">
                                        <label>Status</label></br>
                                         <?php if($user->status == 1){
                                          echo "<td><span>  
                                         <input type='radio' name='status' value='1' checked='checked>
                                         <label value='1'>&nbsp;&nbsp;Aktif</label>   
                                         </span></td></br><td><span>  
                                         <input type='radio' name='status' value='0' >
                                         <label value='0'>&nbsp;&nbsp;Tidak Aktif</label>   
                                         </span></td><?php echo form_error('status'); ?></div></div>"; ?>
                                        <?php 
                                        } 
                                        elseif($user->status == 0)
                                          {
                                          echo "<td><span>  
                                         <input type='radio' name='status' value='1' >
                                         <label value='1'>&nbsp;&nbsp;Aktif</label>   
                                         </span></td></br><td><span>  
                                         <input type='radio' name='status' value='0' checked='checked >
                                         <label value='0'>&nbsp;&nbsp;Tidak Aktif</label>   
                                        </span></td><?php echo form_error('status'); ?></div></div>"; 
                                          }
                                          ?> 
                                                  </span></td><?php echo form_error('status'); ?>
                                             <div class="col-sm-12">
                                         <div class="col-sm-12">
                                      <div class="form-group">
                                 <footer class="panel-footer text-right bg-light lter">
                             <button type="submit" class="btn btn-success btn-s-xs">SAVE</button>
                           <button type="reset" class="btn btn-danger">RESET</button>&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-info" href="<?php echo base_url(); ?>backend/webmaster/cek" class="btn btn-danger">Kembali Ke Daftar</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </footer>
                    </section>
                  </form>
                </div>
            </div>
        </div>
<?php endforeach; ?>
</div></div></div></div></div></div>