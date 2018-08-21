<div class="container form-app">
	<div class="row my-3">
        <div class="col-12 offset-lg-3 col-lg-6 col-md-12">
        	<?php if (isset($_SESSION['error'])): ?>
        		<script>
        			swal({
					  	title: "Error!",
					  	text: "<?php echo $_SESSION['error'] ?>",
					  	type: "error",
					});
        		</script>
				<?php unset($_SESSION['error']) ?>
        	<?php endif ?>
        	<?php if (isset($_SESSION['success'])): ?>
        		<script>
        			const toast = swal.mixin({
					  toast: true,
					  position: 'bottom-end',
					  showConfirmButton: false,
					  timer: 5000
					});

					toast({
					  type: 'success',
					  title: '<?php echo $_SESSION['success'][1] ?>'
					})
        		</script>
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
					    	<div class="form-group col-md-6">
					      		<label for="tanggalBerangkat">Tgl. Keberangkatan</label>
					      		<div class="input-group">
					      			<input type="date" class="form-control" id="tanggalBerangkat" name="tanggalBerangkat" placeholder="Tgl. Keberangkatan" required>
					      			<div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
									</div>
					      		</div>
					      		<div class="invalid-feedback">Anda harus mengisi Tanggal Keberangkatan</div>
					    	</div>
					    	<div class="form-group col-md-6">
					      		<label for="namaPengguna">Nama Pengguna</label>
					      		<input id="namaPengguna" name="namaPengguna" class="form-control" placeholder="Nama Pengguna" value="<?php echo $this->home_model->get_users_data($_SESSION['go_email'])->nama ?>" required/>
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
							<!-- <div class="form-group col-md-6">
						    	<label for="noPol">No. Polisi</label>
						    	<div class="input-group">
						    		<input type="text" class="form-control" id="noPol" name="noPol" placeholder='ex: "B 1234 CD"' list="nopol" required />
						    		<?php $nopol = $this->admin_model->get_permohonan_column('noPol') ?>
							    	<datalist id="nopol">
							    		<?php foreach ($nopol as $no): ?>
							    			<option value="<?php echo $no->noPol ?>"><?php echo $no->noPol ?></option>
							    		<?php endforeach ?>
							    	</datalist>
						    		<div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-car"></i></span>
									</div>
						    	</div>
						    	<div class="invalid-feedback">Anda harus mengisi Tujuan</div>
						  	</div> -->
					  		<div class="form-group col-md-4">
						    	<label for="satuanKerja">Satuan Kerja</label>
						    	<input type="text" class="form-control" id="satuanKerja" name="satuanKerja" list="posisi" placeholder="Satuan Kerja" value="<?php echo $this->home_model->get_users_data($_SESSION['go_email'])->posisi ?>" required />
						    	<?php $posisi = $this->admin_model->get_permohonan_column('posisi') ?>
						    	<datalist id="posisi">
						    		<option value="Commerce">Commerce</option>
						    		<option value="HRGS">HRGS</option>
						    		<option value="Finance">Finance</option>
						    		<option value="O&E">O&E</option>
						    	</datalist>
						    	<div class="invalid-feedback">Anda harus mengisi Satuan Kerja</div>
						  	</div>
						  	<!-- <div class="form-group col-md-6">
						    	<label for="namaPengemudi">Nama Pengemudi</label>
						    	<input type="text" class="form-control" id="namaPengemudi" name="pengemudi" placeholder="Nama Pengemudi" required />
						    	<div class="invalid-feedback">Anda harus mengisi Nama Pengemudi</div>
						  	</div> -->
						  	<div class="form-group col-md-12">
						    	<label for="spv">Izin ke</label>
						    	<select name="emailspv" id="spv" class="form-control" required>
						    		<?php $SPVemail = $this->admin_model->get_email_spv(); ?>
						    		<option selected disabled>Pilih perizinan</option>
						    		<?php foreach ($SPVemail as $spv): ?>
						    			<option value="<?php echo $spv->email ?>"><?php echo $spv->nama ?>, <?php echo $spv->posisi ?></option>
						    		<?php endforeach ?>
						    	</select>
						    	<div class="invalid-feedback">Anda harus mengisi Nama Pengemudi</div>
						  	</div>
					  	</div>
					  	<div class="form-group">
					  		<label for="tujuan">Tujuan</label>
					    	<textarea class="form-control" id="tujuan" name="tujuan" placeholder="Lokasi Tujuan" required></textarea>
					    	<div class="invalid-feedback">Anda harus menyertakan lokasi</div>
					  	</div>
					  	<button type="submit" class="btn btn-block btn-lg btn-primary">Tambah</button>
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