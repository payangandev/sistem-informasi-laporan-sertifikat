<html>

<body>
    <div>
        <table cellspacing="1" cellpadding="4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Sub Bidang</th>
                    <th scope="col">Tanggal Terbit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ktiga as $key => $row) { ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['tanggal_terbit']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>