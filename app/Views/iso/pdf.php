<html>
<body>
 <div>
    <table cellpadding="4" >
        <thead>
         <tr>
         <th>No</th>
         <th>Perusahaan</th>
         <th>Kode Iso</th>
         <th>Tanggal Terbit</th>
         <th>Survailance 1</th>
         <th>Survailance 2</th>
         <th>Tanggal Berakhir</th>
         <th>Tanggal Proses</th>
         <th>Tanggal Selesai</th>
         <th>No Resi</th>
         <th>Marketing</th>
         <th>Harga Jual</th>
         </tr>
         </thead>
         <tbody>
            <?php foreach ($iso as $key => $row) { ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $row['nama_perusahaan']; ?></td>
                    <td><?php echo $row['kode_iso']; ?></td>
                    <td><?php echo $row['tanggal_terbit']; ?></td>
                    <td><?php echo $row['survailance_one']; ?></td>
                    <td><?php echo $row['survailance_two']; ?></td>
                    <td><?php echo $row['tanggal_berakhir']; ?></td>
                    <td><?php echo $row['tanggal_proses']; ?></td>
                    <td><?php echo $row['tanggal_selesai']; ?></td>
                    <td><?php echo $row['no_resi']; ?></td>
                    <td><?php echo $row['marketing']; ?></td>
                    <td>Rp.<?php echo number_format($row['harga_jual'], 2,  ",", ".");?> </td>                
                </tr>
              <?php } ?>
           </tbody>
        </table>
    </div>
 </body>
</html>