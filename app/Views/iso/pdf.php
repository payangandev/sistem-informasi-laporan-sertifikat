<html>
<body>
 <div>
    <table cellpadding="4" >
        <thead>
         <tr>
             <th>No</th>
             <th>Tanggal </th>
             <th>Kode </th>
             <th>Nama </th>
             <th>Merk</th>
             <th>Vol</th>
             <th>Satuan</th>
             <th>Harga</th>
             <th>Jumlah</th>
             <th>kondisi</th>
             <th>Keterangan</th>
             <th>Staff</th>
         </tr>
         </thead>
         <tbody>
             <?php foreach ($audiovisual as $key => $row) { ?>
                 <tr>
                     <td><?php echo $key + 1; ?></td>
                     <td><?php echo $row['tanggal_masuk']; ?></td>
                     <td><?php echo $row['kode_inventaris']; ?></td>
                     <td><?php echo $row['nama_item']; ?></td>
                     <td><?php echo $row['merk']; ?></td>
                     <td><?php echo $row['vol']; ?></td>
                     <td><?php echo $row['satuan']; ?></td>
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