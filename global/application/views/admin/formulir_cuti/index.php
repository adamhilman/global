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
                        <li class="breadcrumb-item active">Formulir Cuti Kerja</li>
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
                    <div class="col-md-10">
                        <h3 class="card-title">Formulir Cuti Kerja</h3>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo base_url()?>admin/tambah_cuti">
                        <button type="button" class="btn btn-block btn-primary btn-xs">Ajukan Cuti Kerja</button>
                        </a>
                    </div>
                </div>

            </div>
            <div class="card-body">
            <table style="text-align: center;" id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                        <th>No.</th>
                                          <th>Nama Pegawai</th>
                                          <th>Jumlah Hari</th>
                                          <th>Keterangan</th>
                                          <th>Tanggal Cuti</th>
                                          <?php if ($this->session->userdata('level_user') == 6){?>
                                          <th>Approval Proyek Manajer</th>
                                          <?php } ?>
                                          <th>Approval HRD</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody ><?php $no=1; foreach ($cuti as $c) :?>
                                      <tr name="<?php echo $c->id_user?>">
                                        <td><?php echo $no?></td>
                                        <td><?php echo $c->nama;?></td>
                                        <td><?php echo $c->jumlah_hari;?></td>
                                        <td><?php echo $c->keterangan;?></td>
                                        <td><?php echo $c->tanggal_mulai;?> - <?php echo $c->tanggal_selesai;?></td>
                                        <?php if ($this->session->userdata('level_user') == 6){?>
                                        <td>
                                            <?php if ($c->approval_pm == 0){
                                                echo '<i class="fas fa-hourglass-half"></i> Menunggu disetujui';
                                            }elseif ($c->approval_pm == 1){
                                                echo '<i class="fas fa-check"></i> Telah disetujui';
                                            }else{echo "Error";};?>
                                        </td>
                                        <?php } ?>

                                        <td>
                                            <?php if ($c->approval_direksi == 0){
                                                echo '<i class="fas fa-hourglass-half"></i> Menunggu disetujui';
                                            }elseif ($c->approval_direksi == 1){
                                                echo '<i class="fas fa-check"></i> Telah disetujui';
                                            }else{echo "Error";};?>
                                        </td>
                                        <td>
                                            <?php 
                                            $level_user = $this->session->userdata('level_user');
                                            if ($c->approval_pm == 1 && $c->approval_direksi == 1 ){ echo 'Sukses';}
                                            elseif ($c->approval_pm == 1 && $level_user != 6){?>
                                            <a href="<?php base_url()?>edit_cuti/<?php echo $c->id_cuti;?>"><i class="fas fa-edit" title="Edit"></i></a>
                                            <a href="<?php base_url()?>delete_cuti/<?php echo $c->id_cuti;?>" onclick="return confirm('Batalkan cuti?');"><i class="fas fa-trash" title="Delete"></i></a>
                                            <?php }elseif ($c->approval_pm == 1 ){ echo 'Sedang diproses';}
                                            else{?>
                                            <a href="<?php base_url()?>edit_cuti/<?php echo $c->id_cuti;?>"><i class="fas fa-edit" title="Edit"></i></a>
                                            <a href="<?php base_url()?>delete_cuti/<?php echo $c->id_cuti;?>" onclick="return confirm('Batalkan cuti?');"><i class="fas fa-trash" title="Delete"></i></a>
                                            <?php }?>
                                        </td>
                                      </tr>
                                      <?php $no++; endforeach?>
                                  </tbody>
                              </table>
               
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <?php if($this->session->userdata('level_user') == '4'){ ?>
        <!-- PM -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="card-title">Data Pengajuan Cuti Kerja Teknisi</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <table style="text-align: center;" id="cuti_pm" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                        <th>No.</th>
                                          <th>Nama Pegawai</th>
                                          <th>Jumlah Hari</th>
                                          <th>Keterangan</th>
                                          <th>Tanggal Cuti</th>
                                          <th>Approval Proyek Manajer</th>
                                          <th>Approval HRD</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody ><?php $no=1; foreach ($acc_pm as $d) :?>
                                      <tr name="<?php echo $d->id_user?>">
                                        <td><?php echo $no?></td>
                                        <td><?php echo $d->nama;?></td>
                                        <td><?php echo $d->jumlah_hari;?></td>
                                        <td><?php echo $d->keterangan;?></td>
                                        <td><?php echo $d->tanggal_mulai;?> - <?php echo $d->tanggal_selesai;?></td>
                                        <td>
                                            <?php if ($d->approval_pm == 0){
                                                echo '<i class="fas fa-hourglass-half"></i> Menunggu disetujui';
                                            }elseif ($d->approval_pm == 1){
                                                echo '<i class="fas fa-check"></i> Telah disetujui';
                                            }else{echo "Error";};?>
                                        </td>
                                        <td>
                                            <?php if ($d->approval_direksi == 0){
                                                echo '<i class="fas fa-hourglass-half"></i> Menunggu disetujui';
                                            }elseif ($d->approval_direksi == 1){
                                                echo '<i class="fas fa-check"></i> Telah disetujui';
                                            }else{echo "Error";};?>
                                        </td>
                                        <td>
                                            <?php if ($d->approval_pm == 0){?>
                                                <a href="<?php base_url()?>acc_cuti_pm/<?php echo $d->id_cuti;?>"><i class="fas fa-check" title="Approve"></i></a>
                                            <?php }elseif ($d->approval_pm == 1 && $d->approval_direksi == 0 ){?>
                                                <a href="<?php base_url()?>cancel_cuti_pm/<?php echo $d->id_cuti;?>"><i class="fas fa-times" title="Cancel"></i></a>
                                            <?php }else{echo 'Sukses';}?>
                                        </td>
                                      </tr>
                                      <?php $no++; endforeach?>
                                  </tbody>
                              </table>
               
            </div>
            <!-- /.card-body -->
        </div>
        <?php };
        if($this->session->userdata('level_user') == '2'){ ?>
        <!-- HRD -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="card-title">Data Pengajuan Cuti Kerja</h3>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo base_url()?>admin/reset_cuti">
                        <button type="button" class="btn btn-block btn-primary btn-xs">Reset Cuti Kerja</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <table style="text-align: center;" id="cuti_hrd" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                        <th>No.</th>
                                          <th>Nama Pegawai</th>
                                          <th>Jumlah Hari</th>
                                          <th>Keterangan</th>
                                          <th>Tanggal Cuti</th>
                                          <th>Approval Proyek Manajer</th>
                                          <th>Approval HRD</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody ><?php $no=1; foreach ($acc_hrd as $e) :?>
                                      <tr name="<?php echo $e->id_user?>">
                                        <td><?php echo $no?></td>
                                        <td><?php echo $e->nama;?></td>
                                        <td><?php echo $e->jumlah_hari;?></td>
                                        <td><?php echo $e->keterangan;?></td>
                                        <td><?php echo $e->tanggal_mulai;?> - <?php echo $e->tanggal_selesai;?></td>
                                        <td>
                                            <?php if ($e->approval_pm == 0){
                                                echo '<i class="fas fa-hourglass-half"></i> Menunggu disetujui';
                                            }elseif ($e->approval_pm == 1){
                                                echo '<i class="fas fa-check"></i> Telah disetujui';
                                            }else{echo "Error";};?>
                                        </td>
                                        <td>
                                            <?php if ($e->approval_direksi == 0){
                                                echo '<i class="fas fa-hourglass-half"></i> Menunggu disetujui';
                                            }elseif ($e->approval_direksi == 1){
                                                echo '<i class="fas fa-check"></i> Telah disetujui';
                                            }else{echo "Error";};?>
                                        </td>
                                        <?php if ($e->approval_pm == 1){?>
                                        <td>
                                            <?php if ($e->approval_direksi == 0){?>
                                                <a href="<?php base_url()?>acc_cuti_hrd/<?php echo $e->id_cuti;?>"><i class="fas fa-check" title="Approve"></i></a>
                                            <?php }else{?>
                                                <a href="<?php base_url()?>cancel_cuti_hrd/<?php echo $e->id_cuti;?>"><i class="fas fa-times" title="Cancel"></i></a>
                                            <?php }?>
                                        </td>
                                        <?php }else {echo '<td>Menunggu Persetujuan PM</td>';} ?>
                                      </tr>
                                      <?php $no++; endforeach?>
                                  </tbody>
                              </table>
               
            </div>
            <!-- /.card-body -->
        </div>
        <?php }?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->