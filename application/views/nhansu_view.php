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
		<div class="text-xl-center">
			<h3 class="table-success"> Danh sách nhân sự</h3>
			<hr>
		</div>
	</div>
	<div class="container">
		<div class="row">
				<?php foreach ($mangketqua as $value): ?>
					<div class="col-sm-4">
						<div class="card card-group">
						    <img class="card-img-top img-fluid" src="<?= $value['anhavatar'] ?>" alt="Card image cap">
						    <div class="card-body">
							    <h5 class="card-title ten">Tên: <b><?= $value['ten']?></b></h5>
						   		<p class="card-text tuoi"> Tuoi: <b><?= $value['tuoi']?></b></p>
								<p class="card-text sdt"> Sdt: <b><?= $value['sdt']?></b></p>
								<p class="card-text sodonhoanthanh"> So don: <b><?= $value['sodonhang']?></b></p>
								<p class="card-text linkfb"><a href="<?= $value['linkfb']?>" class="btn btn-info">Facebook</a></p>
								<!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
								<p class="card-text ">
								<a href="nhansu/sua_nhansu/<?= $value['id']?>" class="btn btn-warning">Sửa <i class=" fa fa-pencil"></i></a>
								<a href="nhansu/xoa_nhansu/<?= $value['id']?>" class="btn btn-danger">Xóa <i class="fa fa-remove"></i></a>
								</p>
						    </div>
						</div>
					</div>
				<?php endforeach ?>
		</div>
	</div>

		<div class="container">
			<h3 class="text-xl-center table-danger">Thêm Nhân Sự</h3>
			<!-- <form method="post" enctype="multipart/form-data" action=""> -->
				  <div class="form-group">
				    <label for="anhavatar">Ảnh Đại Diện</label>
				    <input  name ="anhavatar"type="file" class="form-control" id="anhavatar" placeholder="upload ảnh">
				  </div>
				  <div class="form-group">
				    <label for="ten">Tên Nhân Viên</label>
				    <input name ="ten" type="text" class="form-control" id="ten" placeholder="Tên Nhân viên">
				  </div>
				  <div class="form-group">
				    <label for="tuoi">Tuổi</label>
				    <input name ="tuoi" type="number" class="form-control" id="tuoi" placeholder="Tuổi">
				  </div>
				  <div class="form-group">
				    <label for="linkfb">Linkfb</label>
				    <input name ="linkfb" type="text" class="form-control" id="linkfb" placeholder="linkfb">
				  </div>
				  <div class="form-group">
				    <label for="sdt">Số Điện Thoại</label>
				    <input name ="sdt" type="text" class="form-control" id="sdt" placeholder="Số Điện Thoại">
				  </div>
				  <div class="form-group">
				    <label for="sodonhoanthanh">Số Đơn Đã Hoàn Thành</label>
				    <input name ="sodonhang" type="number" class="form-control" id="sodonhoanthanh" placeholder="Số Đơn Đã Hoàn Thành">
				  </div>
				  <div class="column">
				  	<div class="text-xl-center">
				  		<button type="button" class="btn btn-outline-success nutxulyajax">Thêm Mới (bằng ajax)</button>
				  		<button type="submit" class="btn btn-outline-warning">Reset</button>
				  	</div>
				  </div>
			<!-- </form> -->
		</div>
		<script>
			$('.nutxulyajax').click(function(event) {
				$.ajax({
				url: 'nhansu/AddByAjax',
				type: 'POST',
				dataType: 'json',
				data: {
					ten: $('#ten').val(),
					tuoi: $('#tuoi').val(),
					sdt: $('#sdt').val(),
					//anhavatar: $('#ten').val(),
					linkfb: $('#linkfb').val(),
					sodonhang: $('#sodonhoanthanh').val()
				},
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
				/* Act on the event */
			});
			
		</script>
</body>
</html>