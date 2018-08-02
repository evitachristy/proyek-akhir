
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Online</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('/assets/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('/assets/css/modern-business.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('/assets/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
	
    <div class="container">
        <div class="row">

            <form action="<?php echo base_url() ?>index.php/home/login_process" method="post" enctype="multipart/form-data">
	<center>
	</br>
</br></br></br>
<?php 
	echo validation_errors(); 
	echo "<center>".$this->session->flashdata('msg')."</center>"; ?>	</center>
    <legend>Login</legend>

		<div class="col-md-7">
        	<div class="form-group">
				<label for="username">User Name : </label>
					<input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" >
			</div>
			<div class="form-group">
				<label for="password">Password : </label>
					<input type="password" class="form-control" name="password"  >
			</div>
			</div>
            <div class="col-md-6">
               <input type="submit" class="btn btn-success" name="btnlogin" value="login" > &nbsp; &nbsp; &nbsp; &nbsp;
			   <?php echo "Belum punya akun ? silahkan registrasi disini &nbsp;". anchor('home/registrasi_user','Registrasi Pelanggan') ?>
            </div>
			</form>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->


<!-- /#wrapper -->	

</body>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<?php $this->load->view('footer'); ?>
</html>