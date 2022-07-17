<?php include 'navbar.php'; ?>
<?php include 'db.php'; ?>
<div class="card mb-3 p-4">
    <div class="row">
        <div class="col">
            Perolehan perbulan
        </div>
        <div class="col" align="right">
            <button class="btn btn-primary" onclick="window.print()">Print</button>
        </div>
    </div>
    <table class="table table-hover">
        <tr>
            <th>Tanggal</th>
            <th>Perolehan Total</th>
            
        </tr>
        <?php
        $tahun = date('Y');
        $query = "select DATE_FORMAT(tanggal_masuk, '%M %Y') as bulan, sum(barang.harga * transaksi.jumlah) as total from transaksi join barang on transaksi.barang_id = barang.id WHERE DATE_FORMAT(tanggal_masuk, '%Y')='$tahun' group by DATE_FORMAT(tanggal_masuk, '%M %Y')";
        $data = $db->query($query);
        while ($item = $data->fetch_object()) :
        ?>
            <tr>
                <td><?= $item->bulan ?></td>
                <td><?= $item->total ?></td> 
            </tr>
        <?php endwhile; ?>
    </table>
</div>
<?php include 'footer.php' ?>