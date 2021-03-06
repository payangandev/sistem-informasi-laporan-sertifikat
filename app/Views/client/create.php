<?php echo view('_partials/head'); ?>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php echo view('_partials/sidebar'); ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php echo view('_partials/topbar'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="card shadow mb-4">
            <h1 class="h3 mb-2 text-gray-800 text-center">PT FORTUNA MANAGEMENT CERTIFICATION</h1>
          </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary text-left">Form Tambah Data Client </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <div class="row">
                    <div class="col-md-12">
                      <?php
                      $inputs = session()->getFlashdata('inputs');
                      $errors = session()->getFlashdata('errors');
                      if (!empty($errors)) { ?>
                        <div class="alert alert-danger" role="alert">
                          Whoops! Ada kesalahan saat input data, yaitu:
                          <ul>
                            <?php foreach ($errors as $error) : ?>
                              <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                          </ul>
                        </div>
                      <?php } ?>
                      <?php echo form_open_multipart('client/store'); ?>
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <?php
                                echo form_label('Nama Perusahaan');
                                $nama = [
                                  'type'  => 'text',
                                  'name'  => 'nama',
                                  'id'    => 'nama',
                                  'value' => $inputs['nama'],
                                  'class' => 'form-control',
                                  'placeholder' => 'Masukan Nama client'
                                ];
                                echo form_input($nama);
                                ?>
                              </div>
                              <div class="form-group">
                                <?php
                                echo form_label('Email');
                                $email = [
                                  'type'  => 'text',
                                  'name'  => 'email',
                                  'id'    => 'email',
                                  'value' => $inputs['email'],
                                  'class' => 'form-control',
                                  'placeholder' => 'Masukan Email'
                                ];
                                echo form_input($email);
                                ?>
                              </div>
                              <div class="form-group">
                                <?php
                                echo form_label('Alamat');
                                $alamat = [
                                  'type'  => 'text',
                                  'name'  => 'alamat',
                                  'id'    => 'alamat',
                                  'value' => $inputs['alamat'],
                                  'class' => 'form-control',
                                  'placeholder' => 'Masukan Alamat'
                                ];
                                echo form_input($alamat);
                                ?>
                              </div>
                              <div class="form-group">
                                <?php
                                echo form_label('Telephone');
                                $telephone = [
                                  'type'  => 'text',
                                  'name'  => 'telephone',
                                  'id'    => 'telephone',
                                  'value' => $inputs['telephone'],
                                  'class' => 'form-control',
                                  'placeholder' => 'Masukan Telephone'
                                ];
                                echo form_input($telephone);
                                ?>
                              </div>
                              <div class="form-group">
                                <?php
                                echo form_label('PIC');
                                $pic = [
                                  'type'  => 'text',
                                  'name'  => 'pic',
                                  'id'    => 'pic',
                                  'value' => $inputs['pic'],
                                  'class' => 'form-control',
                                  'placeholder' => 'Masukan Pic'
                                ];
                                echo form_input($pic);
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <a href="<?php echo base_url('client'); ?>" class="btn btn-outline-info float-left"> <i class="nav-icon fas fa-backward"></i> Back</a>
                        <button type="submit" class="btn btn-primary float-right"><i class="nav-icon fas fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </div>
                  <?php echo form_close(); ?>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php echo view('_partials/footer') ?>

      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php echo view('_partials/logout'); ?>

  <?php echo view('_partials/script'); ?>
</body>

</html>