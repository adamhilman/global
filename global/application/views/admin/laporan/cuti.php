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
						<li class="breadcrumb-item"><a href="<?php echo base_url()?>admin/">Home</a></li>
						<li class="breadcrumb-item active">Generate Laporan Cuti</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('notif'); ?>"></div>
		<div class="flash-data-cuti" data-flashdata="<?= $this->session->flashdata('notif_cuti'); ?>"></div>

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-12">
						<h3 class="card-title">Laporan Cuti Kerja</h3>
					</div>
				</div>

			</div>
			<div class="card-body">
				<form action="<?php echo base_url() ?>admin/laporan_cuti_pdf" method="POST" enctype="multipart/form-data" formtarget="_blank" target="_blank">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="bulan">Masukkan periode bulan</label>
								<select id="bulan" name="bulan" class="form-control">
									<?php for( $m=1; $m<=12; ++$m ) { 
                                    $month_label = date('F', mktime(0, 0, 0, $m, 1));
                                    ?>
									<option value="<?php echo $m; ?>"><?php echo $month_label; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="tahun">Masukkan periode tahun</label>
								<select name="tahun" class="form-control">
									<?php 
                                    $year = date('Y');
                                    $min = $year - 30;
                                    $max = $year;
                                    for( $i=$max; $i>=$min; $i-- ) {
                                        echo '<option value='.$i.'>'.$i.'</option>';
                                    }
                                    ?>
								</select>
							</div>
						</div>
					</div>
                    <div class="row">
                              <div class="col-12"><center>
                                  <input type="submit" value="Tampilkan Laporan" class="btn btn-success">
                                  </center>
                              </div>
                          </div>
				</form>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->