<html>

<body>
    <div>
        <table cellspacing="3" cellpadding="4">
            <thead>
                <tr>
                    <th style="text-align: center">No</th>
                    <th style="text-align: center">Nama Klien</th>
                    <th style="text-align: center">Karyawan</th>
                    <th style="text-align: center">Sertifikat</th>
                    <th style="text-align: center">Status</th>
                    <th style="text-align: center">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($arsip as $key => $row) { ?>
                    <tr>
                        <td style="text-align: center"><?php echo $key + 1; ?></td>
                        <td style="text-align: justify"><?php echo $row['nama']; ?></td>
                        <td style="text-align: justify"><?php echo $row['nama_kayawan']; ?></td>
                        <td style="text-align: justify"><?php echo $row['type_sertifikat']; ?></td>
                        <td style="text-align: center"><?php echo $row['status']; ?></td>
                        <td style="text-align: center"><?php echo $row['description']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>