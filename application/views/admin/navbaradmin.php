<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('asset/css/sb-admin.css'); ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('asset/css/plugins/morris.css'); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('asset/font-awesome/css/font-awesome.min.css');  ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Carkon</a>
            </div>
            <!-- Top Menu Items -->
            <!-- <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                       
                        <li class="message-preview">
                            <?php 
								$no = 1;
							  foreach ($notif as $row)
							{
							  ?>
								<tr>
								<?php echo $no++;?> <br>
								Id Pelanggan : <?php echo $row->id_pelanggan;?> <br>
								Nama : <?php echo $row->nama;?> <br>
								Tanggal : <?php echo $row->tanggal;?> <br>
								Harga : <?php echo $row->price;?> <br>
								Status : <?php echo $row->status;?> <br>
								
								<?php 
							}

							?>  
                        </li>
                        
                        <li class="message-footer">
                            <a href="<?php echo base_url(); ?>cadmin/datanotif">Read All New Messages</a>
                        </li>
                    </ul>
                </li> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url(); ?>cadmin/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="">
                        <a href="<?php echo base_url(); ?>cadmin/"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
   
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#demo"><i class="fa fa-users"></i> Daftar User <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?php echo base_url(); ?>cadmin/listPemilik">Pemilik</a>
                            </li>
                            <li>
                               <a href="<?php echo base_url(); ?>cadmin/listPelanggan">Pelanggan</a>
                            </li>
                        </ul>
                    </li>
                
					<li>
                         <a href="<?php echo base_url(); ?>cadmin/listRumah"><i class="fa fa-check-square"></i> Data Rumah </a>
                    </li>
					<li>
                         <a href="<?php echo base_url(); ?>cadmin/laporan"><i class="fa fa-check-square"></i> Laporan </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('js/jquery.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('js/plugins/morris/raphael.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/plugins/morris/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/plugins/morris/morris-data.js'); ?>"></script>

</body>

</html>
