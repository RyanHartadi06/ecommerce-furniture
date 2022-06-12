<div class="section small_pb small_pt">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="heading_s1 text-center">
          <h2>Produk Terbaru</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <!-- List Produk -->
        <div id="list-produk"></div>
      </div>
    </div>
    <br>
    <div class="text-center">
      <a href="<?= site_url('Produk/search') ?>" class="btn btn-fill-out">Tampilkan Semua Produk</a>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    getProduk()
  })

  function getProduk() {
    $.ajax({
      url: site_url + "/Produk/fetch_data_produk",
      type: 'GET',
      dataType: 'html',
      data: {
        sortby: 'created_at',
        sorttype: 'desc',
        limit: 12,
        show_pagination: false
      },
      beforeSend: function() {},
      success: function(result) {
        $('#list-produk').html(result);
      }
    });
  }
</script>