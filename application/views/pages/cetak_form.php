<!DOCTYPE html>
<html lang="en">
<!-- HAYO MAU NGAPAIN NGINTIP-NGINTIP ?? ^^, -->
<!-- BELAJAR YANG RAJIN YA !! -->
<!-- #MayTheCodeBuiltinYou -->
<!-- <> with ❤ by Erik si anak magang-->
<!-- ga usah bilang-bilang abis liat ini ^^, -->
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="shortcut icon" href="<?php echo base_url('assets/img/gasnet.png')?>"/>
	<title><?php echo $title ?></title>
    <meta name="description" content="Sistem informasi permohonan kendaraan operasional Gasnet PGASCOM">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.dataTables.css"> -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/clockpicker.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-datepicker.css">

    <!-- development version, includes helpful console warnings -->
    <script src="<?php echo base_url()?>assets/js/polyfill.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    
    <!-- DataTables plugin start -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jszip.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables.bootstrap.js"></script>
    <!-- DataTables plugin end -->
    
    <!-- Other lugin start -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/clockpicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datepicker.id.min.js"></script>
    <!-- Other plugin end -->

    <style>
        #loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 48px;
            height: 48px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            display: none;
            position: relative;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .checkbox-rounded [type="checkbox"][class*='filled-in']+label:after {
            border-radius: 50%;
        }

        .app {
            margin-top: 70px;
            margin-bottom: 80px;
        }

        .form-app {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .login {
            margin-top: 100px !important;
        }
    </style>
</head>

<body>
	<div class="container" onload="window.print()">
		<div class="row mt-2">
			<div class="col-3">
				<div class="row">
					<div class="col-11"><img src="<?php echo base_url() ?>assets/img/gasnet.png" class="w-100" alt='gasnet logo'></div>
				</div>
			</div>
			<div class="col">
				Komplek PT PGN (Persero) Tbk. Gedung B Lantai 3<br>
				Jl. KH. Zainul Arifin No. 20 Jakarta Barat 11140, Indonesia<br>
				T +6221 300 10645, F +6221 633 3080 | www.gasnet.id
			</div>
		</div>
		<div class="row my-2">
	        <div class="col-12">
				<div class="card">
		      		<div class="card-header">
		        		<h6 class="modal-title" id="exampleModalCenterTitle">Permohonan Kendaraan Operasional</h6>
		      		</div>
		      		<div class="card-body">
		      			<?php $attributes = array('class' => 'needs-validation'); ?>
		      			<?php echo form_open_multipart('permohonan/tambah_permohonan', $attributes);?>
						  	<div class="form-row">
						    	<div class="form-group col-6">
						      		<label for="tanggalBerangkat">Tgl. Keberangkatan</label>
						      		<div class="input-group">
						      			<input type="text" class="form-control" id="tanggalBerangkat" name="tanggalBerangkat" placeholder="Tgl. Keberangkatan" value="<?php echo $this->home_model->read_date($permohonan['tanggalBerangkat']) ?>" required>
						      			<div class="input-group-append">
										    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
										</div>
						      		</div>
						      		<div class="invalid-feedback">Anda harus mengisi Tanggal Keberangkatan</div>
						    	</div>
						    	<div class="form-group col-6">
						      		<label for="namaPengguna">Nama Pengguna</label>
						      		<div class="input-group">
						      			<input id="namaPengguna" name="namaPengguna" class="form-control" placeholder="Nama Pengguna" value="<?php echo $permohonan['namaPengguna'] ?>" required/>
						      			<div class="input-group-append">
										    <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span>
										</div>
						      		</div>
						      		<div class="invalid-feedback">Anda harus mengisi Nama Pengguna</div>
						    	</div>
						  	</div>
						  	<div class="form-row">
						  		<div class="form-group col-3 clockpicker" id="berangkat">
						  			<label for="jamBerangkat">Jam Berangkat</label>
						  			<div class="input-group">
									    <input type="text" class="form-control" id="jamBerangkat" name="jamBerangkat" placeholder="Berangkat" value="<?php echo $permohonan['jamBerangkat'] ?>" required>
									    <div class="input-group-append">
										    <span class="input-group-text" id="basic-addon2"><i class="fa fa-clock-o"></i></span>
										</div>
						  			</div>
								    <div class="invalid-feedback">Anda harus mengisi Jam Berangkat</div>
								</div>
						  		<div class="form-group col-3 clockpicker" id="kembali">
						  			<label for="jamKembali">Jam Kembali</label>
						  			<div class="input-group">
									    <input type="text" class="form-control" id="jamKembali" name="jamKembali" placeholder="Kembali" value="<?php echo $permohonan['jamKembali'] ?>" required>
									    <div class="input-group-append">
										    <span class="input-group-text" id="basic-addon2"><i class="fa fa-clock-o"></i></span>
										</div>
						  			</div>
								    <div class="invalid-feedback">Anda harus mengisi Jam Kembali</div>
								</div>
								<div class="form-group col-6">
							    	<label for="noPol">No. Polisi</label>
							    	<div class="input-group">
							    		<input type="text" class="form-control" id="noPol" name="noPol" placeholder='ex: "B 1234 CD"' value="<?php echo $permohonan['noPol'] ?>" required />
							    		<div class="input-group-append">
										    <span class="input-group-text" id="basic-addon2"><i class="fa fa-car"></i></span>
										</div>
							    	</div>
							    	<div class="invalid-feedback">Anda harus mengisi Tujuan</div>
							  	</div>
						  	</div>
						  	<div class="form-row">
						  		<div class="form-group col-6">
							    	<label for="satuanKerja">Satuan Kerja</label>
							    	<input type="text" class="form-control" id="satuanKerja" name="satuanKerja" list="satuan" placeholder="Satuan Kerja" value="<?php echo $permohonan['satuanKerja'] ?>" required />
							    	<div class="invalid-feedback">Anda harus mengisi Satuan Kerja</div>
							  	</div>
							  	<div class="form-group col-6">
							    	<label for="namaPengemudi">Nama Pengemudi</label>
							    	<div class="input-group">
							    		<input type="text" class="form-control" id="namaPengemudi" name="pengemudi" placeholder="Nama Pengemudi" value="<?php echo $permohonan['pengemudi'] ?>" required />
							    		<div class="input-group-append">
										    <span class="input-group-text" id="basic-addon2"><i class="fa fa-life-ring"></i></span>
										</div>
							    	</div>
							    	<div class="invalid-feedback">Anda harus mengisi Nama Pengemudi</div>
							  	</div>
						  	</div>
						  	<div class="form-group">
						  		<label for="tujuan">Tujuan</label>
						    	<textarea class="form-control" id="tujuan" name="tujuan" placeholder="Lokasi Tujuan" required><?php echo $permohonan['tujuan'] ?></textarea>
						    	<div class="invalid-feedback">Anda harus menyertakan lokasi</div>
						  	</div>
						</form>
		      		</div>
		    	</div>
		    </div>
		</div>
		<div class="row">
			<div class="col-2 text-right">
				Koordinator Pool
			</div>
			<div class="col-3">
				<div class="form-row">
			  		<div class="form-group col-6">
				    	<label for="satuanKerja">KM Awal</label>
				    	<input type="text" class="form-control" id="satuanKerja" required />
				  	</div>
				  	<div class="form-group col-6">
				    	<label for="namaPengemudi">KM Akhir</label>
				    	<input type="text" class="form-control" id="namaPengemudi" required />
				  	</div>
			  	</div>
			</div>
			<div class="col-3 offset-2 text-center">Jakarta, <?php echo $this->home_model->read_date(date('Y-m-d')) ?></div>
		</div>
	</div>
	<script type="text/javascript">
		var css = '@page { size: landscape; }',
		    head = document.head || document.getElementsByTagName('head')[0],
		    style = document.createElement('style');

		style.type = 'text/css';
		style.media = 'print';

		if (style.styleSheet){
		  style.styleSheet.cssText = css;
		} else {
		  style.appendChild(document.createTextNode(css));
		}

		head.appendChild(style);

		window.print();


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
</body>
</html>