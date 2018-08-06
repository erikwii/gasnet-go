<div class="container app">
	<div class="row my-3">
        <div class="col-12 col-lg-12 col-md-4">
        	<?php if (isset($_SESSION['error'])): ?>
        		<script>
        			swal({
					  	title: "Error!",
					  	text: "<?php echo $_SESSION['error'] ?>",
					  	icon: "error",
					});
        		</script>
				<?php unset($_SESSION['error']) ?>
        	<?php endif ?>
        	<?php if (isset($_SESSION['success'])): ?>
        		<script>
        			swal({
					  	title: "Berhasil!",
					  	text: "<?php echo $_SESSION['success'] ?>",
					  	icon: "success",
					});
        		</script>
				<?php unset($_SESSION['success']) ?>
        	<?php endif ?>
        	<div class="table-responsive">
        		<table class="table table-striped w-100" id="permohonan_table">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Hari/Tgl. Keberangkatan</th>
				      <th scope="col">Nama Pengguna</th>
				      <th scope="col">Satuan Kerja</th>
				      <th scope="col">Tujuan</th>
				      <th scope="col">Jam Berangkat</th>
				      <th scope="col">Jam Kembali</th>
				      <th scope="col">No. Polisi</th>
				      <th scope="col">Pengemudi</th>
				      <th scope="col">KM. Awal</th>
				      <th scope="col">KM. Akhir</th>
				      <th scope="col">Pemohon</th>
				      <th scope="col">Persetujuan</th>
				      <?php if ($_SESSION['go_level'] != 1): ?>
				      	<th scope="col">Setujui</th>
				      <?php endif ?>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($permohonan as $p): ?>
				  		<?php 
				  			$timestamp = strtotime($p->tanggalBerangkat);
							$day = date('D', $timestamp);
				  		?>
				  		<tr>
					      <th scope="row"><?php echo $i ?></th>
					      <td><?php echo $this->home_model->tranlate_day_to_indo($day)."/".$this->home_model->read_date($p->tanggalBerangkat) ?></td>
					      <td><?php echo $p->namaPengguna ?></td>
					      <td><?php echo $p->satuanKerja ?></td>
					      <td><?php echo $p->tujuan ?></td>
					      <td><?php echo $p->jamBerangkat ?></td>
					      <td><?php echo $p->jamKembali ?></td>
					      <td><?php echo $p->noPol ?></td>
					      <td><?php echo $p->pengemudi ?></td>
					      <td><?php echo $p->kmAwal ?></td>
					      <td><?php echo $p->kmAkhir ?></td>
					      <td><?php echo $p->nama ?></td>
					      <td>
				      		<?php if ($p->approval == 'Belum ada persetujuan'): ?>
				      			<span class="text-warning"><?php echo $p->approval ?></span>
				      		<?php elseif($p->approval == 'Disetujui Supervisor'): ?>
				      			<span class="text-success"><?php echo $p->approval ?></span>
				      		<?php elseif($p->approval == 'Disetujui Pusat'): ?>
				      			<span class="text-primary"><?php echo $p->approval ?></span>
				      		<?php else: ?>
				      			<span class="text-danger"><?php echo $p->approval ?></span>
				      		<?php endif ?>
					      </td>
					    <?php if ($_SESSION['go_level'] != 1): ?>
					      <td>
					      	<?php if ($_SESSION['go_level'] == 1): ?>
					      		<?php if ($p->approval == 'Belum ada persetujuan'): ?>
					      			<span class="text-warning"><?php echo $p->approval ?></span>
					      		<?php elseif($p->approval == 'Disetujui Supervisor'): ?>
					      			<span class="text-success"><?php echo $p->approval ?></span>
					      		<?php elseif($p->approval == 'Disetujui Pusat'): ?>
					      			<span class="text-primary"><?php echo $p->approval ?></span>
					      		<?php else: ?>
					      			<span class="text-danger"><?php echo $p->approval ?></span>
					      		<?php endif ?>
					      	<?php elseif ($_SESSION['go_level'] == 2): ?>
					      		<?php if($p->approval == 'Disetujui Supervisor'): ?>
					      			<a href="<?php echo base_url() ?>spv/batal_setuju/<?php echo $p->IDpermohonan ?>" class="btn btn-outline-secondary">Batal Setuju</a>
					      		<?php elseif($p->approval == 'Disetujui Pusat'): ?>
					      			<span class="text-primary">Telah <?php echo $p->approval ?></span>
					      		<?php elseif($p->approval == 'Tidak disetujui Supervisor'): ?>
					      			<a href="<?php echo base_url() ?>spv/setuju/<?php echo $p->IDpermohonan ?>" class="btn btn-outline-primary">Setujui</a>
					      		<?php elseif($p->approval == 'Tidak disetujui Pusat'): ?>
					      			<span class="text-danger">Pusat tidak setuju</span>
					      		<?php else: ?>
					      			<div class="btn-group">
							      		<a href="<?php echo base_url() ?>spv/setuju/<?php echo $p->IDpermohonan ?>" class="btn btn-outline-primary">Setuju</a>
							      		<a href="<?php echo base_url() ?>spv/tidak_setuju/<?php echo $p->IDpermohonan ?>" class="btn btn-outline-secondary">Tidak</a>
							      	</div>
					      		<?php endif ?>
					      	<?php else: ?>
					      		<?php if($p->approval == 'Disetujui Supervisor'): ?>
					      			<div class="btn-group">
							      		<a href="<?php echo base_url() ?>admin/setuju/<?php echo $p->IDpermohonan ?>" class="btn btn-outline-primary">Setuju</a>
							      		<a href="<?php echo base_url() ?>admin/tidak_setuju/<?php echo $p->IDpermohonan ?>" class="btn btn-outline-secondary">Tidak</a>
							      	</div>
					      		<?php elseif($p->approval == 'Disetujui Pusat'): ?>
					      			<a href="<?php echo base_url() ?>admin/batal_setuju/<?php echo $p->IDpermohonan ?>" class="btn btn-outline-secondary">Batal Setuju</a>
					      		<?php elseif($p->approval == 'Tidak disetujui Supervisor'): ?>
					      			<span class="text-danger"><?php echo $p->approval ?></span>
					      		<?php elseif($p->approval == 'Tidak disetujui Pusat'): ?>
							      	<a href="<?php echo base_url() ?>admin/setuju/<?php echo $p->IDpermohonan ?>" class="btn btn-outline-primary">Setujui</a>
							    <?php else: ?>
							    	<span class="text-warning">Belum ada persetujuan Supervisor</span>
					      		<?php endif ?>
					      	<?php endif ?>
					      </td>
					  	<?php endif; ?>
					      <td>
					      	<div class="btn-group">
					      		<button class="btn btn-info" onclick="lihat_permohonan(<?php echo $p->IDpermohonan ?>)">Lihat Data</button>
					      		<button class="btn btn-warning" onclick="edit_permohonan(<?php echo $p->IDpermohonan ?>)">Edit</button>
					      		<button class="btn btn-danger" onclick='hapus_permohonan(<?php echo $p->IDpermohonan ?>)'>Hapus</button>
					      	</div>
					      </td>
					    </tr>
					    <?php $i++; ?>
				  	<?php endforeach ?>
				  </tbody>
				</table>
        	</div>
        </div>
    </div>
    <!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalCenterTitle">Form Permohonan</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	      			<?php $attributes = array('class' => 'needs-validation'); ?>
	      			<?php echo form_open_multipart('admin/tambah_permohonan/', $attributes);?>
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
					  		<div class="form-group col-md-4" id="berangkat">
					  			<label for="jamBerangkat">Jam Berangkat</label>
					  			<div class="input-group">
								    <input type="text" class="form-control" id="jamBerangkat" value="" name="jamBerangkat" placeholder="Berangkat" required>
								    <div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-clock-o"></i></span>
									</div>
					  			</div>
							    <div class="invalid-feedback">Anda harus mengisi Jam Berangkat</div>
							</div>
					  		<div class="form-group col-md-4" id="kembali">
					  			<label for="jamKembali">Jam Kembali</label>
					  			<div class="input-group">
					  				<input type="text" class="form-control" id="jamKembali" name="jamKembali
								    " placeholder="Kembali" required>
								    <div class="input-group-append">
								        <span class="input-group-text"><span class="fa fa-clock-o"></span></span>
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
	<!-- Modal -->

	<!-- Edit Modal -->
	<div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalCenterTitle">Edit Permohonan <span id="tgledit"></span></h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	      			<?php $attributes = array('class' => 'needs-validation', 'id'=>'editform'); ?>
	      			<?php if ($_SESSION['go_level'] == 1): ?>
	      				<?php echo form_open_multipart('permohonan/edit_permohonan/', $attributes);?>
	      			<?php else: ?>
						<?php echo form_open_multipart('admin/edit_permohonan/', $attributes);?>
	      			<?php endif ?>
					  	<div class="form-row">
					  		<input type="number" name="IDpermohonan" class="d-none">
					    	<div class="form-group col-md-5">
					      		<label for="edittanggalBerangkat">Tgl. Keberangkatan</label>
					      		<div class="input-group">
					      			<input type="text" class="form-control datepicker" id="edittanggalBerangkat" name="edittanggalBerangkat" placeholder="Tgl. Keberangkatan" required>
					      			<div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
									</div>
					      		</div>
					      		<div class="invalid-feedback">Anda harus mengisi Tanggal Keberangkatan</div>
					    	</div>
					    	<div class="form-group col-md-7">
					      		<label for="editnamaPengguna">Nama Pengguna</label>
					      		<input id="editnamaPengguna" name="editnamaPengguna" class="form-control" placeholder="Nama Pengguna" required/>
					      		<div class="invalid-feedback">Anda harus mengisi Nama Pengguna</div>
					    	</div>
					  	</div>
					  	<div class="form-row">
					  		<div class="form-group col-md-4" id="editberangkat">
					  			<label for="editjamBerangkat">Jam Berangkat</label>
					  			<div class="input-group">
								    <input type="text" class="form-control" id="editjamBerangkat" name="editjamBerangkat" placeholder="Berangkat" required>
								    <div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-clock-o"></i></span>
									</div>
					  			</div>
							    <div class="invalid-feedback">Anda harus mengisi Jam Berangkat</div>
							</div>
					  		<div class="form-group col-md-4" id="editkembali">
					  			<label for="editjamKembali">Jam Kembali</label>
					  			<div class="input-group">
					  				<input type="text" class="form-control" id="editjamKembali" value="" name="editjamKembali" placeholder="Kembali" required>
								    <div class="input-group-append">
								        <span class="input-group-text"><span class="fa fa-clock-o"></span></span>
								    </div>
					  			</div>
							    <div class="invalid-feedback">Anda harus mengisi Jam Kembali</div>
							</div>
							<div class="form-group col-md-4">
						    	<label for="editnoPol">No. Polisi</label>
						    	<input type="text" class="form-control" id="editnoPol" name="editnoPol" placeholder='ex: "B 1234 CD"' required />
						    	<div class="invalid-feedback">Anda harus mengisi Tujuan</div>
						  	</div>
					  	</div>
					  	<div class="form-row">
					  		<div class="form-group col-md-6">
						    	<label for="editsatuanKerja">Satuan Kerja</label>
						    	<input type="text" class="form-control" id="editsatuanKerja" name="editsatuanKerja" list="satuan" placeholder="Satuan Kerja" required />
						    	<div class="invalid-feedback">Anda harus mengisi Satuan Kerja</div>
						  	</div>
						  	<div class="form-group col-md-6">
						    	<label for="editpengemudi">Nama Pengemudi</label>
						    	<input type="text" class="form-control" id="editpengemudi" name="editpengemudi" placeholder="Nama Pengemudi" required />
						    	<div class="invalid-feedback">Anda harus mengisi Satuan Kerja</div>
						  	</div>
					  	</div>
					  	<div class="form-group">
					  		<label for="edittujuan">Tujuan</label>
					    	<textarea class="form-control" id="edittujuan" name="edittujuan" placeholder="Lokasi Tujuan" required></textarea>
					    	<div class="invalid-feedback">Anda harus menyertakan lokasi</div>
					  	</div>
					  	<button type="submit" class="btn btn-primary">Edit</button>
					</form>
	      		</div>
	    	</div>
	  	</div>
	</div>
	<!-- Edit Modal -->

	<!-- Lihat Modal -->
	<div class="modal fade" id="lihatModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalCenterTitle">Data Permohonan <span id="tgldata"></span></h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	      			<form id="lihatform">
	      				<div class="form-group">
					  		<label for="lihatnama">Nama Pemohon</label>
					    	<input type="text" class="form-control" id="lihatnama" name="lihatnama" placeholder="Nama Pemohon" readonly>
					    	<div class="invalid-feedback">Anda harus menyertakan lokasi</div>
					  	</div>
					  	<div class="form-row">
					    	<div class="form-group col-md-5">
					      		<label for="lihattanggalBerangkat">Tgl. Keberangkatan</label>
					      		<div class="input-group">
					      			<input type="text" class="form-control" id="lihattanggalBerangkat" name="lihattanggalBerangkat" placeholder="Tgl. Keberangkatan" readonly>
					      			<div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
									</div>
					      		</div>
					      		<div class="invalid-feedback">Anda harus mengisi Tanggal Keberangkatan</div>
					    	</div>
					    	<div class="form-group col-md-7">
					      		<label for="lihatnamaPengguna">Nama Pengguna</label>
					      		<input id="lihatnamaPengguna" name="lihatnamaPengguna" class="form-control" placeholder="Nama Pengguna" readonly />
					      		<div class="invalid-feedback">Anda harus mengisi Nama Pengguna</div>
					    	</div>
					  	</div>
					  	<div class="form-row">
					  		<div class="form-group col-md-4">
					  			<label for="lihatjamBerangkat">Jam Berangkat</label>
					  			<div class="input-group">
								    <input type="text" class="form-control" id="lihatjamBerangkat" name="lihatjamBerangkat" placeholder="Berangkat" readonly>
								    <div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-clock-o"></i></span>
									</div>
					  			</div>
							    <div class="invalid-feedback">Anda harus mengisi Jam Berangkat</div>
							</div>
					  		<div class="form-group col-md-4">
					  			<label for="lihatjamKembali">Jam Kembali</label>
					  			<div class="input-group">
					  				<input type="text" class="form-control" id="lihatjamKembali" name="lihatjamKembali
								    " placeholder="Kembali" readonly>
								    <div class="input-group-append">
								        <span class="input-group-text"><span class="fa fa-clock-o"></span></span>
								    </div>
					  			</div>
							    <div class="invalid-feedback">Anda harus mengisi Jam Kembali</div>
							</div>
							<div class="form-group col-md-4">
						    	<label for="lihatnoPol">No. Polisi</label>
						    	<input type="text" class="form-control" id="lihatnoPol" name="lihatnoPol" placeholder='ex: "B 1234 CD"' readonly />
						    	<div class="invalid-feedback">Anda harus mengisi Tujuan</div>
						  	</div>
					  	</div>
					  	<div class="form-row">
					  		<div class="form-group col-md-6">
						    	<label for="lihatsatuanKerja">Satuan Kerja</label>
						    	<input type="text" class="form-control" id="lihatsatuanKerja" name="lihatsatuanKerja" list="satuan" placeholder="Satuan Kerja" readonly />
						    	<div class="invalid-feedback">Anda harus mengisi Satuan Kerja</div>
						  	</div>
						  	<div class="form-group col-md-6">
						    	<label for="lihatpengemudi">Nama Pengemudi</label>
						    	<input type="text" class="form-control" id="lihatpengemudi" name="lihatpengemudi" placeholder="Nama Pengemudi" readonly />
						    	<div class="invalid-feedback">Anda harus mengisi Satuan Kerja</div>
						  	</div>
					  	</div>
					  	<div class="form-group">
					  		<label for="lihattujuan">Tujuan</label>
					    	<textarea class="form-control" id="lihattujuan" name="lihattujuan" placeholder="Lokasi Tujuan" readonly></textarea>
					    	<div class="invalid-feedback">Anda harus menyertakan lokasi</div>
					  	</div>
					</form>
	      		</div>
	    	</div>
	  	</div>
	</div>
	<!-- Lihat Modal -->
</div>
<script>

	$('.datepicker').datepicker({
	    format: 'dd/mm/yyyy',
	    startDate: '-3d',
	    todayHighlight: true,
	    language: 'id',
	    autoclose: true
	});

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

	$('#editberangkat').clockpicker({
		autoclose: true,
	    placement: 'bottom',
	    align: 'left',
	    donetext: 'Ok'
	});

	$('#editkembali').clockpicker({
		autoclose: true,
	    placement: 'bottom',
	    align: 'left',
	    donetext: 'Ok'
	});

	function read_date(date) {
		var arrdate = date.split('-');

		var bulan = {'01': 'Januari', '02': 'Februari', '03': 'Maret','04': 'April', '05': 'Mei', '06': 'Juni','07': 'Juli', '08': 'Agustus', '09': 'September','10': 'Oktober', '11': 'November', '12': 'Desember'};

		return arrdate[2]+" "+bulan[arrdate[1]]+" "+arrdate[0];
	}

    function edit_permohonan(id){
        $('#editform')[0].reset();

        $.ajax({
            url : "<?php echo site_url('admin/data_permohonan/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            	data[0].tanggalPermohonan

                $('[name="IDpermohonan"]').val(data[0].IDpermohonan);
                $('[name="edittanggalBerangkat"]').val(data[0].tanggalBerangkat);
                $('[name="editnamaPengguna"]').val(data[0].namaPengguna);
                $('[name="editsatuanKerja"]').val(data[0].satuanKerja);
                $('[name="edittujuan"]').val(data[0].tujuan);
                $('[name="editjamBerangkat"]').val(data[0].jamBerangkat);
                $('#editjamKembali').val(data[0].jamKembali);
                $('[name="editnoPol"]').val(data[0].noPol);
                $('[name="editpengemudi"]').val(data[0].pengemudi);
                $('#tgledit').text(read_date(data[0].tanggalPermohonan));
                $('#editModalCenter').modal('show');

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log('failed get data');
            }
        });
    }

    function lihat_permohonan(id){
        $('#lihatform')[0].reset();

        $.ajax({
            url : "<?php echo site_url('admin/data_permohonan/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="lihattanggalBerangkat"]').val(read_date(data[0].tanggalBerangkat));
                $('[name="lihatnamaPengguna"]').val(data[0].namaPengguna);
                $('[name="lihatsatuanKerja"]').val(data[0].satuanKerja);
                $('[name="lihattujuan"]').val(data[0].tujuan);
                $('#lihatjamKembali').val(data[0].jamKembali);
                $('[name="lihatjamBerangkat"]').val(data[0].jamBerangkat);
                $('[name="lihatnoPol"]').val(data[0].noPol);
                $('[name="lihatpengemudi"]').val(data[0].pengemudi);
                $('[name="lihatnama"]').val(data[0].nama);
                $('#tgldata').text(read_date(data[0].tanggalPermohonan));
                $('#lihatModalCenter').modal('show');

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log('failed get data');
            }
        });
    }

    function hapus_permohonan(id) {
    	swal({
		  	title: "Apa Anda Yakin?",
		  	text: "Saat menghapusnya Anda tidak akan bisa mengembalikannya seperti semula!",
		  	icon: "warning",
		  	buttons: true,
		  	dangerMode: true,
		})
		.then((willDelete) => {
		  	if (willDelete) {
		    	window.location = '<?php echo base_url() ?>admin/hapus_permohonan/'+id;
		  	} else {
		    	swal("Data anda aman!");
		  	}
		});
    }

	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function() {
	  'use strict';
	  window.addEventListener('load', function() {
	    // Fetch all the forms we want to apply custom Bootstrap validation styles to
	    var forms = document.getElementsByClassName('needs-validation');
	    // Loop over them and prevent submission
	    var validation = Array.prototype.filter.call(forms, function(form) {
	      form.addEventListener('submit', function(event) {
	        if (form.checkValidity() === false) {
	          event.preventDefault();
	          event.stopPropagation();
	        }
	        form.classList.add('was-validated');
	      }, false);
	    });
	  }, false);
	})();
</script>

<script>

	$(document).ready(function(){
		if(!$("table#permohonan_table tr td").hasClass('null')) {
			var preRegTable = $('#permohonan_table').DataTable({
				info: false,
				dom: '<"top"B>flt<"bottom"p><"clear">',
				oLanguage: {sLengthMenu: "_MENU_"},
				lengthMenu: [[5, 10, 25, 50, -1], ["5 Rows","10 Rows", "25 Rows", "50 Rows", "All"]],
				order: [[0, "asc"]],
				"columnDefs": [
		            {
		                "targets": [ 5 ],
		                "visible": false
		            },
		            {
		                "targets": [ 6 ],
		                "visible": false
		            },
		            {
		                "targets": [ 7 ],
		                "visible": false
		            },
		            {
		                "targets": [ 8 ],
		                "visible": false
		            },
		            {
		                "targets": [ 9 ],
		                "visible": false
		            },
		            {
		                "targets": [ 10 ],
		                "visible": false
		            },
		            {
		                "targets": [ 11 ],
		                "visible": false
		            }
		            <?php if($_SESSION['go_level'] == 0 || $_SESSION['go_level'] == 3): ?>
		            	,
			            {
			                "targets": [ 12 ],
			                "visible": false
			            }
		            <?php endif; ?>
		        ],
				buttons: [
		            {
		                extend: 'excelHtml5',
		                exportOptions: {
		                    columns: [0,1,2,3,5,4,6,7,8,9,10,11,12]
		                }
		            }
		        ]
			});
		}
	});
</script>
