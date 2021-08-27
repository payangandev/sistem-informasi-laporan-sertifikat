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
                    <h1 class="h3 mb-2 text-gray-800 text-center">Form Data Furniture</h1>
                    <p class="mb-4 text-center">Pengecekan data secara rutin akan terciptanya konsistensi data yang baik</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-left">Form Edit Data Furniture </h6>
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
                                        <?php echo form_open_multipart('furniture/update/' . $furniture['furniture_id']); ?>
                                        <div class="card-body">
                                          <?php echo form_hidden('furniture_id', $furniture['furniture_id']); ?>
                                          <div class="row">
                                            <div class="col-md-6">

                                              <div class="form-group">
                                                <?php echo form_label('Nama Furniture', 'nama_item'); ?>
                                                <?php echo form_input('nama_item', $furniture['nama_item'],

                                                 ['class' => 'form-control']
                                                 
                                                 ); ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Kode Furniture', 'kode'); ?>
                                                <?php echo form_input('kode', $furniture['kode'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Harga Furniture', 'harga'); ?>
                                                <?php echo form_input('harga', $furniture['harga'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Qty Furniture', 'qty'); ?>
                                                <?php echo form_input('qty', $furniture['qty'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <?php echo form_label('Tanggal Beli', 'tanggal_beli'); ?>
                                                <?php echo form_input('tanggal_beli', $furniture['tanggal_beli'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>

                                               <div class="form-group">
                                                <?php echo form_label('Total', 'total'); ?>
                                                <?php echo form_input('total', $furniture['total'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                               <div class="form-group">
                                                <?php echo form_label('Kondisi', 'kondisi'); ?>
                                                <?php echo form_input('kondisi', $furniture['kondisi'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                               <div class="form-group">
                                                 <?php echo form_label('Staff Verified', 'karyawan'); ?>
                                                 <?php echo form_dropdown('karyawan_id', $karyawan, $furniture['karyawan_id'], ['class' => 'form-control']); ?>
                                                </div>

                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card-footer">
                                        <a href="<?php echo base_url('furniture'); ?>" class="btn btn-outline-info"> <i class="nav-icon fas fa-backward"></i> Back</a>
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