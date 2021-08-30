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
                    <h1 class="h3 mb-2 text-gray-800 text-center">Form Data Multimedia</h1>
                    <p class="mb-4 text-center">Pengecekan data secara rutin akan terciptanya konsistensi data yang baik</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-left">Form Tambah Data Multimedia </h6>
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
                                        <?php echo form_open_multipart('multimedia/update/' . $multimedia['multimedia_id']); ?>
                                        <div class="card-body">
                                          <?php echo form_hidden('multimedia_id', $multimedia['multimedia_id']); ?>
                                          <div class="row">
                                            <div class="col-md-6">

                                              <div class="form-group">
                                                <?php echo form_label('Tanggal Masuk', 'tanggal_masuk'); ?>
                                                <?php echo form_input('tanggal_masuk', $multimedia['tanggal_masuk'],

                                                 ['class' => 'form-control']
                                                 
                                                 ); ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Kode Inventaris', 'kode_inventaris'); ?>
                                                <?php echo form_input('kode_inventaris', $multimedia['kode_inventaris'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                               <div class="form-group">
                                                <?php echo form_label('Nama Multimedia', 'nama_item'); ?>
                                                <?php echo form_input('nama_item', $multimedia['nama_item'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                               <div class="form-group">
                                                <?php echo form_label('merek Multimedia', 'merk'); ?>
                                                <?php echo form_input('merk', $multimedia['merk'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Satuan Multimedia', 'satuan');
                                                echo form_dropdown('satuan', [
                                                    ''          => 'Pilih', 
                                                    'UNIT'      => 'UNIT', 
                                                    'BOX'       => 'BOX'

                                                ], $inputs['satuan'], ['class' => 'form-control']);
                                                ?>
                                              </div>
                                            </div>
                                            <div class="col-md-6">

                                              <div class="form-group">
                                                <?php echo form_label('Harga Multimedia', 'harga'); ?>
                                                <?php echo form_input('harga', $multimedia['harga'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>

                                               <div class="form-group">
                                                <?php echo form_label('Jumlah Multimedia', 'jumlah'); ?>
                                                <?php echo form_input('jumlah', $multimedia['jumlah'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                               <div class="form-group">
                                                <?php echo form_label('Kondisi Multimedia', 'kondisi'); ?>
                                                <?php echo form_input('kondisi', $multimedia['kondisi'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                               <div class="form-group">
                                                <?php echo form_label('keterangan Multimedia', 'keterangan'); ?>
                                                <?php echo form_input('keterangan', $multimedia['keterangan'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Vol', 'vol'); ?>
                                                <?php echo form_input('vol', $multimedia['vol'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                 <?php echo form_label('Staff Verified', 'karyawan'); ?>
                                                 <?php echo form_dropdown('karyawan_id', $karyawan, $multimedia['karyawan_id'], ['class' => 'form-control']); ?>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card-footer">
                                        <a href="<?php echo base_url('multimedia'); ?>" class="btn btn-outline-info"> <i class="nav-icon fas fa-backward"></i> Back</a>
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