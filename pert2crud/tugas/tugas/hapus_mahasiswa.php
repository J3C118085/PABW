<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">\

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="bootstrap/css/custom.css" rel="stylesheet" />
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <title>Hapus Mahasiswa</title>
</head>
<div class="heading">
    <h1>Hapus Mahasiswa</h1>
</div>
<body>
<?php
include "koneksi.php";
$r = mysqli_query($kon, "SELECT * FROM mahasiswa WHERE id=" . $_GET["id"]);
$brs = mysqli_fetch_assoc($r);
echo "Apakah Anda yakin akan menghapus nama " . $brs['nama'] . " dari tabel?";
?>

<form style="margin: 20px 0px;">
    <input type="hidden" name="idDelete" value="<?php echo $_GET["id"]; ?>">
    <input class="btn btn-success" type="submit" name="jawaban" value="ya">     
    <input class="btn btn-danger" type="submit" name="jawaban" value="tidak">
</form>

<?php
if (isset($_GET['jawaban'])) {
    if ($_GET['jawaban'] == "tidak")
        header("location:index.php");
    else {
        $r = mysqli_query($kon, "DELETE FROM `mahasiswa` WHERE `id` = " . $_GET['idDelete']);
        
        if ($r) {
            echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses ubah data.</div>';
        }
    }
}
?>
</body>
</html>