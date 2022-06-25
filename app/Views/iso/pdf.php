<html>

<body>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Sertifikat</th>
                    <th scope="col">Kode Iso</th>
                    <th scope="col">Tanggal Terbit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($iso as $key => $row) { ?>
                    <tr>
                        <td scope="row"><?php echo $key + 1; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['kode_iso']; ?></td>
                        <td><?php echo $row['tanggal_terbit']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>