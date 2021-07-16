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
                          <li class="breadcrumb-item active">Edit Project</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <form action="<?php echo base_url()?>admin/update_project" method="POST">
          <input type="hidden" name="id_project" class="form-control" value="<?php echo $project->id_project?>">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card card-primary">
                          <div class="card-header">
                              <h3 class="card-title">General</h3>
                              <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                      <i class="fas fa-minus"></i>
                                  </button>
                              </div>
                          </div>
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="nama_paket">Nama Paket Pekerjaan</label>
                                          <textarea id="nama_paket" name="nama_paket" class="form-control" rows="5"><?php echo $project->nama_paket?></textarea>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="sub_pekerjaan">Sub Bidang Pekerjaan</label>
                                          <input type="text" name="sub_pekerjaan" class="form-control" value="<?php echo $project->sub_pekerjaan?>">
                                      </div>
                                      <div class="form-group">
                                          <label for="lokasi_pekerjaan">Lokasi</label>
                                          <input type="text" name="lokasi_pekerjaan" class="form-control" value="<?php echo $project->lokasi_pekerjaan?>">
                                      </div>
                                  </div>
                              </div>
                              <hr>
                              <h5>Pemberi Tugas / Pejabat Pembuat Komitmen</h5>
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="nama_ppk">Nama PPK</label>
                                          <input type="text" name="nama_ppk" class="form-control" value="<?php echo $project->nama_ppk?>">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="alamat_ppk">Alamat PPK</label>
                                          <textarea name="alamat_ppk" class="form-control" row="3"><?php echo $project->alamat_ppk?></textarea>
                                      </div>
                                  </div>
                              </div>
                              <hr>
                              <h5>Kontrak</h5>
                              <div class="row">
                                  <div class="col-sm-3">
                                      <div class="form-group">
                                          <label for="nomor_kontrak">No. / Tanggal Kontrak</label>
                                          <input type="text" name="nomor_kontrak" class="form-control" value="<?php echo $project->nomor_kontrak?>">
                                      </div>
                                  </div>
                                  <div class="col-sm-3">
                                      <div class="form-group">
                                          <label for="nilai_kontrak">Nilai Kontrak</label>
                                          <input type="text" id="nilai_kontrak" name="nilai_kontrak" class="form-control" value="<?php echo $project->nilai_kontrak?>">
                                      </div>
                                  </div>
                                  <div class="col-sm-3">
                                      <div class="form-group">
                                          <label for="selesai_kontrak">Selesai Kontrak (mm/dd/yyyy)</label>
                                          <input type="date" name="selesai_kontrak" class="form-control" value="<?php echo $project->selesai_kontrak?>">
                                      </div>
                                  </div>
                                  <div class="col-sm-3">
                                      <div class="form-group">
                                          <label for="serah_terima">BA Serah Terima</label>
                                          <select id="inputStatus" name="serah_terima" class="form-control custom-select">
                                              <option selected disabled>Select one</option>
                                              <option value="0" <?php if ($project->serah_terima == 0) { echo 'selected';}?>>Selesai</option>
                                              <option value="1" <?php if ($project->serah_terima == 1) { echo 'selected';}?>>Proses</option>
                                              <option value="2" <?php if ($project->serah_terima == 2) { echo 'selected';}?>>Ditahan</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-12">
                                      <a href="#" class="btn btn-secondary">Cancel</a>
                                      <input type="submit" value="Update Project" class="btn btn-success float-right">
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