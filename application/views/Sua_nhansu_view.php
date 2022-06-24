<!DOCTYPE html>
<html lang="en"><head>
	<title> Example </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>
<body >
		<div class="container">
			<h3 class="text-xl-center table-danger">Sửa Nhân Viên</h3>
			<form method="post" enctype="multipart/form-data" action="<?= base_url() ?>index.php/nhansu/update_nhansu">
				<?php foreach ($dulieukq as $value): ?>
					
				
					  <div class="form-group">
					  	<div class="row">
					  		<div class="col-sm-4">
					  			<img src="<?= $value['anhavatar'] ?>" alt="photos" class="img-fluid">
					  		</div>
					  	</div>
					  	<input type="hidden" name="id" value="<?= $value['id'] ?>">
					  	<input type="hidden" name="anhavatar2" value="<?= $value['anhavatar'] ?>">
					    <label for="anhavatar">Ảnh Đại Diện</label>
					    <input  name ="anhavatar"type="file" class="form-control" id="anhavatar" placeholder="upload ảnh">
					  </div>

					  <div class="form-group">
					    <label for="ten">Tên Nhân Viên</label>
					    <input name ="ten" type="text" class="form-control" id="ten" placeholder="Tên Nhân viên" value="<?= $value['ten'] ?>">
					  </div>

					  <div class="form-group">
					    <label for="tuoi">Tuổi</label>
					    <input name ="tuoi" type="number" class="form-control" id="tuoi" placeholder="Tuổi" value="<?= $value['tuoi'] ?>">
					  </div>

					  <div class="form-group">
					    <label for="linkfb">Linkfb</label>
					    <input name ="linkfb" type="text" class="form-control" id="linkfb" placeholder="linkfb" value="<?= $value['linkfb'] ?>">
					  </div>

					  <div class="form-group">
					    <label for="sdt">Số Điện Thoại</label>
					    <input name ="sdt" type="text" class="form-control" id="sdt" placeholder="Số Điện Thoại" value="<?= $value['sdt'] ?>">
					  </div>

					  <div class="form-group">
					    <label for="sodonhoanthanh">Số Đơn Đã Hoàn Thành</label>
					    <input name ="sodonhang" type="number" class="form-control" id="sodonhoanthanh" placeholder="Số Đơn Đã Hoàn Thành" value="<?= $value['sodonhang'] ?>">
					  </div>
				<?php endforeach ?>
				  <div class="column">
				  	<div class="text-xl-center">
				  		<button type="submit" class="btn btn-outline-success">Lưu lại</button>
				  	</div>
				  </div>
			</form>
	</div>
</body>
</html>