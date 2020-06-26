<!DOCTYPE html>
<html lang="en"><head>
	<title> Giao diện hiển thị danh sách nhân viên </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body >
	
	

	<div class="container">
		<div class="text-xs-center">
			<h3 class="display-3">Sửa nhân sự </h3>
		</div>
	</div>
	<div class="container">
		
			<form method="post" enctype="multipart/form-data" action="<?= base_url() ?>index.php/nhansu/update_nhansu">
				<?php foreach ($mangkq as $value): ?>
					
				
				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label class="col-sm-4 text-xs-right" for="anhavatar">Ảnh đại diện</label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-sm-6">
										<img src="<?= $value['anhavatar'] ?>" alt="" class="img-fluid">
									</div>
								</div>
								<input type="hidden" name="id" value="<?= $value['id'] ?>">
								<input type="hidden" name="anhavatar2" value="<?= $value['anhavatar'] ?>">
				    			<input name="anhavatar" type="file" class="form-control col-sm-8" id="anhavatar"  placeholder="upload ảnh">
				    		</div>
						</div>
					</div>
					<div class="col-sm-6">
						
							<div class="form-group row">
						    <label class="col-sm-4 text-xs-right" for="ten">Tên nhân viên</label>
						    <input name="ten" type="text" class="form-control col-sm-8" id="ten"  placeholder="Tên nhân viên" value="<?= $value['ten'] ?>">	    
						
						</div>
					</div>
				    
				</div>
				
				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label class="col-sm-4 text-xs-right" for="tuoi">Tuổi</label>
				    		<input value="<?= $value['tuoi'] ?>" name="tuoi" type="number" class="form-control col-sm-8" id="tuoi"  placeholder="Tuổi nhân viên">
						</div>
						
					</div>
					<div class="col-sm-6">
						<div class="row">
							<label class="col-sm-4 text-xs-right" for="sdt">Số điện thoại</label>
				    		<input value="<?= $value['sdt'] ?>" name="sdt" type="text" class="form-control col-sm-8" id="sdt"  placeholder="sdt">
						</div>
					</div>
				    	    
				</div>
				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label class="col-sm-4 text-xs-right" for="sodonhang">Số đơn hàng</label>
				    		<input value="<?= $value['sodonhang'] ?>" name="sodonhang" type="number" class="form-control col-sm-8" id="sodonhang"  placeholder="sodonhang">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<label class="col-sm-4 text-xs-right" for="linkfb">Link fb</label>
				    		<input value="<?= $value['linkfb'] ?>" name="linkfb" type="text" class="form-control col-sm-8" id="linkfb"  placeholder="linkfb">
						</div>
					</div>
				</div>

				<?php endforeach ?>
			  <div class="form-group row text-xs-center">
			  	<div class=" col-sm-12">
			  		<button type="submit" class="btn btn-outline-success btn-lg ">Lưu</button>
			  	</div>
			    	
			  </div>
			  
			
			</form>
		
	</div>
</body>
</html>