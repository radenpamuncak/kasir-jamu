<?php include 'navbar.php'; ?>
<?php include 'db.php'; ?>

        <div class="card mb-3 p-4 shadow">
            <div class="alert alert-primary" role="alert">
                Silahkan pesan
            </div>
            <form action="tambah.php" method="POST">
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
                        <td><input type="number" class="form-control" name="jumlah" id=""></td>
                    </tr>
                    <tr>
                        <td>customer</td>
                        <td><input autocomplete=off type="text" class="form-control" name="customer" id=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="table-responsive card mb-3 p-4">
            Tabel Transaksi
            <table class="table table-striped">
                <tr>
                    <th>customer</th>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>opsi</th>
                </tr>
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $tanggal_sekarang = date('Y-m-d');
                $data = $db->query('select transaksi.*, barang.nama, barang.harga, barang.harga * transaksi.jumlah as total from transaksi join barang on transaksi.barang_id = barang.id where tanggal_masuk = "' . $tanggal_sekarang . '"');
                $no = 1;
                if ($data->num_rows > 0) :
                    while ($item = $data->fetch_object()) :
                ?>
                        <tr>
                             <td><?= $item->customer ?></td>
                            <td><?= $no++ ?></td>
                            <td><?= $item->nama ?></td>
                            <td><?= $item->harga ?></td>
                            <td><?= $item->jumlah ?></td>
                            <td><?= $item->total ?></td>
                            <td>
                                <a href="edit.php?id=<?= $item->id ?>" class="btn btn-primary edit-icon">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="laporan.php" class="btn btn-primary">cek</a>
                                <a onclick="return confirm('anda yakin menghapus pesanan')" href="hapus.php?id=<?= $item->id ?>" class="btn btn-danger">hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td align="center" colspan="6">data tidak tersedia</td>
                    </tr>
                <?php endif ?>
            </table>
        </div>
<?php include 'footer.php' ?>