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
                        <li class="breadcrumb-item active">Data Karyawan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('notif'); ?>"></div>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="card-title">Data Karyawan</h3>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo base_url()?>admin/tambah_karyawan">
                        <button type="button" class="btn btn-block btn-primary btn-xs">Tambah Data</button>
                        </a>
                    </div>
                </div>

            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                        <th>No.</th>
                                          <th>Nama Karyawan</th>
                                          <th>Email</th>
                                          <th>Tanggal Masuk</th>
                                          <th>Jabatan</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $no=1; foreach ($karyawan as $k) :?>
                                      <tr name="<?php echo $k->id_user?>">
                                        <td><?php echo $no?></td>
                                        <td><?php echo $k->nama;?></td>
                                        <td><?php echo $k->email;?></td>
                                        <td><?php echo $k->bulan_tahun;?></td>
                                        <td>
                                            <?php if ($k->level_user == "1"){
                                                echo "Direksi";
                                            }elseif ($k->level_user == "2"){
                                                echo "HRD";
                                            }elseif ($k->level_user == "3"){
                                                echo "Finance";
                                            }elseif ($k->level_user == "4"){
                                                echo "Manager Proyek";
                                            }elseif ($k->level_user == "5"){
                                                echo "Admin";
                                            }elseif ($k->level_user == "6"){
                                                echo "Teknisi";
                                            }else {echo "WOW AMAZING";};
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php base_url()?>reset_user/<?php echo $k->id_user;?>" onclick="return confirm('Apakah yakin ingin reset password <?php echo $k->email?>?');"><i class="fas fa-sync" title="Reset Password"></i></a>
                                            <a href="<?php base_url()?>edit_user/<?php echo $k->id_user;?>"><i class="fas fa-edit" title="Edit"></i></a>
                                            <a href="#" class="hapus_user"><i class="fas fa-trash" title="Delete"></i></a>
                                        </td>
                                      </tr>
                                      <?php $no++; endforeach?>
                                  </tbody>
                              </table>
               
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
