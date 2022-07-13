<html>

<body>
    <div>
        <table cellspacing="3" cellpadding="4">
            <thead>
                <tr>
                    <th style="text-align: center">No</th>
                    <th style="text-align: center">Nama Client</th>
                    <th style="text-align: center">Email</th>
                    <th style="text-align: center">Alamat</th>
                    <th style="text-align: center">Telephone</th>
                    <th style="text-align: center">Pic</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($client as $key => $row) { ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['telephone']; ?></td>
                        <td><?php echo $row['pic']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>