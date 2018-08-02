<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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
	<!-- load for table and search in table -->
	<script type="text/javascript" language="javascript" src="<?php echo base_url('/assets/js/jquery-1.10.2.min.js');?>"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url('/assets/js/jquery.dataTables.min.js');?>"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url('/assets/js/dataTables.bootstrap.js');?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/dataTables.bootstrap.css');?>">
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
							<h3> Data Rumah Kamu</h3>
						</div>
						<div class="panel-body">
							<table class="table table-striped table-hover" id="tableproducts">
								<thead>
									<tr>
										
										<th>Nama Rumah</th>
										<th>Harga</th>
										<th>Deskripsi</th>
										<th>Jumlah Kamar Tidur</th>
										<th>Jumlah Kamar Mandi</th>
										<th>Luas Bangunan</th>
										<th>Luas Tanah</th>
										<th>Jumlah Lantai</th>
										<th>Lokasi Rumah</th>
										<th>Gambar Rumah</th>
										<th> Aksi </th>
									</tr>
								</thead>
								<tbody>
								<!-- load products from table -->
								<?php foreach ($mrumah as $data ) : ?>
									<tr>
										<td><?=$data->name ?></td>
										  <td><?=$data->price ?></td>
										  <td><textarea rows="5"><?=$data->description ?></textarea></td>
										  <td><?=$data->jmlhkamar ?></td>
										  <td><?=$data->jmlhkamarmandi ?></td>
										  <td><?=$data->luasb ?></td>
										  <td><?=$data->luast ?></td>
										  <td><?=$data->jmlhlantai ?></td>		
										  <td><?=$data->lokasi ?></td>									  
										  <td><?=img([
												'src'		=> 'uploads/' . $data->image,
												'style'		=> 'max-width: 100%; max-height:100%; height:150px'
											  ])?></td>
											<?= "<td>". anchor('cpemilik/delete/'.$data->id_rumah,'<button type="button" class="btn btn-danger">Hapus</button>'); ?>
											<?= "<td>". anchor('cpemilik/editRumah/'.$data->id_rumah,'<button type="button" class="btn btn-info">Edit</button>'); ?>
													
									</tr>
									<?php endforeach; ?>
									
									
								</tbody>
							</table>
							<script>
								$(document).ready(function(){
									$('#tableproducts').DataTable();
									
								});
							</script>
							
						</div>
					</div>
				</div> 
				
			</div>
			<!-- /.row -->
			
			<!-- Features Section -->
			
			<!-- /.row -->
			<hr>
			
			<!-- Footer --
			
		</div>
		<!-- /.container -->
		
		<!-- jQuery -->
		<script src="<?php  base_url('/assets/js/jquery.js');?>"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php  base_url('/assets/js/bootstrap.min.js');?>"></script>
		
		<!-- Script to Activate the Carousel -->
		
		
	</body>
	
</html>
