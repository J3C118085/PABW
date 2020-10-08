<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="bootstrap/css/custom.css" rel="stylesheet" />
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <title>Tambah Mahasiswa</title>
</head>
<div class="heading">
    <h1>Tambah Mahasiswa</h1>
</div>
<body>
<form method="POST" enctype="multipart/form-data">
    <table class="table">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nm"></td>
        </tr>
        <tr>
            <td>Nim</td>
            <td><input type="text" name="nimnya"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <input type="radio" id="male" name="gender" value="Laki-laki">
                <label for="male">Laki-laki</label>
                <input type="radio" id="female" name="gender" value="Perempuan">
                <label for="female">Perempuan</label>
            </td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>
                <select name="agama">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Olahraga Favorit</td>
            <td>
                <input type="checkbox" id="of1" name="hobi[]" value="Sepak Bola">
                <label for="of1"> Sepak Bola</label>
                <input type="checkbox" id="of2" name="hobi[]" value="Basket">
                <label for="of2"> Basket</label>
                <input type="checkbox" id="of3" name="hobi[]" value="Futsal">
                <label for="of3"> Futsal</label>
                <input type="checkbox" id="of4" name="hobi[]" value="Badminton">
                <label for="of4"> Badminton</label>
                <input type="checkbox" id="of5" name="hobi[]" value="Renang">
                <label for="of5"> Renang</label>
            </td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td><input type="file" name="image"></td>
        </tr>
    </table>

    <input class="btn btn-primary" type="submit" name="sub" value="simpan data baru!">
    <input class="btn btn-danger" type="submit" name="sub" value="kembali ke daftar data">

    <?php
    if (isset($_POST['sub'])) {
        if ($_POST['sub'] == 'kembali ke daftar data') {
            header("location:index.php");
        } else {
                $data = implode(", ", $_POST['hobi']);
                $ukuran = $_FILES['image']['size'];
                $namaFile = $_FILES['image']['name'];
                $tmpName = $_FILES['image']['tmp_name'];

            if ($ukuran > 1000000) {
                echo "<script>  
                         alert('Ukuran Gambar Terlalu Besar!');
                      </script>";
                header("location:tambah_mahasiswa.php");
            } else {
                move_uploaded_file($tmpName, 'img/' . $namaFile);
            }   

            if (strlen($_POST['nm']) && strlen($_POST['gender']) && strlen($_POST['agama']) && strlen($data) && strlen($namaFile)) {
                include "koneksi.php";
                $sql=mysqli_query($kon, "INSERT INTO `mahasiswa` (`NIM`,`nama`,`jenis_kelamin`,`agama`,`olahraga`,`gambar`) VALUES 
                ('" . $_POST['nimnya'] . "','" . $_POST['nm'] . "','" . $_POST['gender'] . "','" . $_POST['agama'] . "','" . $data . "','" . $namaFile . "')");

                if ($sql) {
                    echo '<script>alert("Berhasil menambah data."); document.location="index.php";</script>';
                } else {
                    echo '<div class="alert alert-warning">Gagal melakukan proses ubah data.</div>';
                }

                echo "<br>Data <b>'" . $_POST['nm'] . "'</b> telah dimasukan ke database";
                echo "<br>silahkan klik tombol kembali ke daftar data untuk melihat hasilnya";
                //header("location:tampil_data_link_insert.php");
            } else {
                echo "Agar data tersimpan, Data tidak boleh kosong";
            }
        }
    }
    ?>
</form>
</body>
</html>