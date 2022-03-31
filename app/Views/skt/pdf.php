<html>
<body>
 <div>
    <table cellspacing="3" cellpadding="4" >
         <thead>
         <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Tanggal Input</th>
                <th>Staff</th>
                <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($skt as $key => $row) { ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['kode']; ?></td>
                    <td><?php echo $row['tanggal_input']; ?></td>
                    <td><?php echo $row['nama_karyawan']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
 </body>
</html>