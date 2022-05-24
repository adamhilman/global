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
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('notif_claim'); ?>"></div>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="card-title">Formulir Cuti Kerja</h3>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo base_url()?>admin/tambah_claim">
                        <button type="button" class="btn btn-block btn-primary btn-xs">Ajukan Cuti Kerja</button>
                        </a>
                    </div>
                </div>

            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                        <th>No.</th>
                                          <th>Nama Pegawai</th>
                                          <th>Jumlah Hari</th>
                                          <th>Tanggal Cuti</th>
                                          <th>Approval Proyek Manajer</th>
                                          <th>Approval Direktur</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                      <td>1</td>
                                          <td>Win 95+</td>
                                          <td> 4</td>
                                          <td>X</td>
                                          <td>X</td>
                                          <td>X</td>
                                          <td><a href="<?php base_url()?>detail_project/">Detail</td>
                                      </tr>
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