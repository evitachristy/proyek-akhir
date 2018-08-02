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
                            Gambar Bukti Pembayaran
                        </h1>
                    </div>
                </div>
				
				<div class="row">
				
				<?php foreach ($gambar as $data ) : ?>
								
				<?=img([
					'src'		=> 'uploads/' . $data->image,
					'style'		=> 'max-width: 100%; max-height:100%; height:150px'
				])?>
				
				<?php endforeach; ?>
				
	</div>
        </div>
			</div>
				</div>
</body>
</html>