<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Client /</span> Produk</h4>

    <div class="row mb-2">
      <?php foreach ($produk as $item) : ?>
        <div class="col-md-3 col-lg-3 mb-3">
          <div class="card h-100">
            <img class="card-img-top" height="200px" src="<?= file_exists('assets/upload/' . $item->foto_produk1)  ? base_url() . 'assets/upload/' . $item->foto_produk1 : 'https://dinkes.dairikab.go.id/wp-content/uploads/sites/12/2022/03/default-img.gif' ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $item->nama_produk ?></h5>
              <p class="card-text"><?= $item->deskripsi_produk ?></p>
              <div class="d-flex justify-content-between">
                <p class="card-text">Rp. <?= number_format($item->harga_lunas) ?></p>
                <a href="<?= base_url() . 'user/product/detail/' . $item->id_produk ?>" class="btn btn-outline-primary">Detail</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>