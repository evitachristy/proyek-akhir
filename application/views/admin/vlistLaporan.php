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
                            Laporan Pelanggan
                        </h1>
                    </div>
                </div>
				
				<div class="row">
				
				<!--  <form action="<?php echo base_url();?>cadmin/searchlap" method="get">
					<label>Cari :</label>
					<input type="text" name="cari">
					<input type="submit" value="cari">
				</form> -->
				
				<table id="tableku" width="100%" class="table table-bordered table-striped table-hover table-list-search mdl-data-table" border="2" align="center">
			
				<thead>
				<tr>
					<th align="center">
					<strong>Id Konfirmasi</strong>
					</th>
					<th height="20" align="center">
					<strong>ID Rumah</strong>
					</th>
					</th>
					<th height="20" align="center">
					<strong>Harga Rumah</strong>
					</th>
					<th height="20" align="center">
					<strong>Nama Rumah</strong>
					</th>
					<th height="20" align="center">
					<strong>Nama Pembayar</strong>
					</th>
					<th height="20" align="center">
					<strong>Nama Bank</strong>
					</th>
					<th height="20" align="center">
					<strong>Tanggal Pembayaran</strong>
					</th>
					<th height="20" align="center">
					<strong>Gambar</strong>
					</th>
					<th height="20" align="center">
					<strong>Status</strong>
					</th>
					<th height="20" align="center">
					<strong>Aksi</strong>
					</th>
					<!-- <th height="40" align="center">
					<strong>Cetak</strong>
					</th> -->
					
				</tr>
				</thead>
					
				<tbody>
					<?php foreach ($hasil as $key ) : ?>
									<tr>
										
										<td><?=$key->id_konfirmasi ?></td>
										<td><?=$key->id_rumah?></td>
										<td><?=$key->price?></td>
										<td><?=$key->nama?></td>
										<td><?=$key->namarek?></td>										
										<td><?=$key->bank?></td>
										<td><?=$key->tanggal?></td>
										
										<td><?=img([
												'src'		=> 'uploads/' . $key->image,
												'style'		=> 'max-width: 100%; max-height:100%; height:50px'
										])?></td>
										<td>
											<?php if($key->status1 == "Lunas"){?>
												<button class="btn-success" disabled="">Lunas</button>	
											<?php }elseif ($key->status1 == "Waiting") { ?>
												<button class="btn-warning" disabled="">Waiting</button>
											<?php }elseif($key->status1 == "Ditolak"){?>
												<button class="btn-success" disabled="">Ditolak</button>	
											<?php }?>		
										</td>
										<td>
											<a class="btn btn-success btn-sm" href="<?php echo base_url('cadmin/approve/').$key->id_konfirmasi;?>"><i class="fa fa-check"></i></a>
						
											<a class="btn btn-danger btn-sm" href="<?php echo base_url('cadmin/tolak/').$key->id_konfirmasi;?>"><i class="fa fa-close"></i></a>
										</td>
										<!-- <?= "<td>". anchor('cadmin/cetakpdf/'.$key->id_konfirmasi,'<button class="btn btn-primary">Cetak Pdf</button>'); ?> -->
										
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