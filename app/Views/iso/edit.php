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
                            <h6 class="m-0 font-weight-bold text-primary text-left">Form Tambah Data Iso </h6>
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
                                      <div class="card">
                                        <?php echo form_open_multipart('iso/update/' . $iso['iso_id']); ?>
                                        <div class="card-body">
                                          <?php echo form_hidden('iso_id', $iso['iso_id']); ?>
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div div class="form-group">
                                                 <?php echo form_label('Perusahaan', 'perusahaan'); ?>
                                                 <?php echo form_dropdown('perusahaan_id', $perusahaan, $iso['perusahaan_id'], ['class' => 'form-control']); ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Kode Iso', 'kode_iso'); ?>
                                                <?php echo form_input('kode_iso', $iso['kode_iso'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Tanggal Terbit', 'tanggal_terbit'); ?>
                                                <?php echo form_input('tanggal_terbit', $iso['tanggal_terbit'],

                                                 ['class' => 'form-control']
                                                 
                                                 ); ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Survailance 1', 'survailance_one'); ?>
                                                <?php echo form_input('survailance_one', $iso['survailance_one'],

                                                 ['class' => 'form-control']
                                                 
                                                 ); ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Survailance 2 ', 'survailance_two'); ?>
                                                <?php echo form_input('survailance_two', $iso['survailance_two'],

                                                 ['class' => 'form-control']
                                                 
                                                 ); ?>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <?php echo form_label('Tanggal Berakhir ', 'tanggal_berakhir'); ?>
                                                <?php echo form_input('tanggal_berakhir', $iso['tanggal_berakhir'],

                                                 ['class' => 'form-control']
                                                 
                                                 ); ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Tanggal Proses ', 'tanggal_proses'); ?>
                                                <?php echo form_input('tanggal_proses', $iso['tanggal_proses'],

                                                 ['class' => 'form-control']
                                                 
                                                 ); ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Tanggal Selesai ', 'tanggal_selesai'); ?>
                                                <?php echo form_input('tanggal_selesai', $iso['tanggal_selesai'],

                                                 ['class' => 'form-control']
                                                 
                                                 ); ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('No Resi', 'no_resi'); ?>
                                                <?php echo form_input('no_resi', $iso['no_resi'],

                                                 ['class' => 'form-control']
                                                 
                                                 ); ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Marketing', 'marketing'); ?>
                                                <?php echo form_input('marketing', $iso['marketing'],

                                                 ['class' => 'form-control']
                                                 
                                                 ); ?>
                                              </div>
                                             </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <?php echo form_label('Harga Jual ', 'harga_jual'); ?>
                                                <?php echo form_input('harga_jual', $iso['harga_jual'],

                                                 ['class' => 'form-control']
                                                 
                                                 ); ?>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card-footer">
                                        <a href="<?php echo base_url('iso'); ?>" class="btn btn-outline-info"> <i class="nav-icon fas fa-backward"></i> Back</a>
                                        <button type="submit" class="btn btn-primary float-right"> <i class="nav-icon fas fa-save"></i> Update Data</button>
                                      </div>
                                      <?php echo form_close(); ?>
                                    </div>
                                  </div> 
                              
                               </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php echo view('_partials/footer')?>

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