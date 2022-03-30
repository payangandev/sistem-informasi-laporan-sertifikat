<html>
<body>
 <div>
    <table cellspacing="3" cellpadding="4" >
        <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Stock Awal</th>
            <th>Stock Masuk</th>
            <th>Stock Keluar</th>
            <th>Stock Akhir</th>
            <th>Staff</th>
             <hr>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($atk as $key => $row) { ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $row['kode_barang']; ?></td>
                    <td><?php echo $row['nama_barang']; ?></td>
                    <td><?php echo $row['jenis_barang']; ?></td>
                    <td><?php echo $row['stock_awal']; ?></td>
                    <td><?php echo $row['stock_masuk']; ?></td>
                    <td><?php echo $row['stock_keluar']; ?></td>
                    <td><?php echo $row['stock_akhir']; ?></td>
                    <td><?php echo $row['nama_karyawan']; ?></td>
                </tr>
            <?php } ?>
                </tbody>
        </table>
    </div>
 </body>
</html>