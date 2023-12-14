<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice </title>
  <style>
    * {
      font-family: 'Poppins' !important;
    }

    .item {
      width: 185mm;
      border-collapse: collapse;
    }

    .item td,
    .item tr {
      padding: 1mm;
      border: 1px solid #ddd;
      position: relative;
      font-size: .8em;
      font-weight: bold;
      text-align: center;
    }
  </style>
</head>

<body>


  <table width="97%">
    <tr>
      <td>
        <img src="<?= BASE_URL('assets/images/pnbicon.png') ?>" alt="">
      </td>
      <td align="right">
        <h1>Invoice</h1>
        <span>Nomor Transaksi : #<?= date('ymd') . rand(100, 1000) ?></span><br>
        <span>Date : <?= date('d M Y') ?></span>
      </td>
    </tr>
    <tr>
      <td>
        <hr width="100%">
      </td>
      <td>
        <hr width="100%">
      </td>
    </tr>
    <tr>
      <td>
        <h3>Data Client</h3>
        <table>
          <tr>
            <td>
              <span>Nama lengkap </span>
            </td>
            <td>:</td>
            <td><?= $produk->nama_lengkap ?></td>
          </tr>
          <tr>
            <td>
              <span>Email </span>
            </td>
            <td>:</td>
            <td><?= $email ?></td>
          </tr>
          <tr>
            <td>
              <span>Nomor Telepon </span>
            </td>
            <td>:</td>
            <td><?= $produk->no_telepon ?></td>
          </tr>
        </table>
      </td>
    </tr>

    <tr width="100%">
      <h3>Detail Penyewaan</h3>
      <table width="100%" class="item">
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Harga Sewa</th>
          <th>Tanggal Sewa</th>
          <th>Tanggal Selesai</th>
          <th>Jenis Kegiatan</th>
          <th>Status</th>
        </tr>
        <?php $i = 1;
        $total = 0;
        foreach ($penyewaan as $p) :
          $total = $total + (float)$p->harga_lunas;
        ?>
          <tr>
            <td width=""><?= $i++ ?></td>
            <td><?= $p->nama_produk ?></td>
            <td>Rp. <?= number_format($p->harga_lunas) ?></td>
            <td><?= date('d M Y', strtotime($produk->tgl_sewa)) ?></td>
            <td><?= date('d M Y', strtotime($produk->tgl_selesai)) ?></td>
            <td><?= $produk->jenis_kegiatan ?></td>
            <td>
              <?php if ($DP) : ?>
                <?php if ($DP->is_valid == '1' && ($LUNAS && $LUNAS->is_valid == '1')) : ?>

                  <span>Sudah Lunas</span>
                <?php else : ?>
                  <span>Belum Lunas</span>
                <?php endif; ?>
              <?php elseif ($LUNAS) : ?>
                <?php if ($LUNAS->is_valid == '1') : ?>
                  <span>Sudah Lunas</span>
                <?php endif; ?>
              <?php else : ?>
                <span>Belum Lunas</span>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>

    </tr>

    <tr width="100%">
      <h3>Detail Pembayaran</h3>
      <table width="100%" class="item">
        <tr>
          <th>Jumlah</th>
          <th>Total Harga Sewa</th>
          <th>Total Dibayar</th>
          <th>Total Belum Dibayar</th>
        </tr>
        <?php $totalNew = $total;
        foreach ($pembayaran as $pem) :
          $totalNew = $totalNew - $pem->nominal;
        ?>
          <tr>
            <td width=""><?= count($pembayaran) ?></td>
            <td>Rp. <?= number_format($total) ?></td>
            <td>Rp. <?= number_format($pem->nominal) ?></td>
            <td>Rp. <?php if ($LUNAS && $LUNAS->is_valid == '1') : ?>
                0
              <?php else : ?>
                -<?= number_format($totalNew) ?>
              <?php endif; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>

    </tr>

  </table>

</body>

</html>