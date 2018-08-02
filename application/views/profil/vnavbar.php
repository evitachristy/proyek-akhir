
<!DOCTYPE html>
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
	

</head>
<body data-spy="scroll">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
<a class="navbar-brand" href="<?php echo base_url(); ?>cmember"><span class="glyphicon glyphicon-home"></span> CARKON ( CARI KONTRAKAN )</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
      <?php echo "<li><a>Halo <span>".$this->session->userdata('username');"</span></a></li>" ?>
	   <li><a href="<?php echo base_url(); ?>cmember/cekstat">Cek Status</a></li>
	   <li><a href="<?php echo base_url(); ?>cmember/profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
      <li><a  href="<?php echo base_url(); ?>cmember/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	   <li>
			<?php
				$text_cart_url  = '<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>';
				$text_cart_url .= ' Rumah: '. $this->cart->total_items() .' items';
			?>
			<?=anchor('cmember/cart', $text_cart_url)?>
		</li>
    </ul>
  </div>
  
</nav>