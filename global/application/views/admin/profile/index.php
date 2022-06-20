 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $this->session->userdata('nama'); ?></h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Sisa Cuti</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Tahun Masuk</b> <a class="float-right">543</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="tab-pane" id="settings">
                  <form action="<?php echo base_url() ?>admin/update_profile" method="post">                 
                      <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id='nama' name="nama" value="<?php echo $nama?>">
                          <?php echo form_error('nama'); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>">
                          <?php echo form_error('email'); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="password" name="password" value="<?php echo $password?>">
                          <?php echo form_error('password'); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Confirm Password</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="password" name="confirm_password"  value="<?php echo $confirm_password?>">
                          <?php echo form_error('confirm_password'); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tahun_bulan" class="col-sm-4 col-form-label">Bulan/Tahun Masuk</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="tahun_bulan" disabled value='<?php echo $bulan_tahun ?>'>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  
                  <!-- /.tab-pane -->
                
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->