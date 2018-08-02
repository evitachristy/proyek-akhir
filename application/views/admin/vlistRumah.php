<!DOCTYPE html>
<html lang="en">

<head>


</head>

<body>
		
  <div id="wrapper">
	<div id="page-wrapper">
        <div class="container-fluid">
			<div class="row">
			
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 align="center"> Data Rumah Kamu</h2>
							  <form action="<?php echo base_url();?>cadmin/searchrumah" method="get">
									<label>Cari :</label>
									<input type="text" name="cari">
									<input type="submit" value="cari">
								</form>
						</div>
						<div class="panel-body">
							<table class="table table-striped table-hover" id="tableproducts">
								<thead>
									<tr>
										<th></th>
										<th></th>
										<th>No</th>
										<th>Nama Rumah</th>
										<th>Harga</th>
										<th>Deskripsi</th>
										<th>Jumlah Kamar Tidur</th>
										<th>Jumlah Kamar Mandi</th>
										<th>Luas Bangunan</th>
										<th>Luas Tanah</th>
										<th>Jumlah Lantai</th>
										<th>Lokasi</th>
										<th>Gambar</th>
										<th> Aksi </th>
									</tr>
								</thead>
								<tbody>
								<!-- load products from table -->
								<?php $i=0;
								foreach ($mrumah as $data ) :
									$i++;?>
									<tr>
									<td></td>
										<td></td>
										<td><?php echo $i ?></td>
										<td><?=$data->name ?></td>
										  <td><?=$data->price ?></td>
										  <td><textarea rows="5"><?=$data->description ?></textarea></td>
										  <td><?=$data->jmlhkamar ?></td>
										  <td><?=$data->jmlhkamarmandi ?></td>
										  <td><?=$data->luasb ?></td>
										  <td><?=$data->luast ?></td>
										  <td><?=$data->jmlhlantai ?></td>		
										  <td><?=$data->lokasi ?></td>	

										  <td><?=img([
												'src'		=> 'uploads/' . $data->image,
												'style'		=> 'max-width: 100%; max-height:100%; height:150px'
											  ])?></td>
											<?= "<td>". anchor('cadmin/delete_by_admin/'.$data->id_rumah,'<button type="button" class="btn btn-danger">Hapus</button>'); ?>
													
									</tr>
									<?php endforeach; ?>
									
									<h1 align="center"><?php echo $this->pagination->create_links(); ?> <h1>
								</tbody>
							</table>
							<script>
								$(document).ready(function(){
									$('#tableproducts').DataTable();
									
								});
							</script>
							
						</div>
					</div>
				</div> 
				
			</div>
			<!-- /.row -->
		   </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
	</div>
			<!-- Features Section -->

		
		
	</body>
	
</html>
