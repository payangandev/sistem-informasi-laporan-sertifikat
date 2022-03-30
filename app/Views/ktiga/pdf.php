<html>
<body>
 <div>
    <table cellspacing="1" cellpadding="4" >
         <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Unit</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
                <th>Staff</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($asset as $key => $row) { ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $row['nama_kendaraan']; ?></td>
                        <td><?php echo $row['tanggal_masuk']; ?></td>
                        <td><?php echo $row['unit']; ?></td>
                        <td>Rp.<?php echo number_format($row['harga'], 2,  ",", ".");?> </td>
                        <td>Rp.<?php echo number_format($row['jumlah'], 2,  ",", ".");?> </td>
                        <td><?php echo $row['kondisi']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td><?php echo $row['nama_karyawan']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
 </body>
</html>