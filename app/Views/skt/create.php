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
              <h6 class="m-0 font-weight-bold text-primary text-left">Form Tambah Data SKT </h6>
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
                      <?php echo form_open_multipart('skt/store'); ?>
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <?php
                                echo form_label('Nama');
                                $nama = [
                                  'type'  => 'text',
                                  'name'  => 'nama',
                                  'id'    => 'nama',
                                  'value' => $inputs['nama'],
                                  'class' => 'form-control',
                                  'placeholder' => 'Masukan Nama'
                                ];
                                echo form_input($nama);
                                ?>
                              </div>
                              <div class="form-group">
                                <?php
                                echo form_label('Tanggal Terbit');
                                $tanggal_terbit = [
                                  'type'  => 'date',
                                  'name'  => 'tanggal_terbit',
                                  'id'    => 'tanggal_terbit',
                                  'value' => $inputs['tanggal_terbit'],
                                  'class' => 'form-control'

                                ];
                                echo form_input($tanggal_terbit);
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <a href="<?php echo base_url('skt'); ?>" class="btn btn-outline-info float-left"> <i class="nav-icon fas fa-backward"></i> Back</a>
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