<div class="container app">
	<div class="row my-3">
        <div class="col-12 col-lg-12 col-md-12">
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
        			swal({
					  	title: "<?php echo $_SESSION['success'][0] ?>",
					  	text: "<?php echo $_SESSION['success'][1] ?>",
					  	type: "success",
					});
        		</script>
				<?php unset($_SESSION['success']) ?>
        	<?php endif ?>
        	<div class="table-responsive">
        		<table class="table table-responsive table-striped w-100" style="min-width: 100%" id="permohonan_table">
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
				      <th scope="col">Persekot</th>
				      <th scope="col">Pemohon</th>
				      <th scope="col">Persetujuan</th>
				      <?php if ($_SESSION['go_level'] == 2): ?>
				      	<th scope="col">Setujui</th>
				      <?php endif ?>
				      <?php if ($_SESSION['go_level'] == 3 || $_SESSION['go_level'] == 0): ?>
				      	<th scope="col">Print</th>
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
					      <td><?php echo $p->persekot ?></td>
					      <td><?php echo $p->nama ?></td>
					      <td>
					      	<!-- Bagian keterangan -->
				      		<?php if ($p->approval == 'Belum ada persetujuan'): ?>
				      			<span class="text-warning"><?php echo $p->approval ?></span>
				      		<?php elseif($p->approval == 'Disetujui Supervisor'): ?>
				      			<span class="text-success"><?php echo $p->approval ?></span>
				      		<?php elseif($p->approval == 'Disetujui Pusat'): ?>
				      			<span class="text-primary"><?php echo $p->approval ?></span>
				      		<?php else: ?>
				      			<span class="text-danger"><?php echo $p->approval ?></span>
				      		<?php endif ?>
				      		<!-- Bagian keterangan -->
					      </td>

					      <!-- Bagian Approval -->
					    <?php if ($_SESSION['go_level'] == 2): ?>
					      <td>
					      	<!-- keterangn Approval pada users -->
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
					      	<!-- keterangn Approval pada users -->

					      	<!-- bagian persetujuan oleh Supervisor -->
					      	<?php elseif ($_SESSION['go_level'] == 2): ?>
					      		<?php if($p->approval == 'Disetujui Supervisor'): ?>
					      			<a href="<?php echo base_url() ?>spv/batal_setuju/<?php echo $p->IDpermohonan ?>" class="btn btn-sm btn-outline-secondary">Batal Setuju</a>
					      		<?php elseif($p->approval == 'Disetujui Pusat'): ?>
					      			<span class="text-primary">Telah <?php echo $p->approval ?></span>
					      		<?php elseif($p->approval == 'Tidak disetujui Supervisor'): ?>
					      			<a href="<?php echo base_url() ?>spv/setuju/<?php echo $p->IDpermohonan ?>" class="btn btn-sm btn-outline-primary">Setujui</a>
					      		<?php elseif($p->approval == 'Tidak disetujui Pusat'): ?>
					      			<span class="text-danger">Pusat tidak setuju</span>
					      		<?php else: ?>
					      			<div class="btn-group">
							      		<a href="<?php echo base_url() ?>spv/setuju/<?php echo $p->IDpermohonan ?>" class="btn btn-sm btn-outline-primary">Setuju</a>
							      		<a href="<?php echo base_url() ?>spv/tidak_setuju/<?php echo $p->IDpermohonan ?>" class="btn btn-sm btn-outline-secondary">Tidak</a>
							      	</div>
					      		<?php endif ?>
					      	<!-- bagian persetujuan oleh Supervisor -->
					      	<?php endif ?>
					      </td>
					  	<?php endif; ?>
					  	<!-- Bagian Approval -->
						
						<?php if ($_SESSION['go_level'] == 3 || $_SESSION['go_level'] == 0): ?>
					      <td>
					      	<!-- Bagian Print Form -->
					      	<?php if ($p->approval == 'Disetujui Supervisor'): ?>
					      		<?php if ($p->pengemudi == null || $p->noPol == null): ?>
					      			<button class="btn btn-sm btn-warning" onclick="tindak_lanjut_permohonan(<?php echo $p->IDpermohonan ?>)"><i class="fa fa-file-o"></i> Print</button>
					      		<?php else: ?>
									<a href="<?php echo base_url('permohonan/cetakform/').$p->IDpermohonan ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-o"></i> Print</a>
					      		<?php endif ?>
					      	<?php else: ?>
					      		<button class="btn btn-sm btn-secondary" disabled><i class="fa fa-file-o"></i> Print</button>
					      	<?php endif ?>
					      	<!-- Bagian Print Form -->
					      </td>
						<?php endif ?>
					  	
					      <td>
					      	<div class="btn-group">
					      		<button class="btn btn-sm btn-primary" onclick="lihat_permohonan(<?php echo $p->IDpermohonan ?>)">Lihat Lengkap</button>
					      		<button class="btn btn-sm btn-warning" onclick="edit_permohonan(<?php echo $p->IDpermohonan ?>)">Edit</button>
					      		<button class="btn btn-sm btn-danger" onclick='hapus_permohonan(<?php echo $p->IDpermohonan ?>)'>Hapus</button>
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
	
	<!-- tindak lanjut Modal -->
	<div class="modal fade" id="TDModalCenter" tabindex="-1" role="dialog" aria-labelledby="TDModalCenterTitle" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalCenterTitle">Isi Kelengkapan</span></h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	      			<?php $attributes = array('class' => 'needs-validation', 'id'=>'TDform'); ?>
					<?php echo form_open_multipart('admin/tindak_lanjut_permohonan/', $attributes);?>
						<input type="number" name="TDIDpermohonan" class="d-none">
					  	<div class="form-row">
							<div class="form-group col-md-6">
						    	<label for="TDnoPol">No. Polisi</label>
						    	<input type="text" class="form-control" id="TDnoPol" name="TDnoPol" placeholder='B 1234 CD' required list="nopol" />
						    	<?php $nopol = $this->admin_model->get_permohonan_column('noPol') ?>
						    	<datalist id="nopol">
						    		<?php foreach ($nopol as $no): ?>
						    			<option value="<?php echo $no->noPol ?>"><?php echo $no->noPol ?></option>
						    		<?php endforeach ?>
						    	</datalist>
						    	<div class="invalid-feedback">Anda harus mengisi No Polisi</div>
						  	</div>
						  	<div class="form-group col-md-6">
						    	<label for="TDpengemudi">Nama Pengemudi</label>
						    	<input type="text" class="form-control" id="TDpengemudi" name="TDpengemudi" placeholder="Nama Pengemudi" required />
						    	<div class="invalid-feedback">Anda harus mengisi Satuan Kerja</div>
						  	</div>
						  	<div class="form-group col-md-3">
						    	<label for="TDkmAwal">KM Awal</label>
						    	<input type="number" class="form-control" id="TDkmAwal" name="TDkmAwal" list="satuan" placeholder="KM Awal" />
						    	<div class="invalid-feedback">Anda harus mengisi KM Awal</div>
						  	</div>
						  	<div class="form-group col-md-3">
						    	<label for="TDkmAkhir">KM Akhir</label>
						    	<input type="number" class="form-control" id="TDkmAkhir" name="TDkmAkhir" placeholder="KM Akhir"/>
						    	<div class="invalid-feedback">Anda harus mengisi KM AKhir</div>
						  	</div>
						  	<div class="form-group col-md-6">
						    	<label for="TDpersekot">Persekot</label>
						    	<div class="input-group">
							    	<div class="input-group-prepend">
								        <span class="input-group-text">Rp.</span>
								    </div>
							    	<input type="number" class="form-control" id="TDpersekot" name="TDpersekot" placeholder="Persekot"/>
						    	</div>
						  	</div>
					  	</div>
					  	<button type="submit" class="btn btn-lg btn-block btn-primary">GO!</button>
					</form>
	      		</div>
	    	</div>
	  	</div>
	</div>
	<!-- tindak lanjut Modal -->

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
	      			<?php elseif ($_SESSION['go_level'] == 2): ?>
	      				<?php echo form_open_multipart('spv/edit_permohonan/', $attributes);?>
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
						    	<input type="text" class="form-control" id="editnoPol" name="editnoPol" placeholder='ex: "B 1234 CD"'  />
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
						    	<input type="text" class="form-control" id="editpengemudi" name="editpengemudi" placeholder="Nama Pengemudi"  />
						    	<div class="invalid-feedback">Anda harus mengisi Satuan Kerja</div>
						  	</div>
						<?php if ($_SESSION['go_level'] == 0 || $_SESSION['go_level'] == 3): ?>
						  	<div class="form-group col-md-3">
						    	<label for="editkmAwal">KM Awal</label>
						    	<input type="number" class="form-control" id="editkmAwal" name="editkmAwal" list="satuan" placeholder="KM Awal"  />
						  	</div>
						  	<div class="form-group col-md-3">
						    	<label for="editkmAkhir">KM Akhir</label>
						    	<input type="number" class="form-control" id="editkmAkhir" name="editkmAkhir" placeholder="KM Akhir"/>
						  	</div>
						  	<div class="form-group col-md-6">
						    	<label for="editpersekot">Persekot</label>
						    	<div class="input-group">
							    	<div class="input-group-prepend">
								        <span class="input-group-text">Rp.</span>
								    </div>
							    	<input type="number" class="form-control" id="editpersekot" name="editpersekot" placeholder="Persekot"/>
						    	</div>
						  	</div>
						<?php endif ?>
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
	      		<div class="modal-header bg-primary text-white">
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
						    	<input type="text" class="form-control" id="lihatnoPol" name="lihatnoPol" placeholder='No. Pol' readonly />
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
						  	<div class="form-group col-md-3">
						    	<label for="lihatkmAwal">KM Awal</label>
						    	<input type="number" class="form-control" id="lihatkmAwal" name="lihatkmAwal" list="satuan" placeholder="KM Awal" readonly/>
						  	</div>
						  	<div class="form-group col-md-3">
						    	<label for="lihatkmAkhir">KM Akhir</label>
						    	<input type="number" class="form-control" id="lihatkmAkhir" name="lihatkmAkhir" placeholder="KM Akhir" readonly />
						  	</div>
						  	<div class="form-group col-md-6">
						    	<label for="lihatpersekot">Persekot</label>
						    	<div class="input-group">
							    	<div class="input-group-prepend">
								        <span class="input-group-text">Rp.</span>
								    </div>
							    	<input type="number" class="form-control" id="lihatpersekot" name="lihatpersekot" placeholder="Persekot" readonly />
						    	</div>
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

	function tindak_lanjut_permohonan(id) {
		$('#TDform')[0].reset();

        $.ajax({
            url : "<?php echo site_url('admin/data_permohonan/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            	data[0].tanggalPermohonan

                $('[name="TDIDpermohonan"]').val(data[0].IDpermohonan);
                $('[name="TDnoPol"]').val(data[0].noPol);
                $('[name="TDpengemudi"]').val(data[0].pengemudi);
                $('[name="TDkmAwal"]').val(data[0].kmAwal);
                $('[name="TDkmAkhir"]').val(data[0].kmAkhir);
                $('[name="TDpersekot"]').val(data[0].persekot);
                $('#TDModalCenter').modal('show');

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log('failed get data');
            }
        });
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
                $('[name="editkmAwal"]').val(data[0].kmAwal);
                $('[name="editkmAkhir"]').val(data[0].kmAkhir);
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
                $('[name="lihatkmAwal"]').val(data[0].kmAwal);
                $('[name="lihatkmAkhir"]').val(data[0].kmAkhir);
                $('[name="lihatpersekot"]').val(data[0].persekot);
                $('#tgldata').text(read_date(data[0].tanggalPermohonan));
                var wow = $("#lihatpersekot").val();
                wow = parseInt(wow).toLocaleString('id');
                $("#lihatpersekot").val(wow);
                $('#lihatModalCenter').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log('failed get data');
            }
        });
    }

    function hapus_permohonan(id) {
    	const swalWithBootstrapButtons = swal.mixin({
		  	confirmButtonClass: 'btn btn-danger mx-2',
		  	cancelButtonClass: 'btn btn-primary mx-2',
		  	buttonsStyling: false,
		})

		swalWithBootstrapButtons({
		  	title: 'Apa Anda Yakin?',
		  	text: "Saat menghapusnya Anda tidak akan bisa mengembalikannya seperti semula!",
		  	type: 'warning',
		  	showCancelButton: true,
		  	showCloseButton: true,
		  	confirmButtonText: 'Ya, Hapus!',
		  	cancelButtonText: 'Batalkan!',
		  	reverseButtons: true
		}).then((result) => {
		  	if (result.value) {
		    	<?php if($_SESSION['go_level'] == 1): ?>
	  				window.location = '<?php echo base_url() ?>permohonan/hapus_permohonan/'+id;
	  			<?php elseif($_SESSION['go_level'] == 2): ?>
		  			window.location = '<?php echo base_url() ?>spv/hapus_permohonan/'+id;
	  			<?php else: ?>
	    			window.location = '<?php echo base_url() ?>admin/hapus_permohonan/'+id;
	    		<?php endif ?>
		  	} else if (
		    	// Read more about handling dismissals
		    	result.dismiss === swal.DismissReason.cancel
		  	) {
		    	swal(
		      		'Dibatalkan',
		      		'Data Anda berhasil diamankan :)',
		      		'error'
		    	)
		  	}
		})
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
				lengthMenu: [[5, 10, 25, 50, -1], ["5 Baris","10 Baris", "25 Baris", "50 Baris", "Semua"]],
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
		            },
		            {
		                "targets": [ 12 ],
		                "visible": false
		            }
		        ],
				buttons: [
		            {
		                extend: 'excelHtml5',
		                exportOptions: {
		                    columns: [0,1,2,3,5,4,6,7,8,9,10,11,12,13]
		                }
		            }
		        ]
			});
		}
	});
</script>
