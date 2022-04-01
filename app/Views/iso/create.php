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
                    <h1 class="h3 mb-2 text-gray-800 text-center">PT FORTUNA BERKAH BERSAMA </h1>
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
                                                  'name'  => 'survailance_one',
                                                  'id'    => 'survailance_one',
                                                  'value' => $inputs['survailance_one'],
                                                  'class' => 'form-control',
                                                ];
                                                echo form_input($survailance_one);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Tanggal Selesai');
                                                $tanggal_selesai = [
                                                  'type'  => 'date',
                                                  'name'  => 'tanggal_selesai',
                                                  'id'    => 'tanggal_selesai',
                                                  'value' => $inputs['tanggal_selesai'],
                                                  'class' => 'form-control',
                                                ];
                                                echo form_input($tanggal_selesai);
                                                ?>
                                              </div>
                                             </div>
                                            <div class="col-md-6">
                                             <div class="form-group">
                                                <?php
                                                echo form_label('Survailance 2');
                                                $survailance_two = [
                                                  'type'  => 'date',
                                                  'name'  => 'survailance_two',
                                                  'id'    => 'survailance_two',
                                                  'value' => $inputs['survailance_two'],
                                                  'class' => 'form-control',
                                                ];
                                                echo form_input($survailance_two);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Tanggal Berakhir');
                                                $tanggal_berakhir = [
                                                  'type'  => 'date',
                                                  'name'  => 'tanggal_berakhir',
                                                  'id'    => 'tanggal_berakhir',
                                                  'value' => $inputs['tanggal_berakhir'],
                                                  'class' => 'form-control',
                                                ];
                                                echo form_input($tanggal_berakhir);
                                                ?>
                                              </div>
                                              <div class="form-group">
                                                <?php
                                                echo form_label('Tanggal Proses');
                                                $tanggal_proses = [
                                                  'type'  => 'date',
                                                  'name'  => 'tanggal_proses',
                                                  'id'    => 'tanggal_proses',
                                                  'value' => $inputs['tanggal_proses'],
                                                  'class' => 'form-control',
                                                ];
                                                echo form_input($tanggal_proses);
                                                ?>
                                              </div>
                                               <div class="form-group">
                                                <?php
                                                echo form_label('No Resi');
                                                $stock_akhir = [
                                                  'type'  => 'text',
                                                  'name'  => 'no_resi',
                                                  'id'    => 'no_resi',
                                                  'value' => $inputs['no_resi'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'No Resi'
                                                ];
                                                echo form_input($stock_akhir);
                                                ?>
                                               </div>
                                               <div class="form-group">
                                                <?php
                                                echo form_label('Marketing');
                                                $stock_akhir = [
                                                  'type'  => 'text',
                                                  'name'  => 'marketing',
                                                  'id'    => 'marketing',
                                                  'value' => $inputs['marketing'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Marketing'
                                                ];
                                                echo form_input($stock_akhir);
                                                ?>
                                               </div>
                                              </div>
                                              <div class="col-md-12">
                                               <div class="form-group">
                                                <?php
                                                echo form_label('Harga Jual');
                                                $harga_jual = [
                                                  'type'  => 'number',
                                                  'name'  => 'harga_jual',
                                                  'id'    => 'harga_jual',
                                                  'value' => $inputs['harga_jual'],
                                                  'class' => 'form-control',
                                                  'placeholder' => 'Harga Jual Sertifikat'
                                                ];
                                                echo form_input($harga_jual);
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