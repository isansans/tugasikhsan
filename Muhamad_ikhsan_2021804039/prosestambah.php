<!DOCTYPE html>
<html>
    <head>
        <title>Upload File </title>
    </head>
    <body>
        <h1>Upload File </h1>
        
        <?php
        include 'koneksi.php';
        if($_POST['save']){
            
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
            $namafile = 'img_'.$kd_barang.'.jpg'; 
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070){ 
                    move_uploaded_file($file_tmp, 'file/'.$namafile);
                    $query = mysqli_query($koneksi,"insert into tb_barang(kd_barang,nm_barang,kategori,satuan,hrg_modal,hrg_jual,gambar) values('$kd_barang','$nm_barang','$kategori','$satuan','$hrg_modal','$hrg_jual','$namafile')");
                    if($query){
                        
                        //echo 'FILE BERHASIL DI UPLOAD';
                        echo "<script>alert('DATA BERHASIL DI SIMPAN');window.location='index.php';</script>";
                    }else{
                        echo "<script>alert('DATA GAGAL DI SIMPAN');window.location='index.php';</script>";
                    }
                }else{
                    echo "<script>alert('UKURAN FILE TERLALU BESAR');window.location='tambahdata.php';</script>";
                }
            }else{
                echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN');window.location='tambahdata.php';</script>";
            }
        }
        ?>
        </body>
        </html>