<html>

<body>
    <div>
        <table cellspacing="1" cellpadding="4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Sub Bidang</th>
                    <th>Kode</th>
                    <th>Tanggal Terbit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ktiga as $key => $row) { ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $row['sub_bidang']; ?></td>
                        <td><?php echo $row['kode']; ?></td>
                        <td><?php echo $row['tanggal_terbit']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>