
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<link href="<?php echo base_url('asset/css/bootstrap.css');?>" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo base_url('asset/css/style.css'); ?>" rel='stylesheet' type='text/css' />
<!-- Metis Menu -->
<link href="<?php echo base_url('asset/css/custom.css'); ?>" rel="stylesheet">

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
<body>
<div class="container">

       <hr>
        <!-- /.row -->
        <div class="row">
                        <!-- body items -->
            <!-- load products from table -->
             <div class="col-md-12">
					
                <div class="panel panel-default">
				<h1>Detail Rumah</h1>
                    <div class="panel-body" width="100px">
					<div class="thumbnail">
					 <?=img([
							'src'		=> 'uploads/' . $row_data->rim,
							'style'		=> 'max-width: 100%; max-height:100%; '
						  ])?>
					</div>
					<p><b>Nama Rumah :</b> <?php echo $row_data->rnama; ?>   </p>
					<p><b>Harga :</b> <?php echo $row_data->rpr; ?>   </p>
					<p><b>Deskripsi Rumah :</b> <?php echo $row_data->rd; ?>   </p>
					<p><b>Jumlah Kamar Tidur :</b> <?php echo $row_data->rkm; ?>   </p>
					<p><b>Jumlah Kamar Mandi :</b> <?php echo $row_data->rkmi; ?>   </p>
					<p><b>Luas Bangunan :</b> <?php echo $row_data->rlb; ?>   </p>
					<p><b>Luas Tanah :</b> <?php echo $row_data->rlt; ?>   </p>
					<p><b>Jumlah Lantai :</b> <?php echo $row_data->rjmlhlantai; ?>   </p>
					<p><br>
					<?=anchor('cmember/add_to_cart/' . $row_data->rid, 'Pesan Sekarang' , [
						'class'	=> 'btn btn-danger',
						'role'	=> 'button'
					])?>
					</div>
				</div>
			</div>
		</div>
</div>
</body>