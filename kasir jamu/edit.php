<?php include 'navbar.php'; ?>

<?php 
include 'db.php';
$id = $_GET['id'];
$data = $db->query("SELECT * FROM transaksi WHERE id = '$id'");
$d = $data->fetch_array();
?>
<div class="card mb-3 p-4 shadow">
            <div class="alert alert-primary" role="alert">
                Silahkan Perbaiki
            </div>
            <form action="update.php?id=<?php echo $id ?>" method="POST">
                <table class="table table-borderless">
                    <tr>
                        <td>Barang</td>
                        <td>
                            <select class="form-control" name="barang_id" id="">
                                <option value="">Pilih Menu</option>
                                <?php
                                $barang = $db->query('select * from barang');
                                while ($item = $barang->fetch_object()) {
                                    echo "<option value='$item->id'>$item->nama (Rp.$item->harga)</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td><input value="<?php echo $d['jumlah'] ?>" type="number" class="form-control" name="jumlah" id=""></td>
                    </tr>
                    <tr>
                        <td>customer</td>
                        <td><input value="<?php echo $d['customer'] ?>" autocomplete=off type="text" class="form-control" name="customer" id=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

<?php include 'footer.php' ?>