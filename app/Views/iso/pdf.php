<html>
<body>
 <div>
    <table class="table table-bordered" >
        <thead>
         <tr>
         <th scope="col">No</th>
         <th scope="col">Perusahaan</th>
         <th scope="col">Kode Iso</th>
         <th scope="col">Tanggal Terbit</th>
         <th scope="col">Survailance 1</th>
         <th scope="col">Survailance 2</th>
         <th scope="col">Tanggal Berakhir</th>
         <th scope="col">Tanggal Proses</th>
         <th scope="col">Tanggal Selesai</th>
         <th scope="col">No Resi</th>
         <th scope="col">Marketing</th>
         <th scope="col">Harga Jual</th>
         </tr>
         </thead>
         <tbody>
            <?php foreach ($iso as $key => $row) { ?>
                <tr>
                    <td scope="row"><?php echo $key + 1; ?></td>
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