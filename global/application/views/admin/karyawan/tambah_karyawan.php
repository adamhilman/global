  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  				</div>
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
  						<li class="breadcrumb-item active">Tambah Karyawan</li>
  					</ol>
  				</div>
  			</div>
  		</div><!-- /.container-fluid -->
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<form action="<?php echo base_url()?>admin/add_karyawan" method="POST">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="card card-primary">
  						<div class="card-header">
  							<h3 class="card-title">Tambah data karyawan</h3>
  							<div class="card-tools">
  								<button type="button" class="btn btn-tool" data-card-widget="collapse"
  									title="Collapse">
  									<i class="fas fa-minus"></i>
  								</button>
  							</div>
  						</div>
  						<div class="card-body">
  							<div class="row">
  								<div class="col-sm-6">
  									<div class="form-group">
  										<label for="nama_lengkap">Nama Lengkap</label>
  										<input type="text" name="nama_lengkap" class="form-control">
  									</div>
  								</div>
  								<div class="col-sm-6">
  									<div class="form-group">
  										<label for="email">Email</label>
  										<input type="text" name="email" class="form-control">
  									</div>
  								</div>
  							</div>
  							<div class="row">
  								<div class="col-sm-6">
  									<div class="form-group">
  										<label for="bulan_tahun">Tanggal Masuk</label>
  										<input type="date" name="bulan_tahun" class="form-control">
  									</div>
  								</div>
  								<div class="col-sm-6">
  									<div class="form-group">
  										<label for="jabatan">Jabatan</label>
  										<select class="form-control" name="jabatan" id="jabatan">
  											<option value="1">Direksi</option>
  											<option value="2">HRD</option>
  											<option value="3">Finance</option>
  											<option value="4">Manager Proyek</option>
  											<option value="5">Admin</option>
                                            <option value="6">Teknisi</option>
  										</select>
  									</div>
  								</div>
  							</div>
  							<div class="row">
  								<div class="col-12">
  									<a href="<?php echo base_url()?>admin/data_karyawan"
  										class="btn btn-secondary">Cancel</a>
  									<input type="submit" value="Tambah Data"
  										class="btn btn-success float-right">
  								</div>
  							</div>
  						</div>
  						<!-- /.card-body -->
  					</div>
  					<!-- /.card -->
  				</div>
  			</div>

  		</form>

  	</section>
  	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->