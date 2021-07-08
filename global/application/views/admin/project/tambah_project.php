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
                          <li class="breadcrumb-item active">Project Add</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <form action="<?php echo base_url()?>admin/add_project" method="POST">
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
                                          <textarea id="nama_paket" name="nama_paket" class="form-control" rows="5"></textarea>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="sub_pekerjaan">Sub Bidang Pekerjaan</label>
                                          <input type="text" name="sub_pekerjaan" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="lokasi_pekerjaan">Lokasi</label>
                                          <input type="text" name="lokasi_pekerjaan" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <hr>
                              <h5>Pemberi Tugas / Pejabat Pembuat Komitmen</h5>
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="nama_ppk">Nama PPK</label>
                                          <input type="text" name="nama_ppk" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="alamat_ppk">Alamat PPK</label>
                                          <textarea name="alamat_ppk" class="form-control" row="3"></textarea>
                                      </div>
                                  </div>
                              </div>
                              <hr>
                              <h5>Kontrak</h5>
                              <div class="row">
                                  <div class="col-sm-3">
                                      <div class="form-group">
                                          <label for="nomor_kontrak">No. / Tanggal Kontrak</label>
                                          <input type="text" name="nomor_kontrak" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-sm-3">
                                      <div class="form-group">
                                          <label for="nilai_kontrak">Nilai Kontrak</label>
                                          <input type="text" name="nilai_kontrak" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-sm-3">
                                      <div class="form-group">
                                          <label for="selesai_kontrak">Selesai Kontrak</label>
                                          <input type="date" name="selesai_kontrak" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-sm-3">
                                      <div class="form-group">
                                          <label for="serah_terima">BA Serah Terima</label>
                                          <select id="inputStatus" name="serah_terima" class="form-control custom-select">
                                              <option selected disabled>Select one</option>
                                              <option value="0">Selesai</option>
                                              <option value="1">Proses</option>
                                              <option value="2">Ditahan</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-12">
                                      <a href="#" class="btn btn-secondary">Cancel</a>
                                      <input type="submit" value="Create new Porject" class="btn btn-success float-right">
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