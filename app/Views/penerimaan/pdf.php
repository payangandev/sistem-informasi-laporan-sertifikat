<html>

<body>
    <div>
        <table cellspacing="3" cellpadding="4">
            <thead>
                <tr>
                    <th style="text-align: center">No</th>
                    <th style="text-align: center">Nama Perusahaan</th>
                    <th style="text-align: center">Bukti Penerimaan</th>
                    <th style="text-align: center">Tanggal Penerimaan</th>
                    <th style="text-align: center">Proggress</th>
                    <th style="text-align: center">Actions</th>
                </tr>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($arsip as $key => $row) { ?>
                    <tr>
                        <td style="text-align: center"><?php echo $key + 1; ?></td>
                        <td style="text-align: justify"><?php echo $row['nama']; ?></td>
                        <td style="text-align: justify"><?php echo $row['bukti_penerimaan']; ?></td>
                        <td style="text-align: justify"><?php echo $row['proggress']; ?></td>
                        <td style="text-align: justify"><?php echo $row['tanggal_penerimaan']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>