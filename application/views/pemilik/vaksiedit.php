<?php echo validation_errors();?>
<?php echo "<center>".$this->session->flashdata('msg')."</center>"; ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PA</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>asset/css/simple-sidebar.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="<?php echo base_url();?>asset/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript --> 
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
	

</head>
<div class="container">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <center><h3>Profil Anda</h3></center>
        <form action="<?php echo base_url('cpemilik/update'); ?>" method="post" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Nama:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo set_value('nama');?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo set_value('email');?>" >
            </div>
          </div>
         <div class="form-group">
            <label class="col-lg-3 control-label">Username:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo set_value('username');?>" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Password:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" name="password" value="<?php echo set_value('password');?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">No Telp:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value="<?php echo set_value('notelp');?>" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
             <input type="submit" class="btn btn-primary" name="btnupdate" value="Update">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
</div>
<?php $this->load->view('footer'); ?>