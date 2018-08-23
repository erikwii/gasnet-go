<!-- Image and text -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #f8f9fa;">
  	<a href="<?php echo base_url() ?>" class="navbar-brand">
    	<img src="<?php echo base_url() ?>assets/img/gasnet.png" width="60" height="35" class="d-inline-block align-top" alt="logo">
    	<span class="text-success">GO!</span>
  	</a>
  	<?php if (isset($_SESSION['go_email'])): ?>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
		    <ul class="navbar-nav my-lg-0 ml-auto">
		    	<?php if (isset($_SESSION['go_email'])): ?>
		    		<?php if (isset($nav_active) && $nav_active == 'permohonan'): ?>
						<li class="nav-item active">
					       	<b><a class="nav-link text-primary" href="<?php echo base_url() ?>permohonan/"><i class="fa fa-file-text-o"></i> Form Permohonan</a></b>
					    </li>
			    	<?php else: ?>
			    		<li class="nav-item">
					       	<b><a class="nav-link" href="<?php echo base_url() ?>permohonan/"><i class="fa fa-file-text-o"></i> Form Permohonan</a></b>
					    </li>
			    	<?php endif ?>
		    	<?php endif ?>
		    	<?php if (isset($_SESSION['go_email'])): ?>
					<?php if (isset($_SESSION['go_level']) && $_SESSION['go_level'] == 1): ?>
						<?php if (isset($nav_active) && $nav_active == 'data'): ?>
							<li class="nav-item active">
					        	<b><a class="nav-link text-primary" href="<?php echo base_url() ?>permohonan/data/"><i class="fa fa-inbox"></i> Data Permohonan</a></b>
					      	</li>
					    <?php else: ?>
					    	<li class="nav-item">
					        	<b><a class="nav-link" href="<?php echo base_url() ?>permohonan/data/"><i class="fa fa-inbox"></i> Data Permohonan</a></b>
					      	</li>
						<?php endif ?>
				    <?php elseif(isset($_SESSION['go_level']) && $_SESSION['go_level'] == 2): ?>
				    	<?php if (isset($nav_active) && $nav_active == 'data'): ?>
				    		<li class="nav-item active">
					        	<b><a class="nav-link text-primary" href="<?php echo base_url() ?>spv/"><i class="fa fa-inbox"></i> Data Permohonan</a></b>
					      	</li>
					    <?php else: ?>
					    	<li class="nav-item">
					        	<b><a class="nav-link" href="<?php echo base_url() ?>spv/"><i class="fa fa-inbox"></i> Data Permohonan</a></b>
					      	</li>
				    	<?php endif ?>
				    <?php else: ?>
				    	<?php if (isset($nav_active) && $nav_active == 'data'): ?>
					    	<li class="nav-item active">
					        	<b>
					        		<a class="nav-link text-primary" href="<?php echo base_url() ?>admin/">
					        			<i class="fa fa-inbox"></i> Data Permohonan
					        			<?php if ($this->admin_model->get_permohonan_notif() > 0): ?>
					        				<span class="badge badge-primary" data-toggle="tooltip" data-placement="top" data-html="true" title="Terdapat <?php echo $this->admin_model->get_permohonan_notif() ?> permohonan pending"><?php echo $this->admin_model->get_permohonan_notif() ?></span>
					        			<?php endif ?> 
					        		</a>
					        	</b>
					      	</li>
					    <?php else: ?>
					    	<li class="nav-item">
					        	<b>
					        		<a class="nav-link" href="<?php echo base_url() ?>admin/">
					        			<i class="fa fa-inbox"></i> Data Permohonan 
					        			<?php if ($this->admin_model->get_permohonan_notif() > 0): ?>
					        				<span class="badge badge-primary" data-toggle="tooltip" data-placement="top" data-html="true" title="Terdapat <?php echo $this->admin_model->get_permohonan_notif() ?> permohonan pending"><?php echo $this->admin_model->get_permohonan_notif() ?></span>
					        			<?php endif ?> 
					        		</a>
					        	</b>
					      	</li>
				      	<?php endif; ?>
				      	<?php if (isset($nav_active) && $nav_active == 'akun'): ?>
							<li class="nav-item active">
					        	<b><a class="nav-link text-primary" href="<?php echo base_url() ?>admin/akun/"><i class="fa fa-users"></i> Data Akun</a></b>
					      	</li>
					    <?php else: ?>
					    	<li class="nav-item">
					        	<b><a class="nav-link" href="<?php echo base_url() ?>admin/akun/"><i class="fa fa-users"></i> Data Akun</a></b>
					      	</li>
						<?php endif ?>
					<?php endif ?>
				<?php endif ?>
				<?php if (isset($_SESSION['go_email'])): ?>
			      	<li class="nav-item">
			        	<b><a class="nav-link" href="<?php echo base_url() ?>home/logout"><i class="fa fa-sign-out"></i> Logout <span class="sr-only">(current)</span></a></b>
			      	</li>
				<?php endif ?>
			</ul>
		</div>
  	<?php endif ?>
</nav>
<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>