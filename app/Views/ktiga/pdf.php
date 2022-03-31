<html>
<body>
 <div>
    <table cellspacing="1" cellpadding="4" >
         <thead>
            <tr>
                <th>No</th>
                <th>Nama Personil</th>
                <th>Sub Bidang</th>
                <th>Perusahaan</th>
                <th>Harga Setor</th>
                <th>Order Lencana</th>
                <th>Harga Jual</th>
                <th>Tanggal Proses</th>
                <th>Marketing</th>
                <th>Tanggal Selesai</th>
                <th>No Resi</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($ktiga as $key => $row) { ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $row['nama_personil']; ?></td>
                        <td><?php echo $row['sub_bidang']; ?></td>
                        <td><?php echo $row['nama_perusahaan']; ?></td>
                        <td>Rp.<?php echo number_format($row['harga_setor'], 2,  ",", ".");?> </td>
                        <td><?php echo $row['order_lencana']; ?></td>
                        <td>Rp.<?php echo number_format($row['harga_jual'], 2,  ",", ".");?> </td>
                        <td><?php echo $row['tanggal_proses']; ?></td>
                        <td><?php echo $row['marketing']; ?></td>
                        <td><?php echo $row['tanggal_selesai']; ?></td>
                        <td><?php echo $row['no_resi']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
 </body>
</html>