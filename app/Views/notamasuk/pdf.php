<html>
<body>
 <div>
    <table cellspacing="3" cellpadding="4" >
       <thead>
             <tr>
                 <th>No</th>
                 <th>Kode Nota</th>
                 <th>Vendor Receiver</th>
                 <th>Nama Barang</th>
                 <th>Jumlah Barang</th>
                 <th>Status Barang</th>
                 <th>Tanggal Masuk</th>
                 <th>Staff</th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($notamasuk as $key => $row) { ?>
                 <tr>
                     <td><?php echo $key + 1; ?></td>
                      <td><?php echo $row['kode_nota']; ?></td>
                     <td><?php echo $row['vendor']; ?></td>
                     <td><?php echo $row['nama_barang']; ?></td>
                     <td><?php echo $row['jumlah_barang']; ?></td>
                     <td><?php echo $row['status_document']; ?></td>
                     <td><?php echo $row['tanggal_masuk']; ?></td>
                     <td><?php echo $row['nama_karyawan']; ?></td>
                 </tr>
             <?php } ?>
         </tbody>
        </table>
    </div>
 </body>
</html>