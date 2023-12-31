<!DOCTYPE html>
<html>
    <head>
        <title>DATA BARANG</title>
    </head>
    <body>
        <h2>DATA BARANG</h2>
        <br/>
        <a href="index.php">KEMBALI</a>
        <br/>
        <br/>
        <h3>EDIT DATA BARANG</h3>
        
        <?php
        include 'koneksi.php';
        $id = $_GET['id'];
        $data = mysqli_query($koneksi,"select * from tb_barang WHERE kd_barang='$id'");
        while($d = mysqli_fetch_array($data)){
            ?>
            <form method="post" action="proses_update.php"
            enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Kode Barang</td>
                    <td>
                        <input type="text" name="kd_barang" value="<?php echo $d['kd_barang']; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td><input type="text" name="nm_barang" value="<?php echo $d['nm_barang']; ?>">
                </td>
            </tr>
            
                <tr>
                    <td>Kategori</td>
                    <td><input type="text" name="kategori" value="<?php echo $d['kategori']; ?>" ></td>
                </tr>

                <tr>
                    <td>Satuan</td>
                    <td>
                        <Select name=satuan>
                            <option value="Kgs" <?php if($d['satuan']=="Kgs") echo 'selected="selected"'; ?> >Kgs</option>
                            <option value="Pcs" <?php if($d['satuan']=="Pcs") echo 'selected="selected"'; ?> >Pcs</option>
                            <option value="Meter" <?php if($d['satuan']=="Meter") echo 'selected="selected"'; ?> >Meter</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Harga Modal</td>
                    <td><input type="text" name="hrg_modal" value="<?php echo $d['hrg_modal']; ?>"></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td><input type="text" name="hrg_jual" value="<?php echo $d['hrg_jual']; ?>"></td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td><input type="file" name="file"> <img src="file/<?php echo $d['gambar']; ?>" style="width: 100px;float: left;margin-bottom: 5px;">
                    <br/><i style="float: left;font-size: 11px;color: red">Abaikan jika tidak ngin merubah gambar</i>
                </td>
            </tr>
        
            <tr>
                <td></td>
                <td>
                    <br/><br/>
                    <input name="BtnSimpan" type="submit" value="SIMPAN">
                    <input name="BtnBatal" type="reset" value="BATAL" />
                </td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>
    </body>
    </html>