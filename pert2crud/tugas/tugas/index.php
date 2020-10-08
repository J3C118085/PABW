<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="bootstrap/css/custom.css" rel="stylesheet" />
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Data Mahasiswa</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="heading">
        <h1>Data Mahasiswa</h1>
    </div>
</nav>
    <a class="btn btn-primary" href="tambah_mahasiswa.php" role="button" style="margin: 20px 20px;">Tambah Mahasiswa</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">No</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Agama</th>
            <th scope="col">Hobi</th>
            <th scope="col">Foto</th>
            <th scope="col">Aksi</th>
            </tr>
            <?php
            include "koneksi.php";
            $r = mysqli_query($kon,"SELECT * FROM mahasiswa");
            $i = 1;
            while($brs=mysqli_fetch_assoc($r)){
            ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $brs['NIM']; ?></td>
                <td><?= $brs['nama']; ?></td>
                <td><?= $brs['jenis_kelamin']; ?></td>
                <td><?= $brs['agama']; ?></td>
                <td><?= $brs['olahraga']; ?></td>
                <td><img src="img/<?= $brs['gambar']; ?>" height="70px"></td>
                <td><a class="btn btn-success" href="edit_mahasiswa.php?id=<?= $brs['id']; ?>">Edit</a>
                <a class="btn btn-danger" href="hapus_mahasiswa.php?id=<?= $brs['id']; ?>">Delete</a>
                </td>
                <?php
                }
                ?>
            </tr>
        </thead>
    </table>
</body>
</html>