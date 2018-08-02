
<?php 
	echo validation_errors(); 
	echo $this->session->flashdata('msg');
?>
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
    <title>TAmpilan Admin</title>

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
<div id="page-wrapper">    
<form action="<?php echo site_url('cadmin/search_keyword');?>" method = "post">


    <fieldset>
	<CENTER>
    <legend>List Pelanggan</legend>
	</center> 																																						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name = "keyword" />
	<input type="submit" value = "Search" />
        <table class="table table-striped">
        	<tr bgcolor="skyblue">
        <td>Username</td>
        <td>Nama Lengkap</td>
        <td>alamat</td>
        <td>No Telepon</td>
		 <td>Aksi</td>
      </tr>


        <?php foreach ($muser as $key) {
			
          echo "<tr>";
          echo "<td>". $key->username."</td>";
          echo "<td>". $key->nama."</td>";
          echo "<td>". $key->email."</td>";
          echo  "<td>". $key->notelp."</td>";
		  echo "<td>". anchor('cadmin/delete/'.$key->id_pelanggan,'<button type="button" class="btn btn-danger">Hapus</button>');
		
		  ?>
          </tr>
		  
		 
      <?php  } ?>
			
        </table>
    </fieldset>
	<td>
	<center> <?php echo $this->pagination->create_links(); ?> </center>
</form>
</div>