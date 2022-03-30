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
                    <h1 class="h3 mb-2 text-gray-800 text-center">Form Data Asset</h1>
                    <p class="mb-4 text-center">Pengecekan data secara rutin akan terciptanya konsistensi data yang baik</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-left">Form Tambah Data Asset </h6>
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
                                      <?php echo form_open_multipart('asset/store'); ?>
                                      <div class="card">
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Nama Asset');
                                                $nama_kendaraan = [
                                                  'type'  => 'text',
                                                  'name'  => 'nama_kendaraan',
                                                  'id'    => 'nama_kendaraan',
                                                  'value' => $inputs['nama_kendaraan'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Masukan Nama Asset'
                                                ];
                                                echo form_input($nama_kendaraan);
                                                ?>
                                              </div>

                                              <div class="form-group">
                                                <?php
                                                echo form_label('Tanggal Masuk');
                                                $tanggal_masuk = [
                                                  'type'  => 'date',
                                                  'name'  => 'tanggal_masuk',
                                                  'id'    => 'tanggal_masuk',
                                                  'value' => $inputs['tanggal_masuk'],
                                                  'class' => 'form-control',
                                                ];
                                                echo form_input($tanggal_masuk);
                                                ?>
                                              </div>
                                            <div class="form-group">
                                                <?php
                                                echo form_label('Unit Asset');
                                                $unit = [
                                                  'type'  => 'text',
                                                  'name'  => 'unit',
                                                  'id'    => 'unit',
                                                  'value' => $inputs['unit'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Masukan Unit Asset'
                                                ];
                                                echo form_input($unit);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Harga Asset');
                                                $harga = [
                                                  'type'  => 'number',
                                                  'name'  => 'harga',
                                                  'id'    => 'harga',
                                                  'value' => $inputs['harga'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Harga Asset'
                                                ];
                                                echo form_input($harga);
                                                ?>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Jumlah Asset');
                                                $jumlah_asset = [
                                                  'type'  => 'number',
                                                  'name'  => 'jumlah',
                                                  'id'    => 'jumlah',
                                                  'value' => $inputs['jumlah'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Masukan Jumlah Asset'
                                                ];
                                                echo form_input($jumlah_asset);
                                                ?>
                                              </div>
                                             <div class="form-group">
                                                <?php
                                                echo form_label('Kondisi Asset', 'kondisi');
                                                echo form_dropdown('kondisi', [
                                                  '' => 'Pilih',
                                                  'BARU'      => 'BARU', 
                                                  'BEKAS'     => 'BEKAS',
                                                  ],
                                                  $inputs['kondisi'], ['class' => 'form-control']);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Keterangan Asset');
                                                $keterangan_asset = [
                                                  'type'  => 'text',
                                                  'name'  => 'keterangan',
                                                  'id'    => 'keterangan',
                                                  'value' => $inputs['keterangan'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Keterangan Asset'
                                                ];
                                                echo form_input($keterangan_asset);
                                                ?>
                                              </div>
                                              <div class="form-group ">
                                                <?php
                                                echo form_label('Penanggung Jawab Data', 'staff');
                                                echo form_dropdown('karyawan_id', $karyawan, $inputs['karyawan_id'], ['class' => 'form-control']);
                                                ?>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card-footer">
                                        <a href="<?php echo base_url('asset'); ?>" class="btn btn-outline-info float-left"> <i class="nav-icon fas fa-backward"></i> Back</a>
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