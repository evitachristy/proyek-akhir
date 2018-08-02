<html lang="en">
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

<body>
<div class="container">
    <h1>Profile</h1>
  	<hr>
	
	
	<div class="row">
      <!-- edit form column -->
	    <div class="col-md-12">
			  <table class="table table-striped table-hover">
				<thead>
					<tr>
						<th></th>
						<th></th>
						<th>No</th>
						<th>Id Rumah</th>
						<th>Nama Rumah</th>
						<th>Status Akhir</th>
						<th>Aksi</th>
						
					</tr>
				</thead>
				<tbody>
					<!-- load products from table -->
					<?php $i=0;
						foreach ($status as $row) :
						$i++;?>
						<tr>
							<td></td>
							<td></td>
							<td><?php echo $i ?></td>
							<td><?=$row->kid?></td>
							<td><?=$row->rnm?></td>
							<td><?=$row->kst?></td>

							<!-- <? "<td>". anchor('cmember/detailunas/'.$key->id_konfirmasi,'<button class="btn btn-primary">Detail </button>'); ?> -->
							<td></td>			
						</tr>
						<?php endforeach; ?>
									
				</tbody>
			  </table>
		</div>
	</div>
</div>
<hr>

</body>
</html>
<?php $this->load->view('footer'); ?>
