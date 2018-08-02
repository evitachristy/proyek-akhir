<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</head>
	<body data-spy="scroll">
		</br>
		</br>
		</br>
		</br>
		</br>
		<!-- Tampilkan semua produk -->
		 <div class="container">
		<div class="row">
		<!-- looping us -->

		  <?php foreach($rumah as $u) : ?>
		  <div class="col-sm-3" style="background-color:white;" ">
			<div class="thumbnail">
			  <?=img([
				'src'		=> 'uploads/' . $u->rim,
				'style'		=> 'max-width: 100%; max-height:100%; height:150px'
			  ])?>
			  <div class="caption">
				<h3 style="min-height:60px;"><?=$u->rnama?></h3>
				<p><?=$u->rd?></p>
				<p>Rp. <?=$u->rpr?></p>
				<p>
					<?=anchor('cmember/add_to_cart/' . $u->rid, 'Pesan Sekarang' , [
						'class'	=> 'btn btn-danger',
						'role'	=> 'button'
					])?>
					<?=anchor('home/view_detail/' . $u->rid, 'Detail' , [
						'class'	=> 'btn btn-info',
						'role'	=> 'button'
					])?>
				</p>
			  </div>
			</div>
		  </div>
		  <?php endforeach; ?>
		<!-- end looping -->
		</div>
	</div>
		
	</body>
	<?php $this->load->view('footer'); ?>
</html>