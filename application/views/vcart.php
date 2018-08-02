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

</head>

<body>

    <!-- Navigation Top_Menu -->	
    <!-- Header Carousel -->

    <!-- Page Content -->
    <div class="">

       <hr>
        <!-- /.row -->
        <div class="row">
                        <!-- body items -->
            <!-- load products from table -->
             <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
						
							<h3>My Carts : <?=  $this->cart->total_items()?> <i class="fa fa-shopping-cart"></i></h3> 
                    </div>
                    <div class="panel-body">
							<table class="table table-striped table-hover" id="tableproducts">
								<thead>
									<tr>
				
										<th>ID </th>
										<th>Nama Rumah</th>
										<th>Harga</th>								
										<th>DP</th>
										<th>Aksi</th>
										
									</tr>
								</thead>
								<tbody>
							<?php 
									$i=0;
									foreach  ($this->cart->contents() as $items): 
										$id=$items['id'];?>	
							<tr>

								<td><?= $id ?> </td>
								<td><?= $items['name'] ?> </td>
								<td><?php echo "Rp.". $this->cart->format_number( $items['price'] );?></td>
								<td><?php echo "Rp.". $this->cart->format_number( $items['price']*0.01 );?></td>
								<td><?php echo  anchor('cpembayaran/success/'.$id,'Pembayaran',['class'=>'btn btn-success','role'=>'button']) ?> </td>
								</tr>
						<?php endforeach; ?>
								</tbody>
							</table>
							<script>
								$(document).ready(function(){
									$('#tableproducts').DataTable();
									
								});
							</script>
							
							
						<div class="col-md-6">
					
							<?php echo  anchor('cmember/clear_cart','Kosongkan Keranjang',['class'=>'btn btn-danger','role'=>'button']) ?>
							<?php echo  anchor(base_url(),'Belanja Lagi',['class'=>'btn btn-primary','role'=>'button']) ?>
							
						</div>
						<div class="col-md-2"></div>
                    </div>
                </div>
            </div>  
			
        </div>
   
</body>

</html>
<?php $this->load->view('footer'); ?>
