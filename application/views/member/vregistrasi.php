</br></br></br>
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
	<div class="row">
	</br></br></br></br>
        <form class="form-horizontal" action="<?php echo base_url() ?>index.php/home/daftar" method="post" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->

<center>
<legend>FORM REGISTRASI MEMBER</legend>
</center>


<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" >Nama Lengkap</label>  
		  <div class="col-md-4">
		  <input type="text" name="nama" placeholder="Masukan nama" maxlength="18" class="form-control" value="<?php echo set_value('nama'); ?>"> 
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" >Username</label>  
		  <div class="col-md-4">
		  <input type="text" name="username" placeholder="Masukan Usernamae" class="form-control" value="<?php echo set_value('username'); ?>" >
		  </div>
		</div>


		<div class="form-group">
		  <label class="col-md-4 control-label">Password</label>  
		  <div class="col-md-4">
		  <input type="password"  name="password"  placeholder="Masukan password" class="form-control"  >
		  </div>
		</div>


		<div class="form-group">
		  <label class="col-md-4 control-label">Input Kembali Password</label>  
		  <div class="col-md-4">
		  <input type="password"  name="confirm_password"  placeholder="Masukan password" class="form-control" 
		  if ($_POST["password"] === $_POST["confirm_password"]) {
		  // success!
		}else { // failed :(

	} >
		  </div>
		</div>


		<div class="form-group">
		  <label class="col-md-4 control-label">Email</label>  
		  <div class="col-md-4">
		  <input type="text" name="email"  placeholder="Masukan Email" class="form-control" value="<?php echo set_value('email'); ?>">
		  </div>
		</div>

		<div class="form-group">
		  <label class="col-md-4 control-label">Nomor Telepon Seluler</label>  
		  <div class="col-md-4">
		  <input type="text" name="notelp" placeholder="Masukan Notelpon" class="form-control" value="<?php echo set_value('notelp'); ?>" >
		  </div>
		</div>
		
		<div class="form-group">
		  <label class="col-md-4 control-label">Foto Pengguna</label>  
		  <div class="col-md-4">
		  <input type="file" name="userfile" class="form-control">
		  </div>
		</div>
		

		<div class="form-group">
		  <label class="col-md-4 control-label"> </label>
		  <div class="col-md-4">
			<input type="submit" class="btn btn-primary" name="btndaftar" value="Daftar"></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo "Klik untuk login &nbsp;". anchor('home/login','Login') ?>
		  </div>
		</div>

</fieldset>
</form>
  
	</div>
</div>
<?php $this->load->view('footer'); ?>