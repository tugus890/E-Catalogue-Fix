<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<link rel='stylesheet' href='https://fullcalendar.io/js/fullcalendar-3.1.0/fullcalendar.min.css' />

<style>
  .select2-container--open {
    z-index: 999999 !important;
  }

  .select2 {
    width: 100% !important;
  }
</style>
<link rel="stylesheet" href="<?= base_url('assets/') ?>css/detail.css" />

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                  <h4 class="card-title text-primary">Detail Product</h4>
                </div>
                <div class="swiper mySwiper">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <img width="100%" height="500px" src="<?= file_exists('assets/upload/' . $produk['foto_produk1'])  ? base_url() . 'assets/upload/' . $produk['foto_produk1'] : 'https://dinkes.dairikab.go.id/wp-content/uploads/sites/12/2022/03/default-img.gif' ?>" alt="">
                    </div>
                    <div class="swiper-slide">
                      <img width="100%" height="500px" src="<?= file_exists('assets/upload/' . $produk['foto_produk1'])  ? base_url() . 'assets/upload/' . $produk['foto_produk1'] : 'https://dinkes.dairikab.go.id/wp-content/uploads/sites/12/2022/03/default-img.gif' ?>" alt="">
                    </div>
                    <div class="swiper-slide">
                      <img width="100%" height="500px" src="<?= file_exists('assets/upload/' . $produk['foto_produk1'])  ? base_url() . 'assets/upload/' . $produk['foto_produk1'] : 'https://dinkes.dairikab.go.id/wp-content/uploads/sites/12/2022/03/default-img.gif' ?>" alt="">
                    </div>
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
                </div>
                <br>
                <br>
                <table>
                  <tr>
                    <td>Nama Produk</td>
                    <td>:</td>
                    <td><?= $produk['nama_produk'] ?></td>
                  </tr>
                  <tr>
                    <td>Deskripsi</td>
                    <td>:</td>
                    <td><?= $produk['deskripsi_produk'] ?></td>
                  </tr>
                  <tr>
                    <td>Harga DP</td>
                    <td>:</td>
                    <td>Rp. <?= number_format($produk['harga_dp']) ?></td>
                  </tr>
                  <tr>
                    <td>Harga Lunas</td>
                    <td>:</td>
                    <td>Rp. <?= number_format($produk['harga_lunas']) ?></td>
                  </tr>
                  <tr>
                    <td class="">
                      <button type="button" class="btn btn-primary viewJadwal" id="viewJadwal" data-id="<?= $produk['id_produk'] ?>" data-bs-toggle="modal" data-bs-target="#modalproduk">
                        Lihat Jadwal Booking
                      </button>

                    </td>
                    <td>

                    </td>
                    <td>

                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalproduk2">
                        Booking <?= $produk['nama_produk'] ?>
                      </button>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>


<!-- Modal Tambah -->
<div class="modal fade" id="modalproduk2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Sewa Produk <?= $produk['nama_produk'] ?></h5>
      </div>
      <div class="modal-body">
        <form id="regForm" method="POST" action="<?= base_url() . 'user/product/store' ?>">
          <div class="tab">
            <h3>Ajukan Sewa :</h3>
            <div class="row">
              <div class="col mb-3">
                <label for="Nik" class="form-label">Nik</label>
                <input type="text" id="Nik" name="Nik" class="form-control" placeholder="Masukkan Nik" />
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama" />
              </div>
            </div>

            <div class="row">
              <div class="col mb-3">
                <label for="tlp" class="form-label">No Telepon</label>
                <input type="text" id="tlp" name="tlp" class="form-control" placeholder="Masukkan Telepon" />
              </div>
            </div>

            <div class="row">
              <div class="col mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea id="alamat" name="alamat" class="form-control" placeholder="Masukkan alamat"> </textarea>
              </div>
            </div>

          </div>
          <div class="tab">
            <div class="row">
              <div class="col mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <select class="form-control" id="select2" data-placeholder="Choose one thing" multiple name="produk[]">
                  <?php foreach ($produkAll as $p) : ?>
                    <option value="<?= $p->id_produk ?>"><?= $p->nama_produk ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                <input type="text" id="jenis_kegiatan" name="jenis_kegiatan" class="form-control" placeholder="Masukkan Jenis Kegiatan" />
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="tgl_sewa" class="form-label">Tanggal Sewa</label>
                <input type="date" id="tgl_sewa" name="tgl_sewa" class="form-control">
              </div>
              <div class="col mb-0">
                <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" id="tgl_selesai" name="tgl_selesai" class="form-control">
              </div>
            </div>
            <div class="row mt-2">
              <div class="mb-3">
                <label for="catatan" class="form-label">catatan</label>
                <textarea type="text" name="catatan" class="form-control" id="catatan" rows="3"></textarea>
              </div>
            </div>
          </div>
          <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
            <h3>Terima kasih atas penyewaanya!</h3> <span>Mohon dicek secara berkala untuk informasi selanjutnya!</span>
          </div>
          <div style="overflow:auto;" id="nextprevious">
            <div style="float:right;"> <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
              <button type="button" id="nextBtn" class="btn btn-primary" onclick="nextPrev(1)">Next</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl"" role=" document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Jadwal Penggunaan Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="calendar">
          <p class="text-center"></p>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="add-event">
        <div class="modal-body">
          <h4>Add Event Detail</h4>
          <div class="form-group">
            <label>Event name</label>
            <input type="text" class="form-control" name="ename" />
          </div>
          <div class="form-group">
            <label>Event Date</label>
            <input type="text" class="datetimepicker form-control" name="edate" />
          </div>
          <div class="form-group">
            <label>Event Description</label>
            <textarea class="form-control" name="edesc"></textarea>
          </div>
          <div class="form-group">
            <label>Event Color</label>
            <select class="form-control" name="ecolor">
              <option value="fc-bg-default">fc-bg-default</option>
              <option value="fc-bg-blue">fc-bg-blue</option>
              <option value="fc-bg-lightgreen">fc-bg-lightgreen</option>
              <option value="fc-bg-pinkred">fc-bg-pinkred</option>
              <option value="fc-bg-deepskyblue">fc-bg-deepskyblue</option>
            </select>
          </div>
          <div class="form-group">
            <label>Event Icon</label>
            <select class="form-control" name="eicon">
              <option value="circle">circle</option>
              <option value="cog">cog</option>
              <option value="group">group</option>
              <option value="suitcase">suitcase</option>
              <option value="calendar">calendar</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">
            Close
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-view-event" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl"" role=" document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Jadwal Penggunaan Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class="modal-title">
          <span class="event-icon"></span>
          <span class="event-title"></span>
        </h4>
        <div class="event-body"></div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $("#select2").select2();
  })
</script>

<script>
  var swiper = new Swiper(".mySwiper", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  //your javascript goes here
  var currentTab = 0;
  document.addEventListener("DOMContentLoaded", function(event) {
    showTab(currentTab);

  });

  function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
  }

  function nextPrev(n) {
    var x = document.getElementsByClassName("tab");
    if (n == 1 && !validateForm()) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    if (currentTab >= x.length) {
      document.getElementById("regForm").submit();
      // return false;
      //alert("sdf");
      document.getElementById("nextprevious").style.display = "none";
      document.getElementById("text-message").style.display = "block";
      $('#text-message').removeClass('thanks-message');
    }
    showTab(currentTab);
  }

  function validateForm() {
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    for (i = 0; i < y.length; i++) {
      if (y[i].value == "") {
        y[i].className += " invalid";
        valid = false;
      }
    }
    return valid;
  }
</script>