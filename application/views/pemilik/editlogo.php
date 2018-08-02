<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Online</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('/asset/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('/asset/css/modern-business.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('/asset/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- load for table and search in table -->
	<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/js/jquery-1.10.2.min.js');?>"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/js/dataTables.bootstrap.js');?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/dataTables.bootstrap.css');?>">
</head>

	
	<body>
		
		<!-- Navigation -->
		<!-- Page Content -->
		<div class="container">
			<!-- /.row -->
			<div class="row">
				<!-- body items -->
	
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>
								<i class="fa fa-fw fa-compass"></i> Edit Foto <?=  anchor('cpemilik/logobaru','Edit Foto',['class'=>'btn btn-primary btn-xs']) ?>
							</h4>
						</div><!-- /..panel-heading -->
						<div class="panel-body">
						<div><?= validation_errors()?></div>
						<?=  form_open_multipart('cpemilik/logobaru',['class'=>'form-group']) ?>
							<div class="col-sm-4">
								<div class="input-group">
									<div class="input-group-addon">Id Rumah</div>
									<input type="number" class="form-control" name="id" placeholder="Masukan Nama Rumah" value="<?php echo $query->id_rumah; ?>"readonly>
								</div>
							</div>
							
							<div class="col-sm-4">
								<div class="input-group">
									<div class="input-group-addon">Nama Rumah</div>
									<input type="text" class="form-control" name="id" placeholder="Masukan Nama Rumah" value="<?php echo $query->name; ?>"readonly>
								</div>
							</div>
							
							<div class="col-sm-4">
								<div class="input-group">
									<div class="input-group-addon">Deskripsi Rumah</div>
									<input type="text" class="form-control" name="id" placeholder="Masukan Nama Rumah" value="<?php echo $query->description; ?>"readonly>
								</div>
							</div>
							
							<div class="col-sm-4">
								<div class="input-group">
									<div class="input-group-addon">Harga Rumah</div>
									<input type="number" class="form-control" name="id" placeholder="Masukan Nama Rumah" value="<?php echo $query->price; ?>"readonly>
								</div>
							</div>
							
							
							<div class="col-sm-3">
								<div class="input-group">
									<input type="file" name="userfile">
								</div>
							</div>
							
							
							<div class="col-sm-12"><hr></div>
							
							
							
							<div class="col-sm-1">
								<div class="input-group">
									<input type="submit" class="btn btn-success" Value="Simpan">
								</div>
							</div>
							<div class="col-sm-1">
								<div class="input-group">
									
									<a href="<?php echo base_url();?>index.php/cpemilik/listRumah" class="btn btn-primary">Cancel</a>
								</div>
							</div>
							
						
						<?= form_close() ?>
						</div><!-- /..panel-body -->
					</div><!-- /..panel panel-default -->
				</div> 
				
			</div>
			<!-- /.row -->
			<hr>
			<!-- Footer -->
			
		</div>
		<!-- /.. container -->
		
		<!-- jQuery -->
		<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
	</body>
</html>
