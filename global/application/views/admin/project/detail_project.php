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
            <li class="breadcrumb-item active">Project Detail</li>
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
        <h3 class="card-title">Projects Detail</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
            <div class="row">
              <div class="col-12">
                <h4>Recent Activity</h4>
                <?php foreach ($riwayat as $r): ?>
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" alt="user image">
                    <span class="username">
                      <?php echo $r->nama?>
                    </span>
                    <span class="description"><?php echo $r->update_date?></span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                  <?php echo $r->keterangan?>
                  </p>
                  <div>
                    <a href="<?php echo base_url().'admin/delete_history/'.$r->id_project.'/'.$r->id_aktivitas?>"><i class="far fa-trash-alt"></i></a>
                  </div>
                </div>
                <?php endforeach ?>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
            <h3 class="text-primary"><i class="fas fa-file"></i><?php echo $project->sub_pekerjaan ?></h3>
            <p class="text-muted"><?php echo $project->nama_paket ?></p>
            <br>
            <div class="text-muted">
              <p class="text-sm">Pemberi Pekerjaan / Client
                <b class="d-block"><?php echo $project->nama_ppk ?></b>
              </p>
              <p class="text-sm">Project Manager
                <b class="d-block">Tony Chicken</b>
              </p>
            </div>

            <h5 class="mt-5 text-muted">Project files</h5>
            <ul class="list-unstyled">
            <table width="400">
              <?php foreach ($file_project as $fp) : ?>
                <li>
                  <?php if ($fp->nama_file == NULL){?>
                    <tr>
                      <td>File Tidak Ada</td>
                    </tr>
                  <?php }else{?>
                    <tr>
                      <td><a href="<?php echo base_url() ?>assets/upload/project/<?php echo $fp->nama_file ?>" class="btn-link text-secondary">
                          <i class="far fa-fw fa-file-word"></i><?php echo $fp->nama_file ?></a></td>
                      <td><a href="<?php echo base_url().'admin/delete_file_project/'.$fp->id_file?>"><i class="fas fa-trash"></a></i>
                      </td>
                    </tr>
                    <?php }?>
                </li>
              <?php endforeach ?>
              </table>

            </ul>

            <div class="text-muted">
              <p class="text-sm">Upload File
              <div class="dropzone"></div>
              </p>
            </div>
            <div class="text-center mt-5 mb-3">
              <a id="simpan_file" class="btn btn-sm btn-primary">Simpan files</a>
              <a href="#" class="btn btn-sm btn-warning">Report contact</a>
            </div>
          </div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<form action="<?php echo base_url('admin/add_aktivitas_project/'.$this->uri->segment('3'))?>" method="POST">
        			<div class="col-sm-6">
        				<div class="form-group">
        					<label for="aktivitas">Update Aktivitas</label>
        					<textarea id="aktivitas" name="aktivitas" class="form-control" rows="5"></textarea>
        					<input type="submit" value="Tambah Project" class="btn btn-success float-right">
        				</div>
        			</div>
              </form>
        	</div>
        </div>
        
        <a href="<?php echo base_url()?>admin/project" class="btn btn-primary"><i
        		class="fas fa-arrow-left"></i>Kembali</a>

        </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->