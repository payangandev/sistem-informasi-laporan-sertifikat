<html>
<body>
 <div>
    <table cellspacing="3" cellpadding="4" >
         <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Divisi </th>
                <th>Jabatan </th>
                <th>Status </th>
                <th>Tanggal Masuk</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($karyawan as $key => $row) { ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $row['nama_karyawan']; ?></td>
                        <td><?php echo $row['divisi']; ?></td>
                        <td><?php echo $row['jabatan']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['tanggalmasuk']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
 </body>
</html>