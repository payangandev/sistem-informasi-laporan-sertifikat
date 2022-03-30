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
                    <h1 class="h3 mb-2 text-gray-800 text-center">Form Data Document Keluar</h1>
                    <p class="mb-4 text-center">Pengecekan data secara rutin akan terciptanya konsistensi data yang baik</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-left">Form Edit Data Document Keluar</h6>
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
                                        <?php echo form_open_multipart('documentkeluar/update/' . $documentkeluar['document_keluar_id']); ?>
                                        <div class="card-body">
                                          <?php echo form_hidden('document_keluar_id', $documentkeluar['document_keluar_id']); ?>
                                          <div class="row">
                                            <div class="col-md-6">
                                              
                                              <div class="form-group">
                                                <?php echo form_label('Kode Dokumen', 'kode_dokumen'); ?>
                                                <?php echo form_input('kode_dokumen', $documentkeluar['kode_dokumen'], 
                                                ['class' => 'form-control']);
                                                 ?>
                                              </div>

                                              <div class="form-group">
                                                <?php
                                                echo form_label('Tipe Dokumen', 'document_type');
                                                echo form_dropdown('document_type', [
                                                    ''             => 'Pilih', 
                                                    'BRIDGE'       => 'BRIDGE', 
                                                    'ALIGNMENT'    => 'ALIGNMENT',
                                                    'CULVERT'      => 'CULVERT',
                                                    'TUNNEL NO.3'  => 'TUNNEL NO.3',
                                                    'SUBGRADE'     => 'SUBGRADE'

                                                ], $inputs['document_type'], ['class' => 'form-control']);
                                                ?>
                                              </div>

                                              <div class="form-group">
                                                <?php echo form_label('Tanggal Keluar', 'tanggal_keluar'); ?>
                                                <?php echo form_input('tanggal_keluar', $documentkeluar['tanggal_keluar'],

                                                 ['class' => 'form-control']
                                                 
                                                 ); ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Dokumen Number', 'document_number'); ?>
                                                <?php echo form_input('document_number', $documentkeluar['document_number'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                               <div class="form-group">
                                                <?php echo form_label('Judul Dokumen', 'judul_dokumen'); ?>
                                                <?php echo form_input('judul_dokumen', $documentkeluar['judul_dokumen'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                              <div class="form-group">
                                                <?php echo form_label('Nomer Box', 'nomer_box'); ?>
                                                <?php echo form_input('nomer_box', $documentkeluar['nomer_box'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <?php echo form_label('Isi Dalam Box', 'isi_box'); ?>
                                                <?php echo form_input('isi_box', $documentkeluar['isi_box'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>

                                              <div class="form-group">
                                                <?php
                                                echo form_label('Bahasa Document', 'bahasa');
                                                echo form_dropdown('bahasa', [
                                                    ''          => 'Pilih', 
                                                    'ENGLISH & CHINESE'      => 'ENGLISH & CHINESE', 
                                                    'ENGLISH'                => 'ENGLISH',
                                                    'CHINESE'                => 'CHINESE'

                                                ], $inputs['bahasa'], ['class' => 'form-control']);
                                                ?>
                                              </div>

                                              <div class="form-group">
                                                <?php
                                                echo form_label('Vendor', 'vendor');
                                                echo form_dropdown('vendor', [
                                                    ''          => 'Pilih', 
                                                    'KCIC'      => 'KCIC', 
                                                    'CREC'      => 'CREC',
                                                    'CRDC'      => 'CRDC',
                                                    'CDJO'      => 'CDJO'

                                                ], $inputs['vendor'], ['class' => 'form-control']);
                                                ?>
                                              </div>

                                              <div class="form-group">
                                                <?php echo form_label('Approved', 'approved'); ?>
                                                <?php echo form_input('approved', $documentkeluar['approved'], 

                                                ['class' => 'form-control']);

                                                 ?>
                                              </div>

                                              <div class="form-group">
                                                <?php
                                                echo form_label('Jabatan', 'jabatan');
                                                echo form_dropdown('jabatan', [
                                                    ''                    => 'Pilih', 
                                                    'MANAGER'             => 'MANAGER', 
                                                    'STAFF'               => 'STAFF',
                                                    'TRANSLATOR'          => 'TRANSLATOR'
                                                ], $inputs['jabatan'], ['class' => 'form-control']);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Status Document', 'status_document');
                                                echo form_dropdown('status_document', [
                                                    ''           => 'Pilih', 
                                                    'Masuk'      => 'Masuk', 
                                                    'Keluar'     => 'Keluar'
                                                ], $inputs['status_document'], ['class' => 'form-control']);
                                                ?>
                                              </div>
                                            
                                         </div>
                                         <div class="col-md-12">
                                            <div class="form-group">
                                                 <?php echo form_label('Staff Verified', 'karyawan'); ?>
                                                 <?php echo form_dropdown('karyawan_id', $karyawan, $documentkeluar['karyawan_id'], ['class' => 'form-control']); ?>
                                            </div>
                                         </div>
                                        </div>
                                       </div>
                                      </div>
                                      <div class="card-footer">
                                        <a href="<?php echo base_url('documentkeluar'); ?>" class="btn btn-outline-info"> <i class="nav-icon fas fa-backward"></i> Back</a>
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