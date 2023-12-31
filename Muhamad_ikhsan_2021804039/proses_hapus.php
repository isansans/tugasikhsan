<?php
include('koneksi.php');
if(isset($_GET['id'])){
$kd_barang=$_GET['id'];
$namafile = 'img_'.$kd_barang.'.jpeg'; 

// Cek apakah file fotonya ada di folder images
if(is_file("file/".$namafile)){ // Jika foto ada
    unlink("file/".$namafile); // Hapus foto yang telah diupload dari folder images
}
$del=mysqli_query($koneksi,"DELETE FROM tb_barang WHERE kd_barang='$kd_barang'");
if($del){
    echo'Data Barang berhasil dihapus! ';
    echo'<a href="index.php">Kembali</a>';
}else{
    echo'Gagal menghapus data! ';
    echo'<a href="index.php">Kembali</a>';
}
}
?>