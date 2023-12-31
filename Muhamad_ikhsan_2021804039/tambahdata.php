<!DOCTYPE html>
<html>
    <head>
        <title>TAMBAH DATA BARANG</title>
    </head>
    <body>
        <h1>TAMBAH DATA BARANG</h1>
        <br/>
        <a href="index.php">DATA BARANG</a>
        <br/><br/>
        <form action="prosestambah.php" method="post" enctype="multipart/form-data">
            <table width="400" >
                
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="kd_barang"></td>
            </tr>
            
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nm_barang" requied></td>
            </tr>
            

            <tr>
                <td>Kategori</td>
                <td><input type="text" name="kategori" required></td>
            </tr>

            <tr>
                <td>Satuan</td>
                <td>
                    <Select name=satuan>
                        <option value=Kgs Kgs>Kgs</option>
                        <option value=Pcs PCS>Pcs</option>
                        <option value=Meter Meter>Meter</option>
                    </select>

                </td>
            </tr>

            <tr>
                <td>Harga Modal</td>
                <td><input type="text" name="hrg_modal"></td>
            </tr>

            <tr>
                <td>Harga Jual</td>
                <td><input type="text" name="hrg_jual"></td>
            </tr>
            
            <tr>
                <td>Gambar</td>
                <td><input type="file" name="file"></td>
            </tr>

            <tr>
                <td></td>
                
                <td>
                    <br/><br/>
                    <input name="save" type="submit" value="SIMPAN">
                    <input name="BtnBatal" type="reset" value="BATAL" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>