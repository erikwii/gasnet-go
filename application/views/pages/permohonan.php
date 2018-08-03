<div class="container form-app">
	<div class="row my-3">
        <div class="col-8 offset-2 col-lg-8 col-md-4">
        	<?php if (isset($_SESSION['error'])): ?>
        		<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <?php echo $_SESSION['error'] ?>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<?php unset($_SESSION['error']) ?>
        	<?php endif ?>
        	<?php if (isset($_SESSION['success'])): ?>
        		<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <?php echo $_SESSION['success'] ?>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<?php unset($_SESSION['success']) ?>
        	<?php endif ?>
			<div class="card">
	      		<div class="card-header">
	        		<h5 class="modal-title" id="exampleModalCenterTitle">Form Permohonan Kendaraan Operasional</h5>
	      		</div>
	      		<div class="card-body">
	      			<?php $attributes = array('class' => 'needs-validation'); ?>
	      			<?php echo form_open_multipart('permohonan/tambah_permohonan', $attributes);?>
					  	<div class="form-row">
					    	<div class="form-group col-md-5">
					      		<label for="tanggalBerangkat">Tgl. Keberangkatan</label>
					      		<div class="input-group">
					      			<input type="date" class="form-control" id="tanggalBerangkat" name="tanggalBerangkat" placeholder="Tgl. Keberangkatan" required>
					      			<div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
									</div>
					      		</div>
					      		<div class="invalid-feedback">Anda harus mengisi Tanggal Keberangkatan</div>
					    	</div>
					    	<div class="form-group col-md-7">
					      		<label for="namaPengguna">Nama Pengguna</label>
					      		<input id="namaPengguna" name="namaPengguna" class="form-control" placeholder="Nama Pengguna" required/>
					      		<div class="invalid-feedback">Anda harus mengisi Nama Pengguna</div>
					    	</div>
					  	</div>
					  	<div class="form-row">
					  		<div class="form-group col-md-4 clockpicker" id="berangkat">
					  			<label for="jamBerangkat">Jam Berangkat</label>
					  			<div class="input-group">
								    <input type="text" class="form-control" id="jamBerangkat" name="jamBerangkat" placeholder="Berangkat" required>
								    <div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-clock-o"></i></span>
									</div>
					  			</div>
							    <div class="invalid-feedback">Anda harus mengisi Jam Berangkat</div>
							</div>
					  		<div class="form-group col-md-4 clockpicker" id="kembali">
					  			<label for="jamKembali">Jam Kembali</label>
					  			<div class="input-group">
								    <input type="text" class="form-control" id="jamKembali" name="jamKembali" placeholder="Kembali" required>
								    <div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-clock-o"></i></span>
									</div>
					  			</div>
							    <div class="invalid-feedback">Anda harus mengisi Jam Kembali</div>
							</div>
							<div class="form-group col-md-4">
						    	<label for="noPol">No. Polisi</label>
						    	<input type="text" class="form-control" id="noPol" name="noPol" placeholder='ex: "B 1234 CD"' required />
						    	<div class="invalid-feedback">Anda harus mengisi Tujuan</div>
						  	</div>
					  	</div>
					  	<div class="form-row">
					  		<div class="form-group col-md-6">
						    	<label for="satuanKerja">Satuan Kerja</label>
						    	<input type="text" class="form-control" id="satuanKerja" name="satuanKerja" list="satuan" placeholder="Satuan Kerja" required />
						    	<div class="invalid-feedback">Anda harus mengisi Satuan Kerja</div>
						  	</div>
						  	<div class="form-group col-md-6">
						    	<label for="namaPengemudi">Nama Pengemudi</label>
						    	<input type="text" class="form-control" id="namaPengemudi" name="pengemudi" placeholder="Nama Pengemudi" required />
						    	<div class="invalid-feedback">Anda harus mengisi Satuan Kerja</div>
						  	</div>
					  	</div>
					  	<div class="form-group">
					  		<label for="tujuan">Tujuan</label>
					    	<textarea class="form-control" id="tujuan" name="tujuan" placeholder="Lokasi Tujuan" required></textarea>
					    	<div class="invalid-feedback">Anda harus menyertakan lokasi</div>
					  	</div>
					  	<button type="submit" class="btn btn-primary">Tambah</button>
					</form>
	      		</div>
	    	</div>
	    </div>
	</div>
</div>
<script type="text/javascript">
	$('#berangkat').clockpicker({
		autoclose: true,
	    placement: 'bottom',
	    align: 'left',
	    donetext: 'Ok'
	});

	$('#kembali').clockpicker({
		autoclose: true,
	    placement: 'bottom',
	    align: 'left',
	    donetext: 'Ok'
	});
</script>