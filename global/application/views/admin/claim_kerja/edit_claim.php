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
                          <li class="breadcrumb-item active">Edit Claim</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <form action="<?php echo base_url() ?>admin/update_claim" method="POST" enctype="multipart/form-data">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card card-primary">
                          <div class="card-header">
                              <h3 class="card-title">Edit Claim Kunjungan Kerja</h3>
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
                                                  <td>Jumlah Pengeluaran</td>
                                                  <td>Keterangan Pengeluaran</td>
                                                  <td>Tanda terima / Invoice</td>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td><input type="text" id="nominal_claim" name="nominal_claim" class="form-control" value="<?php echo $claim->nominal;?>"></td>
                                                  <td>
                                                      <textarea name="keterangan" rows="4" class="form-control"><?php echo $claim->keterangan;?></textarea>
                                                  </td>
                                                  <td><input type="file" name="file_claim" class="form-control"><?php echo $claim->file_rembes;?>
                                                    <p><i>*Mohon upload invoice tidak lebih dari 5MB.</i></p></td>
                                          </tbody>
                                      </table>
                                  </div>
                          </div>
                          <div class="row">
                              <div class="col-12">
                              <input type="hidden" name="id_rembes" value="<?php echo $claim->id_rembes;?>">
                                  <a href="<?php echo base_url() ?>admin/claim" class="btn btn-secondary">Cancel</a>
                                  <input type="submit" value="Edit Claim" class="btn btn-success float-right">
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