<html>

<body>
    <div>
        <table cellspacing="3" cellpadding="4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Users</th>
                    <th scope="col">username</th>
                    <th scope="col">password</th>
                    <th scope="col">level</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $key => $row) { ?>
                    <tr>
                        <td style="text-align: center"><?php echo $key + 1; ?></td>
                        <td style="text-align: center"><?php echo $row['nama_user']; ?></td>
                        <td style="text-align: center"><?php echo $row['username']; ?></td>
                        <td style="text-align: center"><?php echo $row['password']; ?></td>
                        <td style="text-align: center"><?php echo $row['level']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>