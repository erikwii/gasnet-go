<div class="container-fluid app">
	<div class="row my-3">
        <div class="col-12 col-lg-12 col-md-4">
        	<button class="btn btn-primary float-right my-2" data-toggle="modal" data-target="#exampleModalCenter">Tambah Akun</button>
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
        </div>
    </div>
    <div class="row">
	  <div class="col-2 fixed-top" style="margin-top: 90px">
	    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">User</a>
	      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Approval</a>
	      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Admin</a>
	    </div>
	  </div>
	  <div class="col-10 offset-2">
	    <div class="tab-content" id="v-pills-tabContent">
	      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
	      	<div class="table-responsive">
        		<table class="table table-striped w-100" id="user_table">
				  <thead class="w-100">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Email</th>
				      <th scope="col">Nama</th>
				      <th scope="col">Posisi</th>
				      <th scope="col">Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody class="w-100">
				  	<?php $i = 1; ?>
				  	<?php foreach ($user as $u): ?>
				  		<tr>
					      <th scope="row"><?php echo $i ?></th>
					      <td><?php echo $u->email ?></td>
					      <td><?php echo $u->nama ?></td>
					      <td><?php echo $u->posisi ?></td>
					      <td>
					      	<?php if ($u->status == 'aktif'): ?>
					      		<h5><span class="badge badge-success"><?php echo $u->status ?></span></h5>
					      	<?php else: ?>
					      		<span class="badge badge-danger"><?php echo $u->status ?></span>
					      	<?php endif ?>
					      </td>
					      <td>
					      	<div class="btn-group">
					      		<button class="btn btn-sm btn-primary" onclick="edit_akun('<?php echo $u->email ?>')">Edit</button>
					      		<button class="btn btn-sm btn-outline-danger" onclick='hapus_akun("<?php echo $u->email ?>")'>Hapus</button>
					      	</div>
					      </td>
					    </tr>
					    <?php $i++; ?>
				  	<?php endforeach ?>
				  </tbody>
				</table>
        	</div>
	      </div>
	      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
	      	<div class="table-responsive">
        		<table class="table table-striped w-100" id="spv_table">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Email</th>
				      <th scope="col">Nama</th>
				      <th scope="col">Posisi</th>
				      <th scope="col">Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($supervisor as $spv): ?>
				  		<tr>
					      <th scope="row"><?php echo $i ?></th>
					      <td><?php echo $spv->email ?></td>
					      <td><?php echo $spv->nama ?></td>
					      <td><?php echo $spv->posisi ?></td>
					      <td>
					      	<?php if ($spv->status == 'aktif'): ?>
					      		<h5><span class="badge badge-success"><?php echo $spv->status ?></span></h5>
					      	<?php else: ?>
					      		<span class="badge badge-danger"><?php echo $spv->status ?></span>
					      	<?php endif ?>
					      </td>
					      <td>
					      	<div class="btn-group">
					      		<button class="btn btn-sm btn-primary" onclick="edit_akun('<?php echo $spv->email ?>')">Edit</button>
					      		<button class="btn btn-sm btn-outline-danger" onclick="hapus_akun('<?php echo $spv->email ?>')">Hapus</button>
					      	</div>
					      </td>
					    </tr>
					    <?php $i++; ?>
				  	<?php endforeach ?>
				  </tbody>
				</table>
        	</div>
	      </div>
	      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
	      	<div class="table-responsive">
        		<table class="table table-striped w-100" id="admin_table">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Email</th>
				      <th scope="col">Nama</th>
				      <th scope="col">Posisi</th>
				      <th scope="col">Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($admin as $a): ?>
				  		<tr>
					      <th scope="row"><?php echo $i ?></th>
					      <td><?php echo $a->email ?></td>
					      <td><?php echo $a->nama ?></td>
					      <td><?php echo $a->posisi ?></td>
					      <td>
					      	<?php if ($a->status == 'aktif'): ?>
					      		<h5><span class="badge badge-success"><?php echo $a->status ?></span></h5>
					      	<?php else: ?>
					      		<span class="badge badge-danger"><?php echo $a->status ?></span>
					      	<?php endif ?>
					      </td>
					      <td>
					      	<div class="btn-group">
					      		<button class="btn btn-sm btn-primary" onclick="edit_akun('<?php echo $a->email ?>')">Edit</button>
					      		<button class="btn btn-sm btn-outline-danger" onclick='hapus_akun("<?php echo $a->email ?>")'>Hapus</button>
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
	  </div>
	</div>
    <div class="row">
    	<div class="col-12">
        </div>
    </div>
    <!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalCenterTitle">Tambah Akun</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	      			<?php $attributes = array('class' => 'needs-validation'); ?>
	      			<?php echo form_open_multipart('admin/tambah_akun/', $attributes);?>
					  	<div class="form-row">
					    	<div class="form-group col-md-12">
					      		<label for="nama">Nama Lengkap</label>
					      		<div class="input-group">
					      			<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
					      			<div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span>
									</div>
					      		</div>
					      		<div class="invalid-feedback">Anda harus mengisi Nama Lengkap</div>
					    	</div>
					  	</div>
					  	<div class="form-row">
					  		<div class="form-group col-md-12">
					  			<label for="email">Email</label>
					  			<div class="input-group">
								    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
								    <div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-envelope-o"></i></span>
									</div>
					  			</div>
							    <div class="invalid-feedback">Format Email tidak benar</div>
							</div>
					  		<div class="form-group col-md-12">
					  			<label for="password">Password</label>
					  			<div class="input-group">
					  				<input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="6" required>
								    <div class="input-group-append">
								        <span class="input-group-text"><span class="fa fa-lock"></span></span>
								    </div>
					  			</div>
							    <div class="invalid-feedback">Anda harus mengisi Password</div>
							</div>
							<div class="form-group col-md-6">
					      		<label for="posisi">Posisi</label>
					      		<input type="text" id="posisi" name="posisi" class="form-control" placeholder="Posisi" required/>
					      		<div class="invalid-feedback">Anda harus mengisi Posisi</div>
					    	</div>
							<div class="form-group col-md-6">
						    	<label for="level">Level</label>
						    	<select name="level" id="level" class="form-control">
						    		<option value="1" selected disabled>Pilih</option>
						    		<option value="1">User</option>
						    		<option value="2">Approval</option>
						    		<option value="3">Admin</option>
						    	</select>
						    	<div class="invalid-feedback">Anda harus memilih Level</div>
						  	</div>
					  	</div>
					  	<button type="submit" class="btn btn-lg btn-block btn-primary">Tambah</button>
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
	        		<h5 class="modal-title" id="exampleModalCenterTitle">Edit Akun</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	      			<?php $attributes = array('class' => 'needs-validation', 'id'=>'editform'); ?>
	      			<?php echo form_open_multipart('admin/edit_akun/', $attributes);?>
					  	<div class="form-row">
					  		<input type="email" name="thisemail" class="d-none">
					    	<div class="form-group col-md-12">
					      		<label for="editnama">Nama Lengkap</label>
					      		<div class="input-group">
					      			<input type="text" class="form-control" id="editnama" name="editnama" placeholder="Nama Lengkap" required>
					      			<div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span>
									</div>
					      		</div>
					      		<div class="invalid-feedback">Anda harus mengisi Nama Lengkap</div>
					    	</div>
					  	</div>
					  	<div class="form-row">
					  		<div class="form-group col-md-12">
					  			<label for="editemail">Email</label>
					  			<div class="input-group">
								    <input type="editemail" class="form-control" id="editemail" name="editemail" placeholder="Email" required>
								    <div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-envelope-o"></i></span>
									</div>
					  			</div>
							    <div class="invalid-feedback">Format Email tidak benar</div>
							</div>
					  		<div class="form-group col-md-12">
					  			<label for="editpassword">Password</label>
					  			<div class="input-group">
					  				<input type="password" class="form-control" id="editpassword" name="editpassword" placeholder="Password" minlength="6" required>
								    <div class="input-group-append">
								        <span class="input-group-text"><span class="fa fa-lock"></span></span>
								    </div>
					  			</div>
							    <div class="invalid-feedback">Anda harus mengisi Password</div>
							</div>
							<div class="form-group col-md-6">
					      		<label for="editposisi">Posisi</label>
					      		<input type="text" id="editposisi" name="editposisi" class="form-control" placeholder="Posisi" required/>
					      		<div class="invalid-feedback">Anda harus mengisi Posisi</div>
					    	</div>
							<div class="form-group col-md-6">
						    	<label for="editlevel">Level</label>
						    	<select name="editlevel" id="editlevel" class="form-control">
						    		<option selected disabled>Pilih</option>
						    		<option value="1">User</option>
						    		<option value="2">Supervisor</option>
						    		<option value="3">Admin</option>
						    	</select>
						    	<div class="invalid-feedback">Anda harus memilih Level</div>
						  	</div>
					  	</div>
					  	<button type="submit" class="btn btn-lg btn-block btn-primary">Edit</button>
					</form>
	      		</div>
	    	</div>
	  	</div>
	</div>
	<!-- Edit Modal -->
</div>
<script>

    function edit_akun(email){
        $('#editform')[0].reset();

        $.ajax({
            url : "<?php echo site_url('admin/data_akun/')?>" + email,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            	$('[name="thisemail"]').val(data.email);
            	$('[name="editnama"]').val(data.nama);
                $('[name="editemail"]').val(data.email);
                $('[name="editposisi"]').val(data.posisi);
                $('[name="editlevel"]').val(data.level);
                $('#editModalCenter').modal('show');

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log('failed get data');
            }
        });
    }

    function hapus_akun(email) {
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
		    window.location = '<?php echo base_url() ?>admin/hapus_akun/'+email;
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
		if(!$("table#user_table tr td").hasClass('null')) {
			var userTable = $('#user_table').DataTable({
				info: false,
				dom: '<"top"B>flt<"bottom"p><"clear">',
				oLanguage: {sLengthMenu: "_MENU_"},
				lengthMenu: [[5, 10, 25, 50, -1], ["5 Baris","10 Baris", "25 Baris", "50 Baris", "Semua"]],
				order: [[0, "asc"]],
				buttons: [
		            {
		                extend: 'excelHtml5',
		                exportOptions: {
		                    columns: [0,1,2,3,4]
		                }
		            }
		        ]
			});
		}

		if(!$("table#spv_table tr td").hasClass('null')) {
			var spvTable = $('#spv_table').DataTable({
				info: false,
				dom: '<"top"B>flt<"bottom"p><"clear">',
				oLanguage: {sLengthMenu: "_MENU_"},
				lengthMenu: [[5, 10, 25, 50, -1], ["5 Baris","10 Baris", "25 Baris", "50 Baris", "Semua"]],
				order: [[0, "asc"]],
				buttons: [
		            {
		                extend: 'excelHtml5',
		                exportOptions: {
		                    columns: [0,1,2,3,4]
		                }
		            }
		        ]
			});
		}

		if(!$("table#admin_table tr td").hasClass('null')) {
			var adminTable = $('#admin_table').DataTable({
				info: false,
				dom: '<"top"B>flt<"bottom"p><"clear">',
				oLanguage: {sLengthMenu: "_MENU_"},
				lengthMenu: [[5, 10, 25, 50, -1], ["5 Baris","10 Baris", "25 Baris", "50 Baris", "Semua"]],
				order: [[0, "asc"]],
				buttons: [
		            {
		                extend: 'excelHtml5',
		                exportOptions: {
		                    columns: [0,1,2,3,4]
		                }
		            }
		        ]
			});
		}
	});
</script>
