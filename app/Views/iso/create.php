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
                    <h1 class="h3 mb-2 text-gray-800 text-center">Form Data Iso</h1>
                    <p class="mb-4 text-center">Menu Pendaftaran Untuk Sertifikasi ISO</p>

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
                                      <?php echo form_open_multipart('iso/store'); ?>
                                      <div class="card">
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group ">
                                                <?php
                                                echo form_label('Perusahaan', 'perusahaan');
                                                echo form_dropdown('perusahaan_id', $perusahaan, $inputs['perusahaan_id'], ['class' => 'form-control']);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Kode ISO');
                                                $kodeiso = [
                                                  'type'        => 'text',
                                                  'name'        => 'kode_iso',
                                                  'id'          => 'kode_iso',
                                                  'value'       => $inputs['kode_iso'],
                                                  'class'       => 'form-control',
                                                  'placeholder' => 'Masukan Kode Iso'
                                                ];
                                                echo form_input($kodeiso);
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
                                                  'class' => 'form-control',
                                                ];
                                                echo form_input($tanggal_terbit);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Survailance 1');
                                                $survailance_one = [
                                                  'type'  => 'date',
                                                  'name'  => 'tanggal_terbit',
                                                  'id'    => 'tanggal_terbit',
                                                  'value' => $inputs['tanggal_terbit'],
                                                  'class' => 'form-control',
                                                ];
                                                echo form_input($survailance_one);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Survailance 2');
                                                $tanggal_terbit = [
                                                  'type'  => 'date',
                                                  'name'  => 'tanggal_terbit',
                                                  'id'    => 'tanggal_terbit',
                                                  'value' => $inputs['tanggal_terbit'],
                                                  'class' => 'form-control',
                                                ];
                                                echo form_input($tanggal_terbit);
                                                ?>
                                              </div>
                                            

                                              <div class="form-group">
                                                <?php
                                                echo form_label('Jumlah');
                                                $stock_keluar = [
                                                  'type'  => 'number',
                                                  'name'  => 'jumlah',
                                                  'id'    => 'jumlah',
                                                  'value' => $inputs['jumlah'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Masukan Jumlah Audio'
                                                ];
                                                echo form_input($stock_keluar);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Kondisi Audio', 'kondisi');
                                                echo form_dropdown('kondisi', ['' => 'Pilih',
                                                  'BARU'          => 'BARU', 
                                                  'BEKAS'         => 'BEKAS'
                                                  ],
                                                  $inputs['kondisi'], ['class' => 'form-control']);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Keterangan');
                                                $stock_akhir = [
                                                  'type'  => 'text',
                                                  'name'  => 'keterangan',
                                                  'id'    => 'keterangan',
                                                  'value' => $inputs['keterangan'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Keterangan Audio'
                                                ];
                                                echo form_input($stock_akhir);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Satuan Audio', 'satuan');
                                                echo form_dropdown('satuan', ['' => 'Pilih',
                                                  'UNIT'        => 'UNIT', 
                                                  'BOX'         => 'BOX'
                                                  ],
                                                  $inputs['satuan'], ['class' => 'form-control']);
                                                ?>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card-footer">
                                        <a href="<?php echo base_url('iso'); ?>" class="btn btn-outline-info float-left"> <i class="nav-icon fas fa-backward"></i> Back</a>
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