<html>

<body>
    <div>
        <table cellspacing="3" cellpadding="4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Client</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($client as $key => $row) { ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>