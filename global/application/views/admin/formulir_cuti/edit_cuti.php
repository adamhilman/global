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
  						<li class="breadcrumb-item active">Edit Cuti Karyawan</li>
  					</ol>
  				</div>
  			</div>
  		</div><!-- /.container-fluid -->
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<form action="<?php echo base_url()?>admin/update_cuti" method="POST">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="card card-primary">
  						<div class="card-header">
  							<h3 class="card-title">Edit cuti kerja</h3>
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
  										<label for="tanggal_mulai">Tanggal Mulai</label>
  										<input type="date" name="tanggal_mulai" class="form-control" value="<?php echo $cuti->tanggal_mulai?>">
  									</div>
  								</div>
  								<div class="col-sm-6">
  									<div class="form-group">
  										<label for="tanggal_selesai">Tanggal Selesai</label>
  										<input type="date" name="tanggal_selesai" class="form-control" value="<?php echo $cuti->tanggal_selesai?>">
  									</div>
  								</div>
  							</div>
  							<div class="row">
  								<div class="col-sm-6">
  									<div class="form-group">
  										<label for="keterangan">Keterangan</label>
  										<textarea name="keterangan" class="form-control" ><?php echo $cuti->keterangan?></textarea>
  									</div>
  								</div>
                                <div class="col-sm-6">
  									<div class="form-group">
  										<label for="jumlah_hari">Jumlah Hari</label>
  										<input type="number" name="jumlah_hari" class="form-control" value="<?php echo $cuti->jumlah_hari?>">
  									</div>
  								</div>
  								
  							</div>
  							<div class="row">
  								<div class="col-12">
                                  <input type="hidden" name="id_cuti" value="<?php echo $cuti->id_cuti?>">
								  <input type="hidden" name="jumlah_hari_before" value="<?php echo $cuti->jumlah_hari?>">
  									<a href="<?php echo base_url()?>admin/form_cuti"
  										class="btn btn-secondary">Batalkan</a>
  									<input type="submit" value="Edit Cuti"
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