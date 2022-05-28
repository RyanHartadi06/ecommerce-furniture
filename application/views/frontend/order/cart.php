<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
  <div class="container">
    <!-- STRART CONTAINER -->
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="page-title">
          <h3>Keranjang Belanja</h3>
        </div>
      </div>
      <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Keranjang Belanja</li>
        </ol>
      </div>
    </div>
  </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<div class="section">
  <div class="container">
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
              if(count($data)>0){
              foreach ($data as $row) { ?>
              <tr>
                <td class="product-thumbnail"><a href="#"><img src="<?= base_url($row->foto) ?>" alt="product1"></a>
                </td>
                <td>
                  <input class="product-id" type="text" value="<?= $row->id_produk ?>">
                  <input class="product-name" type="text" value="<?= $row->nama ?>">
                  <a href="javascript:;"><?= $row->nama ?></a>
                </td>
                <td>
                  <input type="text" class="product-price" value="<?= $row->harga ?>">
                  <?= rupiah($row->harga) ?>
                </td>
                <td class="product-quantity" data-title="Quantity">
                  <div class="quantity">
                    <input type="button" value="-" class="minus">
                    <input type="text" name="quantity" value="<?= $row->qty ?>" title="Qty" class="qty" size="4">
                    <input type="button" value="+" class="plus">
                  </div>
                </td>
                <td>
                  <input type="text" class="product-subtotal" value="<?= $row->qty*$row->harga ?>">
                  <?= rupiah($row->qty*$row->harga) ?>
                </td>
                <td class="product-remove" data-title="Remove"><a href="#"><i class="ti-close"></i></a></td>
              </tr>
              <?php }}else{ ?>
              <tr>
                <td colspan="6">Keranjang belanja kosong !</td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <hr>
          <div class="row no-gutters align-items-center">
            <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
              <!-- No Content -->
            </div>
            <div class="col-lg-8 col-md-6 text-left text-md-right">
              <button class="btn btn-line-fill btn-sm" type="submit">Update Cart</button>
            </div>
          </div>
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
                  <td class="cart_total_label">Jumlah Produk</td>
                  <td class="cart_total_amount">0</td>
                </tr>
                <tr>
                  <td class="cart_total_label">Total</td>
                  <td class="cart_total_amount"><strong>$349.00</strong></td>
                </tr>
              </tbody>
            </table>
          </div>
          <a href="javascript:;" onclick="checkout()" class="btn btn-fill-out">CheckOut</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Checkout -->
<div class="modal fade" id="modal-checkout" tabindex="-1" role="dialog" aria-labelledby="formModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Checkout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-checkout" action="" method="POST">
        <div class="modal-body">
          <div class="order_review">
            <div class="heading_s1">
              <h4>Order</h4>
            </div>
            <div class="table-responsive">
              <table class="table" id="order-table">
                <thead>
                  <tr>
                    <th>Produk</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Total</th>
                    <td class="product-subtotal">$349.00</td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <hr>
            <div class="payment_method">
              <div class="heading_s1">
                <h4>Transfer Bank</h4>
              </div>
              <div class="payment_option">
                <div class="custome-radio">
                  <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3"
                    value="option3" checked="">
                  <label class="form-check-label" for="exampleRadios3">Bank Mandiri</label>
                  <p data-method="option3" class="payment-text">
                    No. Rekening : 86779709098 (AN Anggita Jaya)
                  </p>
                </div>
                <div class="custome-radio">
                  <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios4"
                    value="option4">
                  <label class="form-check-label" for="exampleRadios4">Bank BCA</label>
                  <p data-method="option4" class="payment-text">
                    No. Rekening : 86779709098 (AN Anggita Jaya)
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!--  -->


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Pesan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function getTableCart() {
  let cart = [];
  $('#cart-table tr').each(function(index) {
    var id_produk = $(this).find("td .product-id").val();
    var nama = $(this).find("td .product-name").val();
    var qty = $(this).find("td .qty").val();
    var harga = $(this).find("td .product-price").val();

    if(index!=0){
      cart.push({
        id_produk: id_produk,
        nama: nama,
        qty: qty,
        harga: harga,
      })
    }  
  });

  return cart;
}

function checkout() {
  let cart = getTableCart();
  cart.forEach(el => {
    let html = "<tr>"
              + "<td>"+ el.nama +"<span class='product-qty'> x "+ el.qty +"</span></td>"
              + "<td>Rp "+ formatRupiah(parseInt(el.qty*el.harga)) +"</td>"
              + "</tr>"; 
    $('#order-table').append(html);
  });

  $('#modal-checkout').modal('show');
}

</script>