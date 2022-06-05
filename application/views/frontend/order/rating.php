<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="page-title">
          <h3>Penilaian Produk</h3>
        </div>
      </div>
      <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Penilaian Produk</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- START MAIN CONTENT -->
<div class="main_content">
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <h5>Order</h5>
        <br>
        <div class="order_review1">
          <div class="table-responsive">
            <table class="table order-table">
              <tr>
                <td style="width:15%;">No Invoice </td>
                <td style="width:3%;">: </td>
                <td style="width:75%;"><?= $order['no_invoice'] ?></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $order['nama_pelanggan'] ?> (<?= $order['kode_pelanggan'] ?>)</td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><?= $order['tanggal'] ?></td>
              </tr>
              <tr>
                <td>Status</td>
                <td>:</td>
                <td><?= $order['nama_status'] ?></td>
              </tr>
            </table>
          </div>

          <br>
          <h5 class="mb-4">Ulasan Produk</h5>
          <?php foreach ($order_detail as $row) { ?>
            <div class="card mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                    <h5><?= $row->nama_produk ?></h5>
                    <h6>Total : <?= rupiah($row->qty*$row->harga) ?></h6>
                  </div>
                  <div class="col-md-6 text-right">
                    <span><?= $row->qty ?> x <?= rupiah($row->harga) ?></span>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group col-12">
                    <div class="star_rating">
                      <span data-value="1"><i class="far fa-star"></i></span>
                      <span data-value="2"><i class="far fa-star"></i></span>
                      <span data-value="3"><i class="far fa-star"></i></span>
                      <span data-value="4"><i class="far fa-star"></i></span>
                      <span data-value="5"><i class="far fa-star"></i></span>
                    </div>
                  </div>
                  <div class="form-group col-12">
                    <textarea required="required" placeholder="Ulasan produk . . ." class="form-control" name="message"
                      rows="3"></textarea>
                  </div>
              </div>
            </div>
          <?php } ?>
        </div>


        </div>
      </div>
    </div>
  </div>
</div>