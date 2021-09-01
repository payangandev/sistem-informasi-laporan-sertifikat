<html>
<body>
 <div>
    <table cellspacing="3" cellpadding="4" >
        <thead>
           <tr>
               <th>No</th>
               <th>Nama Users</th>
               <th>username</th>
               <th>password</th>
               <th>level</th>
           </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $key => $row) { ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $row['nama_user']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['level']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
 </body>
</html>