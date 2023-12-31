<?php
// koneksi database
include 'koneksi.php';
//Memproses data saat form di submit
if(isset($_POST["kd_barang"]) && !empty($_POST["kd_barang"])){
// menangkap data yang di kirim dari form
$kd_barang = $_POST['kd_barang'];
$nm_barang = $_POST['nm_barang'];
$kategori = $_POST['kategori'];
$satuan = $_POST['satuan'];
$hrg_modal = $_POST['hrg_modal'];
$hrg_jual = $_POST['hrg_jual'];
$ekstensi_diperbolehkan = array('png','jpg','jpeg');
$gambar = $_FILES['file']['name'];
$x = explode('.', $gambar);
$ekstensi = strtolower(end($x));
$ukuran = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];
$namafile = 'img_'.$kode.'.jpg'; 
if(empty($file_tmp)){
    $update=mysqli_query($koneksi,"UPDATE tb_barang SET nm_barang='$nm_barang',kategori='$kategori',satuan='$satuan',hrg_modal='$hrg_modal',hrg_jual='$hrg_jual' WHERE kd_barang='$kd_barang'")or die(mysql_error()); 
    if($update){
        //echo 'BERHASIL';
        echo "<script>alert('DATA BERHASIL DI UPDATE');window.location='index.php';</script>";
    }else{
        echo "<script>alert('UPDATE GAGAL');window.location='index.php';</script>";
    }
}else{
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if ($ukuran < 1044070){
            if(move_uploaded_file($file_tmp, 'file/'.$namafile)){ 
                // Cek apakah gambar berhasil diupload atau tidak
                $update=mysqli_query($koneksi,"UPDATE tb_barang SET nm_barang='$nm_barang',kategori='$kategori',satuan='$satuan',hrg_modal='$hrg_modal',hrg_jual='$hrg_jual',gambar='$namafile' WHERE kd_barang='$kd_barang'")or die(mysql_error());
                if($update){
                    echo "<script>alert('DATA BERHASIL DI UPDATE');window.location='index.php';</script>";
                }else{
                    echo "<script>alert('DATA GAGAL DI UPDATE');window.location='index.php';</script>";
                }
            }else{
                echo "<script>alert('GAGAL MENGUPLOAD GAMBAR');window.location='index.php';</script>";
            }
        }else{
            echo "<script>alert('UKURAN FILE TERLALU BESAR');window.location='tambahdata.php';</script>";
        }
    }else{
        echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN');window.location='edit_databarang.php?id=$kd_barang';</script>";
    }
}
}
?>