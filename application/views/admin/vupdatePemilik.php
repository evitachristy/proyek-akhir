<html>
<head>

</head>
<body>
	<div id="wrapper">
		<div id="page-wrapper">
			<div class="container-fluid">
			
				<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Data Pemilik
                        </h1>
                    </div>
                </div>
				
				<div class="row">
				
				 <form action="<?php echo base_url();?>cadmin/simpanpemilik" method="post" class="form-horizontal">
					
					<div class="form-group">
					  <label class="col-md-4 control-label">Id Pemilik</label>  
					  <div class="col-md-4">
					  <input type="number"  name="id"  placeholder="Masukan Id" value="<?=$mpemilik->id_pemilik ?>" class="form-control" readonly> 
					  </div>
					</div>
										
					<div class="form-group">
					  <label class="col-md-4 control-label">Nama Pemilik</label>  
					  <div class="col-md-4">
					  <input type="text"  name="nama"  placeholder="Masukan Nama" value="<?=$mpemilik->nama ?>" class="form-control"  >
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-md-4 control-label">Email</label>  
					  <div class="col-md-4">
					  <input type="text"  name="email"  placeholder="Masukan Email" value="<?=$mpemilik->email ?>" class="form-control"  >
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-md-4 control-label">No Telp.</label>  
					  <div class="col-md-4">
					  <input type="text"  name="notelp"  placeholder="Masukan No Telp." value="<?=$mpemilik->notelp ?>" class="form-control"  >
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-md-4 control-label"> </label>
					  <div class="col-md-4">
						<input type="submit" class="btn btn-success" Value="Simpan">
						<a href="<?php echo base_url();?>index.php/cadmin/listPemilik" class="btn btn-primary">Cancel</a>
					  </div>
					</div>
					
				</form>
				
	</div>
        </div>
			</div>
				</div>
</body>
</html>