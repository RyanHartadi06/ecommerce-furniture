<div class="row">
  <div class="col-12">
    <div class="table-responsive shop_cart_table">
      <table class="table" id="cart-table">
        <thead>
          <tr>
            <th class="product-thumbnail">&nbsp;</th>
            <th class="product-name">Produk</th>
            <th class="product-price">Harga</th>
            <th class="product-quantity">Jumlah</th>
            <th class="product-subtotal">Total</th>
            <th class="product-remove">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0;
          if(count($data)>0){
            foreach ($data as $row) { 
              $total += ($row->qty*$row->harga);
            ?>
            <tr>
              <td class="product-thumbnail">
                <a href="javascript:;"><img src="<?= base_url($row->foto) ?>" alt="product1"></a>
              </td>
              <td>
                <input class="cart-id" type="hidden" value="<?= $row->id ?>">
                <input class="product-id" type="hidden" value="<?= $row->id_produk ?>">
                <input class="product-name" type="hidden" value="<?= $row->nama ?>">
                <a href="javascript:;"><?= $row->nama ?></a>
              </td>
              <td>
                <input type="hidden" class="product-price" value="<?= $row->harga ?>">
                <?= rupiah($row->harga) ?>
              </td>
              <td class="product-quantity" data-title="Jumlah">
                <div class="quantity">
                  <input type="button" value="-" class="minus">
                  <input type="text" name="quantity" value="<?= $row->qty ?>" title="Qty" class="qty" size="4" readonly>
                  <input type="button" value="+" class="plus">
                </div>
              </td>
              <td class="product-subtotal">
                <?= rupiah($row->qty*$row->harga) ?>
              </td>
              <td class="product-remove">
                <a href="javascript:;" class="btn-delete-cart" data-id="<?= $row->id ?>"><i class="ti-close"></i></a>
              </td>
            </tr>
          <?php }}else{ ?>
          <tr>
            <td colspan="6">Keranjang belanja kosong !</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <hr>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="medium_divider"></div>
    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
    <div class="medium_divider"></div>
  </div>
</div>
<div class="row">
  <div class="col-md-6"></div>
  <div class="col-md-6">
    <div class="border p-3 p-md-4">
      <div class="heading_s1 mb-3">
        <h6>Total Keranjang</h6>
      </div>
      <div class="table-responsive">
        <table class="table">
          <tbody>
            <tr>
              <td class="cart_total_label">Jumlah</td>
              <td class="cart_total_amount"><?= count($data) ?> Items</td>
            </tr>
            <tr>
              <td class="cart_total_label">Total</td>
              <td class="cart_total_amount"><strong><?= rupiah($total) ?></strong></td>
            </tr>
          </tbody>
        </table>
      </div>
      <a href="javascript:;" onclick="checkout()" class="btn btn-fill-out">CheckOut</a>
    </div>
  </div>
</div>
<script src="<?= base_url('assets/frontend/js/scripts.js') ?>"></script>