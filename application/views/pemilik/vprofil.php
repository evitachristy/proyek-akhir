<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CARKON</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>asset/css/simple-sidebar.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="<?php echo base_url();?>asset/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript --> 
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
  <!-- Bootstrap Core CSS -->
<link href="<?php echo base_url('asset/css/bootstrap.css');?>" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo base_url('asset/css/style.css'); ?>" rel='stylesheet' type='text/css' />
<!-- Metis Menu -->
<link href="<?php echo base_url('asset/css/custom.css'); ?>" rel="stylesheet">
<!--//Metis Menu -->
  

</head>
<div class="container">
    <h1>Profile</h1>
    <hr>
  
  <div style="margin-left:80px;" class="col-md-3 four-grid">
      <?=img([
      'src'   => 'uploads/' . $foto->image,
      'style'   => 'max-width: 100%; max-height:100%; height:150px'
      ])?>
  </div>
  
  <div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <center><h3>Profil Anda</h3></center>
        
        <form action="<?php echo base_url();?>cpemilik/simpanprofil" method="post" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Nama:</label>
            <div class="col-lg-8">
              <input class="form-control" name="nama" type="text" value="<?php echo $valpemilik->nama; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" type="text"  value="<?php echo $valpemilik->email;?>">
            </div>
          </div>
         <div class="form-group">
            <label class="col-lg-3 control-label">Username:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="username" value="<?php echo $this->session->userdata('username'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Password:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" name="password" value="<?php echo $this->session->userdata('password'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">No Telp:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="notelp" value="<?php echo $valpemilik->notelp; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Update">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
<?php $this->load->view('footer'); ?>