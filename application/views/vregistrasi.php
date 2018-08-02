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
<br><br><br>
<div class="container" align="center">
	<div class="container-fluid">
	<h1>Member&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pemilik </h1>
		<a href="<?php echo base_url('home/registrasi_user'); ?>"><img src="<?php echo base_url('asset/img/logo1.png'); ?>" class="img-circle" alt="Bird" width="200" height="200"> </a>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?php echo base_url('home/registrasi_pemilik'); ?>"><img src="<?php echo base_url('asset/img/logo2.png'); ?>" class="img-circle" alt="Bird" width="200" height="200"></a>
	</div>
	
</div> <br><br><br><br><br>
<?php $this->load->view('footer'); ?>