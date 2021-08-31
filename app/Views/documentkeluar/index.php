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
                    <h1 class="h3 mb-2 text-gray-800 text-center">Data Document Keluar</h1>
                    <p class="mb-4 text-center">Pengecekan data secara rutin akan terciptanya konsistensi data yang baik</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-left">Form List Data Document Keluar </h6>
                        
                        <a href="<?php echo base_url('atk/pdf'); ?>" target="_blank" class="btn btn-outline-danger float-left">
                        <i class="nav-icon fas fa-print"></i> &ensp;&ensp; PDF</a>
                         
                        <a href="<?php echo base_url('atk/excel'); ?>" method="POST" class="btn btn-outline-success float-left">
                        <i class="nav-icon fas fa-file-excel"></i> &ensp; EXCEL</a>

                        
                            <a href="<?php echo base_url('documentkeluar/create'); ?>" class="btn btn-outline-success float-right"><i class="nav-icon fas fa-plus-square"></i>  Tambah Data</a>

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
                                        <th>Kode</th>
                                        <th>Type</th>
                                        <th>Number</th>
                                        <th>Judul</th>
                                        <th>Nomer Box</th>
                                        <th>Isi Box</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Vendor</th>
                                        <th>Bahasa</th>
                                        <th>Approved</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Staff</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($documentkeluar as $key => $row) { ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $row['kode_dokumen']; ?></td>
                                            <td><?php echo $row['document_type']; ?></td>
                                            <td><?php echo $row['document_number']; ?></td>
                                            <td><?php echo $row['judul_dokumen']; ?></td>
                                            <td><?php echo $row['nomer_box']; ?></td>
                                            <td><?php echo $row['isi_box']; ?></td>
                                            <td><?php echo $row['tanggal_keluar'];?></td>
                                            <td><?php echo $row['vendor']; ?></td>
                                            <td><?php echo $row['bahasa']; ?></td>
                                            <td><?php echo $row['approved']; ?></td>
                                            <td><?php echo $row['jabatan']; ?></td>
                                            <td><?php echo $row['status_document']; ?></td>
                                            <td><?php echo $row['nama_karyawan']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('documentkeluar/edit/' . $row['document_keluar_id']); ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('documentkeluar/delete/' . $row['document_keluar_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Type</th>
                                        <th>Number</th>
                                        <th>Judul</th>
                                        <th>Nomer Box</th>
                                        <th>Isi Box</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Vendor</th>
                                        <th>Bahasa</th>
                                        <th>Approved</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Staff</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
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