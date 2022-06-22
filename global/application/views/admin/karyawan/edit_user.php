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
  						<li class="breadcrumb-item active">Edit Karyawan</li>
  					</ol>
  				</div>
  			</div>
  		</div><!-- /.container-fluid -->
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<form action="<?php echo base_url('admin/update_user/'.$karyawan->id_user)?>" method="POST">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="card card-primary">
  						<div class="card-header">
  							<h3 class="card-title">Edit data karyawan</h3>
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
  										<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $karyawan->nama?>">
                                          <?php echo form_error('nama_lengkap'); ?>

  									</div>
  								</div>
  								<div class="col-sm-6">
  									<div class="form-group">
  										<label for="email">Email</label>
  										<input type="text" name="email" class="form-control" value="<?php echo $karyawan->email?>">
                                          <?php echo form_error('email'); ?>
  									</div>
  								</div>
  							</div>
  							<div class="row">
  								<div class="col-sm-6">
  									<div class="form-group">
  										<label for="bulan_tahun">Tanggal Masuk</label>
  										<input type="date" name="bulan_tahun" class="form-control" value="<?php echo $karyawan->bulan_tahun?>">
  									</div>
  								</div>
  								<div class="col-sm-6">
  									<div class="form-group">
  										<label for="jabatan">Jabatan</label>
  										<select class="form-control" name="jabatan" id="jabatan">
                                          <?php if ($karyawan->level_user == "1"){
                                                echo "<option value='1' selected>Direksi</option>";
                                            }elseif ($karyawan->level_user == "2"){
                                                echo "<option value='2' selected>HRD</option>";
                                            }elseif ($karyawan->level_user == "3"){
                                                echo "<option value='3' selected>Finance</option>";
                                            }elseif ($karyawan->level_user == "4"){
                                                echo "<option value='4' selected>Manager Proyek</option>";
                                            }elseif ($karyawan->level_user == "5"){
                                                echo "<option value='5' selected>Admin</option>";
                                            }elseif ($karyawan->level_user == "6"){
                                                echo "<option value='6' selected>Teknisi</option>";
                                            }else {echo "WOW AMAZING";};
                                            ?>
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
                                <input name="id_user" type="hidden" value="<?php echo $karyawan->id_user?>">
  								<div class="col-12">
  									<a href="<?php echo base_url()?>admin/data_karyawan"
  										class="btn btn-secondary">Cancel</a>
  									<input type="submit" value="Update Data"
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