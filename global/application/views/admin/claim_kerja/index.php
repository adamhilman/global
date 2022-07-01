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
						<li class="breadcrumb-item active">Data Claim Kunjungan Kerja</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('notif'); ?>"></div>
		<?php function rupiah($angka){
                                        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                                            return $hasil_rupiah;
                                        };?>
		<!-- Default box -->
		<?php if($this->session->userdata('level_user') != '3' && $this->session->userdata('level_user') != '2'){ ?>
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-10">
						<h3 class="card-title">Data Claim Kunjungan Kerja</h3>
					</div>
					<div class="col-md-2">
						<a href="<?php echo base_url()?>admin/tambah_claim">
							<button type="button" class="btn btn-block btn-primary btn-xs">Ajukan Claim</button>
						</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped wrap">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Project</th>
							<th>Jumlah Claim</th>
							<th>Tanggal Claim</th>
							<th>Keterangan</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr><?php $no=1; 
                                      
                                        foreach ($claim as $c) :?>
							<td><?php echo $no?></td>
							<td><?php echo $c->nama_paket;?></td>
							<td><?php echo rupiah($c->nominal);?></td>
							<td><?php echo $c->tanggal_pengajuan;?></td>
							<td><?php echo $c->keterangan;?></td>
							<td><?php if ($c->status == 0){
                                                echo '<i class="fas fa-hourglass-half"></i> Menunggu disetujui';
                                            }elseif ($c->status == 1){
                                                echo '<i class="fas fa-check"></i> Telah disetujui';
                                            }else{echo "Error";};?></td>
							<td>
								<a href="<?php echo base_url() ?>assets/upload/claim/<?php echo $c->file_rembes;?>"><i
										class="fas fa-download" title="Download Invoice"></i></a>
								<?php if($c->status == 0){ ?>
								<a href="<?php base_url()?>edit_claim/<?php echo $c->id_rembes;?>"><i
										class="fas fa-edit" title="Edit"></i></a>
								<a href="<?php base_url()?>delete_claim/<?php echo $c->id_rembes;?>"
									onclick="return confirm('Batalkan claim?');"><i class="fas fa-trash"
										title="Delete"></i></a>
								<?php } ?>
							</td>
						</tr>
						<?php $no++; endforeach?>
					</tbody>
				</table>

			</div>
			<!-- /.card-body -->
		</div>
		<?php };?>
		<?php if($this->session->userdata('level_user') == '3'){ ?>
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-12">
						<h3 class="card-title">Data Pengajuan Claim Kunjungan Kerja</h3>
					</div>
				</div>
			</div>
			<div class="card-body">
				<table id="example2" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th width="500">Nama Project</th>
							<th>Jumlah Claim</th>
							<th>Tanggal Claim</th>
							<th>Keterangan</th>
							<th>Status</th>
							<th>Pengusul</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr><?php $no=1; 
                                        foreach ($claim_all as $d) :?>
							<td><?php echo $no?></td>
							<td><?php echo $d->nama_paket;?></td>
							<td><?php echo rupiah($d->nominal);?></td>
							<td><?php echo $d->tanggal_pengajuan;?></td>
							<td><?php echo $d->keterangan;?></td>
							<td><?php if ($d->status == 0){
                                                echo '<i class="fas fa-hourglass-half"></i> Menunggu disetujui';
                                            }elseif ($d->status == 1){
                                                echo '<i class="fas fa-check"></i> Telah disetujui';
                                            }else{echo "Error";};?></td>
							<td><?php echo $d->nama;?></td>
							<td>
								<a href="<?php echo base_url() ?>assets/upload/claim/<?php echo $d->file_rembes;?>"><i
										class="fas fa-download" title="Download Invoice"></i></a>
								<?php if ($d->status == 1){?>
								<a href="<?php base_url()?>cancel_claim/<?php echo $d->id_rembes;?>"><i
										class="fas fa-times" title="Cancel"></i></a>
								<?php } else {?>
								<a href="<?php base_url()?>acc_claim/<?php echo $d->id_rembes;?>"><i
										class="fas fa-check" title="Approve"></i></a>
								<?php }?>
							</td>
						</tr>
						<?php $no++; endforeach?>
					</tbody>
				</table>

			</div>
			<!-- /.card-body -->
		</div>
		<?php }; ?>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->