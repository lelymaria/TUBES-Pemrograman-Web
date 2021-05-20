<form = method="POST">
    <table>
        <tr>
            <td>N</td>
            <td>
                <input type="text" name="Email">
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name"btn-tambah">
                    Tambah
                </button>
            </td>
        </tr>
    </table>
</form>

<?php
    if (isset($_POST['btn-tambah'])) {
        $Email = $POST['Email'];

        $sql = "INSERT INTO kategori VALUES('','$nsms_kategori');

        if ($object->query($sql) === TRUE) {
            echo "<script>alert('Berhasil');</script>
            echo <script>window.location.replace('?halaman=kategori;);</script>
            exit;
    } else {
            echo "<script>alert('Gagal');</script>
            echo <script>window.location.replace('?halaman=tambah-kategori;);</script>
            exit;
    }
