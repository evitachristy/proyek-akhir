<html>

<head>

</head>

<body>
<div class="container">

	<div class="row">
	 <div class="col-md-12">
					<br><br><br><br><br>
                <div class="panel panel-default">
                  
                    <div class="panel-body" width="100px">
						<div class="col-md-12">
							<hr>
								<div class="alert alert-danger">
									<strong>Perhatian</strong> Silahkan Konfirmasi Pembayaran sesuai form dibawah ini ;
								</div>
								<div class="col-md-3 four-grid">
									<div class="four-grid2">
										<div class="icon">
											<BR>
										</div>
									<div class="four-text" ALIGN="CENTER">
										<h4>BNI</h4>
									</div>
										<a align="center" href="">0091239281392 an Carkon</a>
									</div>
								</div>
						<div class="col-md-3 four-grid">
						<div class="four-grid1">
							<div class="icon">
								<BR>
							</div>
							<div class="four-text" ALIGN="CENTER">
								<h4>MANDIRI</h4>
							</div>
							<a align="center" href="">0141239281392 an Carkon</a>
						</div>
					</div>
						</div>  
						<hr>
						
						
						
						<div class="col-md-4"></div>
						
						<div class="col-md-2"></div>
                    </div>
                </div>
            </div>  
			
        </div>
	
<!-- Form Name -->
</center><br>
<?php echo "<center>".$this->session->flashdata('msg')."</center>"; ?>
<center>
<legend>FORM KONFIRMASI PEMBAYARAM</legend>

		<?= form_open_multipart('cmember/create',['class'=>'form-group']	); ?>
		<?php foreach($data as $u) : ?>
<!-- Text input-->

		<div class="form-group">
		  <label class="col-md-4 control-label" >No Konfirmasi</label>  
		  <div class="col-md-4">
		  <input type="number" name="id_konfirmasi" placeholder="Masukan No Konfirmasi" class="form-control" value="<?php echo rand() ?>" readonly> 
		  </div>
		</div>
		
		<div class="form-group">
		  <label class="col-md-4 control-label" >Id Rumah</label>  
		  <div class="col-md-4">
		  <input type="text" name="id_rumah" readonly class="form-control" value="<?php echo $u->id_rumah; ?>"> 
		  </div>
		</div>


		<div class="form-group">
		  <label class="col-md-4 control-label" >Nama Pembayar</label>  
		  <div class="col-md-4">
		  <input type="text" name="nama" placeholder="Masukan nama" maxlength="18" class="form-control" value="<?php echo set_value('namarek'); ?>"> 
		  </div>
		</div>
			
	<!-- 	<div class="form-group">
		  <label class="col-md-4 control-label" >Nama Bank</label>  
		  <div class="col-md-4">
		  <input type="text" name="nama" placeholder="Masukan nama" maxlength="18" class="form-control" value="<?php echo set_value('bank'); ?>"> 
		  </div>
		</div> -->

		<div class="col-sm-4">
			<div class="input-group">
				<div class="input-group-addon">Nama Bank</div>
				<input type="text" class="form-control" name="bank" placeholder="Masukan Bank" value="<?= set_value('bank') ?>">
				</div>
		</div>
			

			<div class="form-group">
		  <label class="col-md-4 control-label" >Nama Rumah</label>  
		  <div class="col-md-4">
		  <input type="text" name="nama" readonly placeholder="Masukan nama" maxlength="18" class="form-control" value="<?php echo $u->name ?>"> 
		  </div>
		</div>
		

		<!-- Text input-->
		<div class="form-group">
			<?php $tanggal = date('Y-m-d'); ?>	
		  <label class="col-md-4 control-label" >Tanggal</label>  
		  <div class="col-md-4">
		  <input type="date" name="tanggal" placeholder="Masukan Tanggal" class="form-control" value="<?php echo set_value('tanggal'); ?>">
		  </div>
		</div>
		
		<div class="form-group">
			<?php
			$harga=$u->price;
			$dp = $harga*0.01;

			?>
		  <label class="col-md-4 control-label" >Jumlah Bayar</label>  
		  <div class="col-md-4">
		  <input type="number" name="price" class="form-control" max="<?php echo $u->price ?>" value="<?php echo $dp ?>" >
		  </div>
		</div>


		<div class="form-group">
		  <label class="col-md-4 control-label">Bukti Pembayaran</label>  
		  <div class="col-md-4">
		  <input type="file" name="userfile" class="form-control">
		  </div>
		</div>
		
		<div class="form-group">
		  <label class="col-md-4 control-label" >Harga</label>  
		  <div class="col-md-4">
		  <input type="text" name="price" class="form-control" value="<?php echo $u->price ?>" readonly> 
		  </div>
		</div>

		<div class="form-group">
		  <label class="col-md-4 control-label"> </label>
		  <div class="col-md-4">
			<button type="submit" class="btn btn-primary">Konfirmasi</button>
		  </div>
		</div>
		
		<?= form_close() ?>

    <?php endforeach; ?>
	</div>
</div>
</body>
</html>