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
                            <h6 class="m-0 font-weight-bold text-primary text-left"> List Sertifikasi ISO  </h6>
                        <br>
                        <a href="<?php echo base_url('iso/pdf'); ?>" target="_blank" class="btn btn-outline-danger float-left">
                        <i class="nav-icon fas fa-print"></i> &ensp;&ensp; PDF</a>
                        <?php if(session()->get('level') == 1 || session()->get('level') == 2) { ?>
                        <a href="<?php echo base_url('iso/excel'); ?>" method="POST" class="btn btn-outline-success float-left">
                        <i class="nav-icon fas fa-file-excel"></i> &ensp; EXCEL</a>
                        <?php } ?>
                        
                            <a href="<?php echo base_url('iso/create'); ?>" class="btn btn-outline-primary float-right"><i class="nav-icon fas fa-plus-square"></i>  Tambah Data</a>

                        </div>
                        <div class="card-body">
                          <?php
                        if (!empty(session()->getFlashdata('success'))) { ?>
                            <div class="alert alert-success">
                                <?php echo session()->getFlashdata('success'); ?>
                            </div>
                        <?php } ?>

                        <?php if (!empty(session()->getFlashdata('info'))) { ?>
                            <div class="alert alert-info">
                                <?php echo session()->getFlashdata('info'); ?>
                            </div>
                        <?php } ?>

                        <?php if (!empty(session()->getFlashdata('warning'))) { ?>
                            <div class="alert alert-warning">
                                <?php echo session()->getFlashdata('warning'); ?>
                            </div>
                        <?php } ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Perusahaan</th>
                                        <th>Kode Iso</th>
                                        <th>Tanggal Terbit</th>
                                        <th>Survailance 1</th>
                                        <th>Survailance 2</th>
                                        <th>Tanggal Berakhir</th>
                                        <th>Tanggal Proses</th>
                                        <th>Tanggal Selesai</th>
                                        <th>No Resi</th>
                                        <th>Marketing</th>
                                        <th>Harga Jual</th>
                                        <?php if(session()->get('level') == 1 || session()->get('level') == 2) { ?>
                                        <th>Actions</th>
                                        <?php } ?>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($iso as $key => $row) { ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $row['nama_perusahaan']; ?></td>
                                            <td><?php echo $row['kode_iso']; ?></td>
                                            <td><?php echo $row['tanggal_terbit']; ?></td>
                                            <td><?php echo $row['survailance_one']; ?></td>
                                            <td><?php echo $row['survailance_two']; ?></td>
                                            <td><?php echo $row['tanggal_berakhir']; ?></td>
                                            <td><?php echo $row['tanggal_proses']; ?></td>
                                            <td><?php echo $row['tanggal_selesai']; ?></td>
                                            <td><?php echo $row['no_resi']; ?></td>
                                            <td><?php echo $row['marketing']; ?></td>
                                            <td>Rp.<?php echo number_format($row['harga_jual'], 2,  ",", ".");?> </td>
                                            <?php if(session()->get('level') == 1 || session()->get('level') == 2) { ?>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('iso/edit/' . $row['iso_id']); ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('iso/delete/' . $row['iso_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
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