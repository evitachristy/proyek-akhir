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
                            Data Pemilik
                        </h1>
                    </div>
                </div>
				
				<div class="row">
				
				 <form action="<?php echo base_url();?>cadmin/searchpel" method="get">
					<label>Cari :</label>
					<input type="text" name="cari">
					<input type="submit" value="cari">
				</form>
				
				<table id="tableku" width="100%" class="table table-bordered table-striped table-hover table-list-search mdl-data-table" border="2" align="center">
			
				<thead>
				<tr>
					<th align="center">
					<strong>Username</strong>
					</th>
					<th height="40" align="center">
					<strong>Nama</strong>
					</th>
					<th height="40" align="center">
					<strong>Email</strong>
					</th>
					<th height="40" align="center">
					<strong>No KTP</strong>
					</th>
					<th height="40" align="center">
					<strong>No Telepon Seluler</strong>
					</th>
					<th height="40" align="center">
					<strong>Edit</strong>
					</th>
					<th height="40" align="center">
					<strong>Hapus</strong>
					</th>
					
				</tr>
				</thead>
					
				<tbody>
					<?php foreach ($mpemilik as $key ) : ?>
									<tr>
										
										<td><?=$key->username ?></td>
										<td><?=$key->nama?></td>
										<td><?=$key->email ?></td>
										<td><?=$key->notelp ?></td>
										<?= "<td>". anchor('cadmin/editPemilik/'.$key->id_pemilik,'<button type="button" class="btn btn-primary">Edit</button>'); ?>
										<?= "<td>". anchor('cadmin/deletepemilik/'.$key->id_pemilik,'<button type="button" class="btn btn-danger">Hapus</button>'); ?>
									</tr>
									<?php endforeach; ?>
									
				</tbody>
			</table>
				
	</div>
        </div>
			</div>
				</div>
</body>
</html>