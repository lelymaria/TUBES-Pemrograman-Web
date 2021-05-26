<a href="">Tambah Data</a>

<hr>

<table border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>No</th>
            <th>Email Admin</th>
            <th>Opsi</th>
        </tr>
    </thead>

    <tbody>
        <?php
            $nomor = 0;
            $sql = "SELECT * FROM kelola_admin ORDER BY Email ASC";
            $result = $object->query($sql);

            if ($result -> num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                }
            } else {
                echo "<tr><td colspan='3' align='center'><b><i>Data Tidak Ada</i></b></td></tr>";
            }
        ?>
    </tbody>
</table>