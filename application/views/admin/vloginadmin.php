<?php 
	echo validation_errors(); 
	echo "<center>".$this->session->flashdata('msg')."</center>"; ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PWL</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>asset/css/simple-sidebar.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="<?php echo base_url();?>asset/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript --> 
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
	

</head>
<body>		<form action="<?php echo base_url() ?>home/login_admin" method="post">
            <div class="container col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
            <br />
			
            <div class="panel panel-default">
                <div class="panel-heading">
                   <center> <h1>Login Admin</h1></center>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user" style="width: auto"></i>
                            </span>
                            <input type="text" class="form-control" name="username"  value="<?php echo set_value('username'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock" style="width: auto"></i>
                            </span>
                            <input type="password" class="form-control" name="password"  >
                        </div>
                    </div>
                     <div class="col-md-6">
						<input type="submit" class="btn btn-success" name="btnlogin" value="login">
							<?php echo anchor(base_url(),'Cancel',['class'=>'btn']) ?>	
					</div>
                </div>
            </div>
			
        </div>
		</form>
<!-- /#page-content-wrapper -->


<!-- /#wrapper -->	

</body>
</html>