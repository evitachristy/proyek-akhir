<html>
<head>

   <script src="<?php echo base_url();?>aset/dist/js/jquery-1.12.4.js"></script>
  <script src="<?php echo base_url();?>aset/dist/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>aset/dist/js/dataTables.material.min.js"></script>

</head>

<body>
     <div id="wrapper">
	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Data Pembayaran
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->

                <div class="row">
				<table id="tableku" width="100%" class="table table-bordered table-striped table-hover table-list-search mdl-data-table" border="2" align="center">
			
				<thead>
				<tr>
					<th align="center">
					<strong>No Konfirmasi</strong>
					</th>
					<th align="center">
					<strong>Id Pelanggan</strong>
					</th>
					<th height="40" align="center">
					<strong>Nama</strong>
					</th>
					<th height="40" align="center">
					<strong>Harga</strong>
					</th>
					<th height="40" align="center">
					<strong>Tanggal</strong>
					</th>
					<th height="40" align="center">
					<strong>Gambar</strong>
					</th>
					<th height="40" align="center">
					<strong>Status</strong>
					</th>
				</tr>
				</thead>
					
				<tbody>
					<?php foreach ($konfirmasi as $data ) : ?>
									<tr>
										
										<td><?=$data->id_konfirmasi ?></td>
										<td><?=$data->id_pelanggan ?></td>
										<td><?=$data->nama ?></td>
										<td><?=$data->price ?></td>
										<td><?=$data->tanggal ?></td>

										<td><?=img([
												'src'		=> 'uploads/' . $data->image,
												'style'		=> 'max-width: 100%; max-height:100%; height:50px'
										])?></td>
										<td><?php if($data->status1 == 'Waiting'){ echo '<a class="btn btn-success btn-sm" href=""><i class="fa fa-check"></i></a><a class="btn btn-danger btn-sm" href="'.base_url('cadmin/batal').'"><i class="fa fa-remove"></i></a>'; } ?></td>
									</tr>
									<?php endforeach; ?>
									
				</tbody>
			</table>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
	</div>

   
</body>
</html>

<script>
$(document).ready(function() {
    $('#tableku').DataTable({
		"lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]]
	});
} );
</script>
 