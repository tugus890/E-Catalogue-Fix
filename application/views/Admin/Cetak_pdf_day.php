<!DOCTYPE html>
<html><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendapatan Bulan Ini</title>
</head><body>
    
<h3><center>DAFTAR TRANSAKSI HARI INI</center></h3>
<table style=" border-collapse: collapse; margin-top: 25px;" border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-striped table-bordered ">
  <tr>
    <th>No</th>
    <th>Nama Produk</th>
    <th>Total Pendapatan</th>


  </tr>

    <?php 
    $no = 1;
    foreach ($laporan as $produk) :
    ?>

    <tr>
    <td>
    <?php echo $no++ ?></td>
        <td><?php echo $produk->nama_produk ?></td>
        <td><?php echo number_format($produk->total_pendapatan, 3, '.', ','); ?></td>
    </tr>

<?php endforeach; ?>
</table>
</body></html>
