<style>
  .order-table tr, td {
    padding: 8px !important;
  }
</style>
<div class="row">
  <div class="col-12">
    <div class="card flat">
      <div class="card-header card-header-blue">
        <span class="card-title">Detail Order</span>
        <a class="float-right btn btn-primary" href="javascript:;">Update Status</a>
      </div>
      <div class="card-body">
        <div class="order_review">
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
                <td>No Telepon</td>
                <td>:</td>
                <td><?= $order['no_telp'] ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $order['alamat'] ?></td>
              </tr>
              <tr>
                <td>Catatan/Keterangan</td>
                <td>:</td>
                <td><?= $order['keterangan'] ?></td>
              </tr>
              <tr>
                <td>Status</td>
                <td>:</td>
                <td><?= $order['status'] ?></td>
              </tr>
            </table>
          </div>

          <br>
          <h5>Order</h5>
          <div class="table-responsive">
            <table class="table" id="order-table">
              <thead class="tr-head">
                <tr>
                  <th class="text-center">No.</th>
                  <th>Produk</th>
                  <th class="text-center">Satuan</th>
                  <th class="text-center">Qty</th>
                  <th class="text-right">Harga</th>
                  <th class="text-right">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 0;
                $total = 0;
                foreach ($order_detail as $row) { 
                  $no++; 
                  $total += ($row->qty*$row->harga);
                ?>
                  <tr>
                    <td class="text-center"><?= $no ?>.</td>
                    <td><?= $row->nama_produk ?></td>
                    <td class="text-center"><?= $row->satuan ?></td>
                    <td class="text-center"><?= $row->qty ?></td>
                    <td class="text-right"><?= rupiah($row->harga) ?></td>
                    <td class="text-right"><?= rupiah($row->qty * $row->harga) ?></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="4"></td>
                  <td class="text-right"><b>Total</b></td>
                  <td class="text-right">
                    <span id="total-order"><?= rupiah($total) ?></span>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

        <hr>
        <div class="text-right">
          <a href="<?= site_url('Order') ?>" class="btn btn-secondary">Kembali</a>           
        </div>
      </div>
    </div>
  </div>
</div>