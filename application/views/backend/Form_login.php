<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/animate.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/all.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/main.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>path/styles/style-responsive.css">
</head>
<body style="background: url('<?php echo base_url(); ?>path/images/bg/bg.png') center center fixed;">
    <div class="page-form">
        <div class="panel panel-blue">
            <div class="panel-body pan">
                <form action="<?php echo base_url(); ?>backend/login/login_form" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-body pal">
                    <div class="col-md-12 text-center">
                        <h1 style="margin-top: -90px; font-size: 48px;">
                            Administrator Area</h1>
                        <br />
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <img src="<?php echo base_url(); ?>path/images/avatar/profile-pic.png" class="img-responsive" style="margin-top: -35px;" />
                        </div>
                        <div class="col-md-9 text-center">
                            
                            <br />
                            <p>
                                Please login first !</p>
                            </br>
                            <?php echo $this->session->flashdata('message');?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-md-3 control-label">
                            Username:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="username" name="username" type="text" placeholder="Username" value="<?php echo set_value('username'); ?>" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-md-3 control-label">
                            Password:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-lock"></i>
                                <input id="password" name="password" type="password" placeholder="Password" value="<?php echo set_value('password'); ?>" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="form-group mbn">
                        <div class="col-lg-12" align="right">
                            <div class="form-group mbn">
                                <div class="col-lg-3">
                                    &nbsp;
                                </div>
                                <div class="col-lg-9">
                                    <a href="<?php echo base_url(); ?>" class="btn btn-default">Kembali ke home.</a>&nbsp;&nbsp;
                                    <input type="submit" class="btn btn-default" value="Login">
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <p>
               
            </p>
        </div>
    </div>
</body>
</html>
