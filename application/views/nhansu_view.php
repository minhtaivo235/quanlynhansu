<!DOCTYPE html>
<html lang="en"><head>
	<title> Giao diện hiển thị danh sách nhân viên </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
	<!-- jquery upload -->
	<script type="text/javascript" src="<?php echo base_url() ?>jqueryupload/js/vendor/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>jqueryupload/js/jquery.fileupload.js"></script>
	
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body >


	

	<div class="container">
		<div class="text-xs-center">
			<h3 class="display-3">Danh sách nhân sự </h3>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="card-deck">
			<?php foreach ($mangketqua as $value): ?>
			  	<div class="col-sm-4">
				  <div class="card">
				    <img style="width: 100%;height: 350px" src="<?= $value['anhavatar'] ?>" class="card-img-top img-fluid" alt="...">
				    <div class="card-body">
				      <h5 class="card-title ten"><?= $value['ten'] ?></h5>
				      <p class="card-text tuoi">Tuổi: <?= $value['tuoi'] ?></p>
				      <p class="card-text sdt">Sdt: <?= $value['sdt'] ?></p>
				      
				      <p class="card-text sodonhang">Số đơn hàng hoàn thành: <?= $value['sodonhang'] ?></p>
				      <div style="display: flex; align-items: center;justify-content: center;margin: 0">
					    <div  class="card-text  btn btn-outline-secondary btn-xs"><small><a href="<?= $value['linkfb'] ?>" >Facebook <i class="fa fa-chevron-right"></i></a></small></div>
					    <div class="card-text  btn btn-outline-info btn-xs"><small><a href="<?= base_url() ?>index.php/nhansu/nhansu_edit/<?= $value['id'] ?>" >Sửa  <i class="fa fa-pencil"></i></a></small></div>
					    <div class="card-text  btn btn-outline-danger btn-xs"><small><a href="<?= base_url() ?>index.php/nhansu/nhansu_delete/<?= $value['id'] ?>" >Xóa  <i class="fa fa-remove"></i></a></small></div>
				      	
				      </div>
				      
				    </div>			    			  		
				  </div>
				</div>
			<?php endforeach ?>
			</div>	
		</div>	
	</div>

	<div class="container">
		<div class="text-xs-center">
			<h3 class="display-3">Thêm mới nhân sự </h3>
		</div>
	</div>
	<div class="container">
		
			<!-- <form method="post" enctype="multipart/form-data" action="index.php/nhansu/nhansu_add"> -->
				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label class="col-sm-4 text-xs-right" for="anhavatar">Ảnh đại diện</label>
				    		<input name="files[]" type="file" class="form-control col-sm-8" id="anhavatar"  placeholder="upload ảnh">
						</div>
					</div>
					<div class="col-sm-6">
						
							<div class="form-group row">
						    <label class="col-sm-4 text-xs-right" for="ten">Tên nhân viên</label>
						    <input name="ten" type="text" class="form-control col-sm-8" id="ten"  placeholder="Tên nhân viên">	    
						
						</div>
					</div>
				    
				</div>
				
				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label class="col-sm-4 text-xs-right" for="tuoi">Tuổi</label>
				    		<input name="tuoi" type="number" class="form-control col-sm-8" id="tuoi"  placeholder="Tuổi nhân viên">
						</div>
						
					</div>
					<div class="col-sm-6">
						<div class="row">
							<label class="col-sm-4 text-xs-right" for="sdt">Số điện thoại</label>
				    		<input name="sdt" type="text" class="form-control col-sm-8" id="sdt"  placeholder="sdt">
						</div>
					</div>
				    	    
				</div>
				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label class="col-sm-4 text-xs-right" for="sodonhang">Số đơn hàng</label>
				    		<input name="sodonhang" type="number" class="form-control col-sm-8" id="sodonhang"  placeholder="sodonhang">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<label class="col-sm-4 text-xs-right" for="sodonhang">Link fb</label>
				    		<input name="linkfb" type="text" class="form-control col-sm-8" id="linkfb"  placeholder="linkfb">
						</div>
					</div>
				</div>

			  <div class="form-group row text-xs-center">
			  	<div class=" col-sm-12">
			  		<button type="button" class="btn btn-outline-success btn-sm nutxulyajax">Thêm mới (Bằng ajax)</button>
			  		<button type="reset" class="btn btn-outline-danger btn-sm ">Nhập lại</button>
			  	</div>
			    	
			  </div>
			  
			
			<!-- </form> -->
		
	</div>
	<script>

		duongdan = '<?php echo base_url() ?>';
		$('#anhavatar').fileupload({
			dataType:'json',
			url: duongdan + 'index.php/nhansu/uploadfile',
			done: function(e,data){
				$.each(function(index, el) {
					
				});
			}
		})

		$('.nutxulyajax').click(function(event) {
			/* Act on the event */
			$.ajax({
			url: 'ajax_add',
			type: 'POST',
			dataType: 'json',
			data: {
				
				ten: $('#ten').val(),
				tuoi: $('#tuoi').val(),
				sdt: $('#sdt').val(),
				linkfb: $('#linkfb').val(),
				sodonhang: $('#sodonhang').val()				
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
			noidung = '<div class="col-sm-4">';
			noidung +='<div class="card">';
			noidung +='<img style="width: 100%;height: 350px" src="http://localhost:8001/quanlynhansu/file_upload/c.jpg" class="card-img-top img-fluid" alt="...">';
			noidung +=	    '<div class="card-body">'
			noidung +=	      '<h5 class="card-title ten">' + $('#ten').val() + '</h5>';
			noidung +=	      '<p class="card-text tuoi">Tuổi:' + $('#tuoi').val() + '</p>';
			noidung +=	      '<p class="card-text sdt">Sdt:' + $('#sdt').val() + '</p>';
				      
			noidung +=	      '<p class="card-text sodonhang">Số đơn hàng hoàn thành:' + $('#sodonhang').val() + '</p>';
			noidung +=	      '<div style="display: flex; align-items: center;justify-content: center;margin: 0">';
			noidung +=		    '<div  class="card-text  btn btn-outline-secondary btn-xs"><small><a href="'+ $('#linkfb').val() +'" >Facebook <i class="fa fa-chevron-right"></i></a></small></div>';
			noidung += '<div class="card-text  btn btn-outline-info btn-xs"><small><a href="<?= base_url() ?>index.php/nhansu/nhansu_edit/<?= $value['id'] ?>" >Sửa  <i class="fa fa-pencil"></i></a></small></div>';
			noidung +=		    '<div class="card-text  btn btn-outline-danger btn-xs"><small><a href="<?= base_url() ?>index.php/nhansu/nhansu_delete/<?= $value['id'] ?>" >Xóa  <i class="fa fa-remove"></i></a></small></div>			';
				      	
			noidung +=	      '</div>';
				      
			noidung +=	    '</div>';			    			  		
			noidung +=	  '</div>';
			noidung +=	'</div>';
			$('.card-deck').append(noidung);

			// reset nội dung đã điền
			$('#ten').val('');
			$('#tuoi').val('');
			$('#sdt').val('');
			$('#linkfb').val('');
			$('#sodonhang').val('');
		});
		});
		
		
	</script>

	
</body>
</html>