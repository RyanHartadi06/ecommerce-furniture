<hr>
<div class="section small_pb small_pt">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="heading_s1 text-center">
          <h2>Pencarian Produk</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <!-- List Produk -->
        <div id="list-produk"></div>
      </div>
    </div>
  </div>
</div>
<input type="hidden" id="q_produk" value="<?= $keyword ?>">

<script>
  $(document).ready(function() {
    getProduk()
  })

  function getProduk() {
    var q = $('#q_produk').val();
    $.ajax({
      url: site_url + "/Produk/fetch_data_produk",
      type: 'GET',
      dataType: 'html',
      data: {
        search:q,
        sortby: 'created_at',
        sorttype: 'desc',
        limit: 20,
      },
      beforeSend: function() {},
      success: function(result) {
        $('#list-produk').html(result);
      }
    });
  }
</script>