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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="card-title">Projects</h3>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo base_url()?>admin/tambah_project">
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
                                          <th>Nama Project</th>
                                          <th>Sub Bidang Pekerjaan</th>
                                          <th>Nilai Kontrak</th>
                                          <th>Pemberi Kontrak / Pejabat Pembuat Komitmen</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php 
                                  function rupiah($angka){
                                    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                                        return $hasil_rupiah;
                                    };
                                    foreach ($project as $p) : ?>
                                      <tr>
                                      <td>1</td>
                                          <td><?php echo $p->nama_paket?></td>
                                          <td><?php echo $p->sub_pekerjaan?></td>
                                          <td>
                                            <?php
                                            echo rupiah($p->nilai_kontrak)?>
                                          </td>
                                          <td><?php echo $p->nama_ppk?></td>
                                          <td><a href="<?php echo base_url().'admin/detail_project/'.$p->id_project?>"><i class="fas fa-eye"></i></a>
                                          <a href="<?php echo base_url().'admin/edit_project/'.$p->id_project?>"><i class="fas fa-edit"></i></a>
                                          <a href="<?php echo base_url().'admin/hapus_project/'.$p->id_project?>"><i class="fas fa-trash"></i></a>
                                        </td>
                                      </tr>
                                      <?php endforeach; ?>
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