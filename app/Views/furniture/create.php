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
                            <h6 class="m-0 font-weight-bold text-primary text-left">Form Tambah Data Furniture </h6>
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
                                      <?php echo form_open_multipart('furniture/store'); ?>
                                      <div class="card">
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Nama Furniture');
                                                $furniture = [
                                                  'type'  => 'text',
                                                  'name'  => 'nama_item',
                                                  'id'    => 'nama_item',
                                                  'value' => $inputs['nama_item'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Masukan Nama Furniture'
                                                ];
                                                echo form_input($furniture);
                                                ?>
                                              </div>

                                              <div class="form-group">
                                                <?php
                                                echo form_label('Kode Furniture');
                                                $kode = [
                                                  'type'  => 'text',
                                                  'name'  => 'kode',
                                                  'id'    => 'kode',
                                                  'value' => $inputs['kode'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Masukan Kode barang'
                                                ];
                                                echo form_input($kode);
                                                ?>
                                              </div>

                                              <div class="form-group">
                                                <?php
                                                echo form_label('Harga Furniture');
                                                $harga = [
                                                  'type'  => 'number',
                                                  'name'  => 'harga',
                                                  'id'    => 'harga',
                                                  'value' => $inputs['harga'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Masukan Harga Furniture'
                                                ];
                                                echo form_input($harga);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Qty Furniture');
                                                $qty = [
                                                  'type'  => 'number',
                                                  'name'  => 'qty',
                                                  'id'    => 'qty',
                                                  'value' => $inputs['qty'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Masukan Qty Furniture'
                                                ];
                                                echo form_input($qty);
                                                ?>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Tanggal Beli');
                                                $stock_masuk = [
                                                  'type'  => 'date',
                                                  'name'  => 'tanggal_beli',
                                                  'id'    => 'tanggal_beli',
                                                  'value' => $inputs['tanggal_beli'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Tanggal Beli Furniture'
                                                ];
                                                echo form_input($stock_masuk);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Total');
                                                $total = [
                                                  'type'  => 'number',
                                                  'name'  => 'total',
                                                  'id'    => 'total',
                                                  'value' => $inputs['total'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Masukan Total Furniture'
                                                ];
                                                echo form_input($total);
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
                                        <a href="<?php echo base_url('furniture'); ?>" class="btn btn-outline-info float-left"> <i class="nav-icon fas fa-backward"></i> Back</a>
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