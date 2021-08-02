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
                          <li class="breadcrumb-item"><a href="<?php echo base_url() ?>admin">Home</a></li>
                          <li class="breadcrumb-item active">Ajukan Claim</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <form action="<?php echo base_url() ?>admin/simpan_claim" method="POST" enctype="multipart/form-data">
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
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label for="nama_paket">Pilih Paket Pekerjaan</label>
                                          <select name="nama_paket" class="form-control">
                                              <?php foreach ($project as $p): ?>
                                              <option value="<?php echo $p->id_project?>"><?php echo $p->nama_paket?></option>
                                              <?php endforeach?>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <table id="claim" class="table">
                                          <thead>
                                              <tr>
                                                  <td>No.</td>
                                                  <td>Nominal</td>
                                                  <td>Keterangan</td>
                                                  <td>Tanda terima / Invoice</td>
                                                  <td>Aksi</td>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td>1</td>
                                                  <td><input type="text" id="nominal_claim" name="nominal_claim[]" class="form-control"></td>
                                                  <td>
                                                      <textarea name="keterangan[]" rows="3" class="form-control"></textarea>
                                                  </td>
                                                  <td><input type="file" name="file_claim[]" class="form-control"></td>
                                                  <td><button type="button" name="tambah" id="tambah" class="btn btn-success">Tambah data</button></td> </tr>
                                          </tbody>
                                      </table>
                                  </div>
                          </div>
                          <div class="row">
                              <div class="col-12">
                                  <a href="<?php echo base_url() ?>admin/project" class="btn btn-secondary">Cancel</a>
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