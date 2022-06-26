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
                        <h1 class="h3 mb-2 text-gray-800 text-center">PT FORTUNA MANAGEMENT CERTIFICATION</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-left"> List Data K3</h6> <br>

                            <a href="<?php echo base_url('ktiga/pdf'); ?>" target="_blank" class="btn btn-outline-danger float-left">
                                <i class="nav-icon fas fa-print"></i> &ensp;&ensp; PDF</a>
                            <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
                                <a href="<?php echo base_url('ktiga/excel'); ?>" method="POST" class="btn btn-outline-success float-left">
                                    <i class="nav-icon fas fa-file-excel"></i> &ensp; EXCEL</a>
                            <?php } ?>

                            <a href="<?php echo base_url('ktiga/create'); ?>" class="btn btn-outline-primary float-right"><i class="nav-icon fas fa-plus-square"></i> Tambah Data</a>

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
                                            <th>Sub Bidang</th>
                                            <th>Tanggal Terbit</th>
                                            <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
                                                <th>Actions</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ktiga as $key => $row) { ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['tanggal_terbit']; ?></td>
                                                <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="<?php echo base_url('ktiga/edit/' . $row['ktiga_id']); ?>" class="btn btn-sm btn-success">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="<?php echo base_url('ktiga/delete/' . $row['ktiga_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
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