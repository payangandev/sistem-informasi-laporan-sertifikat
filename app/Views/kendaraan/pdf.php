<html>
<body>
 <div>
    <table cellspacing="2" cellpadding="4" >
       <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Kode </th>
            <th>Nama </th>
            <th>Merk</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
            <th>Keterangan</th>
            <th>Staff</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kendaraan as $key => $row) { ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $row['tanggal_masuk']; ?></td>
                <td><?php echo $row['kode_inventaris']; ?></td>
                <td><?php echo $row['nama_item']; ?></td>
                <td><?php echo $row['merek']; ?></td>
                <td><?php echo $row['satuan']; ?></td>
                <td>Rp.<?php echo number_format($row['harga'], 2,  ",", "."); ?></td>
                <td><?php echo $row['jumlah']; ?></td>
                <td><?php echo $row['kondisi']; ?></td>
                <td><?php echo $row['keterangan']; ?></td>
                <td><?php echo $row['nama_karyawan']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
    </div>
 </body>
</html>