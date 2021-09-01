<html>
<body>
 <div>
    <table cellspacing="3" cellpadding="4" >
         <thead>
              <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Type</th>
                  <th>Number</th>
                  <th>Judul</th>
                  <th>Vendor</th>
                  <th>Bahasa</th>
                  <th>Status</th>
                  <th>Tanggal Masuk</th>
                  <th>Staff</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($documentmasuk as $key => $row) { ?>
                  <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td><?php echo $row['kode_dokumen']; ?></td>
                      <td><?php echo $row['document_type']; ?></td>
                      <td><?php echo $row['document_number']; ?></td>
                      <td><?php echo $row['judul_dokumen']; ?></td>
                      <td><?php echo $row['vendor']; ?></td>
                      <td><?php echo $row['bahasa']; ?></td>
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