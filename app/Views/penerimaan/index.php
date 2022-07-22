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
                        <h1 class="h3 mb-2 text-gray-800 text-center">PT FORTUNA MANAGEMENT CERTIFICATION </h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-left"> List Data Penerimaan Arsip </h6> <br>
                            <!-- <a href="<?php echo base_url('penerimaan/pdf'); ?>" target="_blank" class="btn btn-outline-danger float-left">
                                <i class="nav-icon fas fa-print"></i> &ensp;&ensp; PDF</a>

                            <a href="<?php echo base_url('penerimaan/excel'); ?>" method="POST" class="btn btn-outline-success float-left">
                                <i class="nav-icon fas fa-file-excel"></i> &ensp; EXCEL</a> -->

                            <a href="<?php echo base_url('penerimaan/create'); ?>" class="btn btn-outline-primary float-right"><i class="nav-icon fas fa-plus-square"></i> Tambah Data</a>

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
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Nama Perusahaan</th>
                                            <th style="text-align: center">Bukti Penerimaan</th>
                                            <th style="text-align: center">Tanggal Penerimaan</th>
                                            <th style="text-align: center">Proggress</th>
                                            <th style="text-align: center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($penerimaan as $key => $row) { ?>
                                            <tr>
                                                <td style="text-align: center"><?php echo $key + 1; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td style="text-align: center">
                                                <li>
                                                        <a href="<?= base_url('uploads/penerimaan/'.$row['bukti_penerimaan']) ?>" 
                                                        id="pseudo-dynamism" target="_blank"><i class="fa fa-search" aria-hidden="true"> <?php echo $row['bukti_penerimaan']; ?></i></a>
                                                </li>
                                                </td>
                                                <td ><?php echo $row['tanggal_penerimaan']; ?></td>
                                                <td><?php echo $row['proggress']; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url('penerimaan/edit/' . $row['penerimaan_id']); ?>" class="btn btn-sm btn-success" style="text-align: center;">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('penerimaan/delete/' . $row['penerimaan_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
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
            <?php echo view('_partials/footer') ?>

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