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
                    <h1 class="h3 mb-2 text-gray-800 text-center">Form Data K3</h1>
                    <p class="mb-4 text-center">Pengecekan data secara rutin akan terciptanya konsistensi data yang baik</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-left">Form Edit Data K3 </h6>
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
                                        <?php echo form_open_multipart('ktiga/update/' . $ktiga['ktiga_id']); ?>
                                        <div class="card-body">
                                          <?php echo form_hidden('ktiga_id', $ktiga['ktiga_id']); ?>
                                          <div class="row">
                                            <div class="col-md-6">

                                              <div class="form-group">
                                                <?php echo form_label('Nama Personil', 'nama_personil'); ?>
                                                <?php echo form_input('nama_personil', 
                                                $ktiga['nama_personil'],['class' => 'form-control']); ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Bidang', 'sub_bidang');
                                                echo form_dropdown('sub_bidang', [
                                                  '' => 'Pilih Bidang',
                                                  'AHLI K3 UMUM'                            => 'AHLI K3 UMUM', 
                                                  'AHLI MADYA K3 KONTRUKSI'                 => 'AHLI MADYA K3 KONTRUKSI',
                                                  'AHLI K3 BIDANG LISTRIK'                  => 'AHLI K3 BIDANG LISTRIK',
                                                  'SKP AHLI K3 LIFT & EKSKALATOR'           => 'SKP AHLI K3 LIFT & EKSKALATOR',
                                                  'TENAGA KERJA PADA KETINGGIAN TINGKAT 1 ' => 'TENAGA KERJA PADA KETINGGIAN TINGKAT 1'
                                                ], $inputs['jenis_barang'], ['class' => 'form-control']);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                 <?php echo form_label('Nama Perusahaan', 'perusahaan'); ?>
                                                 <?php echo form_dropdown('perusahaan_id', $perusahaan, $ktiga['perusahaan_id'], ['class' => 'form-control']); ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Harga Setor', 'harga_setor'); ?>
                                                <?php echo form_input('harga_setor', $ktiga['harga_setor'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                                <div class="form-group">
                                                <?php echo form_label('Order Lencana', 'order_lencana'); ?>
                                                <?php echo form_input('order_lencana', $ktiga['order_lencana'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                          
                                              <div class="form-group">
                                                <?php echo form_label( 'Harga Jual', 'harga_jual'); ?>
                                                <?php echo form_input('harga_jual', $ktiga['harga_jual'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>

                                              <div class="form-group">
                                                <?php echo form_label('Tanggal Proses', 'tanggal_proses'); ?>
                                                <?php echo form_input('tanggal_proses', $ktiga['tanggal_proses'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Marketing', 'marketing'); ?>
                                                <?php echo form_input('marketing', $ktiga['marketing'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Tanggal Selesai', 'tanggal_selesai'); ?>
                                                <?php echo form_input('tanggal_selesai', $ktiga['tanggal_selesai'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('No Resi', 'tanggal_selesai'); ?>
                                                <?php echo form_input('tanggal_selesai', $ktiga['tanggal_selesai'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card-footer">
                                        <a href="<?php echo base_url('ktiga'); ?>" class="btn btn-outline-info"> <i class="nav-icon fas fa-backward"></i> Back</a>
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