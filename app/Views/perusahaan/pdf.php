<html>
<body>
 <div>
    <table cellspacing="3" cellpadding="4" >
         <thead>
              <tr>
                  <th>No</th>
                  <th>Nama Perusahaan</th>
                  <th>Tanggal Terdaftar</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($documentmasuk as $key => $row) { ?>
                  <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td><?php echo $row['nama_perusahaan']; ?></td>
                      <td><?php echo $row['tanggal_input']; ?></td>
                    </tr>
              <?php } ?>
          </tbody>
        </table>
    </div>
 </body>
</html>