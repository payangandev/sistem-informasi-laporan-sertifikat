<html>
<body>
 <div>
    <table cellspacing="3" cellpadding="4" >
       <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kode </th>
                <th>Harga </th>
                <th>Jumlah</th>
                <th>beli </th>
                <th>total</th>
                <th>kondisi</th>
                <th>Staff</th>
            </tr>
        </thead>
          <tbody>
              <?php foreach ($furniture as $key => $row) { ?>
                  <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td><?php echo $row['nama_item']; ?></td>
                      <td><?php echo $row['kode']; ?></td>
                      <td>Rp.<?php echo number_format($row['harga'], 2,  ",", ".");?> </td>
                      <td><?php echo $row['qty']; ?></td>
                      <td><?php echo $row['tanggal_beli']; ?></td>
                      <td>Rp.<?php echo number_format($row['total'], 2,  ",", ".");?> </td>
                      <td><?php echo $row['kondisi']; ?></td>
                      <td><?php echo $row['nama_karyawan']; ?></td>
                  </tr>
              <?php } ?>
          </tbody>
        </table>
    </div>
 </body>
</html>