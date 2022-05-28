<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
  <div class="container">
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
  </div>
</div>
<!-- END SECTION BREADCRUMB -->

<div class="main_content">

  <!-- Content -->
  <div class="section">
    <div class="container">
      <div id="div-cart">

      </div>
    </div>
  </div>
  <!-- End Content -->

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
                      <td class="product-subtotal">
                        <span id="total-order">0</span>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="form-group">
                <label for="keterangan">Keterangan / Catatan</label>
                <textarea class="form-control" name="keterangan" id="keterangan" rows="2"></textarea>
              </div>
              <!-- <hr>
            <div class="payment_method">
              <div class="heading_s1">
                <h4>Transfer Bank</h4>
              </div>
              <div class="payment_option">
                <div class="custome-radio">
                  <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios3" value="option3"
                    checked="">
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
            </div> -->
            </div>
            <input id="order-detail-json" type="hidden">
            <!--  -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Buat Pesan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  loadCart();
})

function loadCart() {
  $.ajax({
    url: "<?= site_url() ?>" + "/Order/get_list_cart",
    type: 'GET',
    dataType: 'html',
    data: {},
    beforeSend: function() {},
    success: function(result) {
      $('#div-cart').html(result);
    }
  });
}

function updateQty(id, qty) {
  $.ajax({
    url: "<?= site_url() ?>" + "/Order/update_qty",
    type: 'POST',
    dataType: 'html',
    data: {
      id: id,
      qty: qty
    },
    beforeSend: function() {},
    success: function(result) {
      loadCart();
    }
  });
}

function getTableCart() {
  let cart = [];
  $('#cart-table tr').each(function(index) {
    var id_cart = $(this).find("td .cart-id").val();
    var id_produk = $(this).find("td .product-id").val();
    var nama = $(this).find("td .product-name").val();
    var qty = $(this).find("td .qty").val();
    var harga = $(this).find("td .product-price").val();

    if (index != 0) {
      cart.push({
        id_cart: id_cart,
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
  let total = 0;
  $("#order-table tbody tr").remove();
  cart.forEach(el => {
    total += parseInt(el.qty * el.harga);
    let html = "<tr>" +
      "<td>" + el.nama + "<span class='product-qty'> x " + el.qty + "</span></td>" +
      "<td>Rp " + formatRupiah(parseInt(el.qty * el.harga)) + "</td>" +
      "</tr>";
    $('#order-table').append(html);
  });

  $('#order-detail-json').val(JSON.stringify(cart));
  $('#total-order').text("Rp " + formatRupiah(total));
  $('#modal-checkout').modal('show');
}

$(document).on('click', '.btn-delete-cart', function(e) {
  var id = $(this).attr('data-id');
  $.ajax({
    method: 'GET',
    dataType: 'json',
    url: "<?= site_url() ?>" + "/Order/delete_cart/" + id,
    data: {},
    success: function(data) {
      if (data.success === true) {
        Toast.fire({
          icon: 'success',
          title: data.message
        });
        loadCart();
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: data.message
        });
      }
    },
    fail: function(e) {
      alert(e);
    }
  });
});

$(document).on('submit', '#form-checkout', function(event) {
  event.preventDefault();
  var order_detail = $('#order-detail-json').val();
  var formData = new FormData($('#form-checkout')[0]);
  formData.append('order_detail', order_detail);

  $.ajax({
    url: '<?= site_url() ?>' + '/Order/save',
    method: 'POST',
    dataType: 'json',
    data: formData,
    async: true,
    processData: false,
    contentType: false,
    success: function(data) {
      if (data.success == true) {
        Toast.fire({
          icon: 'success',
          title: data.message
        });
        $('#modal-checkout').modal('hide');
        setTimeout(function(){ 
          window.location.href = "<?= site_url() ?>" + "/Order/order_complete";
        }, 1000);
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: data.message
        });
      }
    },
    fail: function(event) {
      alert(event);
    }
  });
});
</script>